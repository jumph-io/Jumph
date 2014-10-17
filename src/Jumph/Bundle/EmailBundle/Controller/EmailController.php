<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle\Controller;

use Jumph\Bundle\EmailBundle\EmailEvents;
use Jumph\Bundle\EmailBundle\Entity\Email;
use Jumph\Bundle\EmailBundle\Form\Filter\EmailFilterType;
use Jumph\Bundle\EmailBundle\Form\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class EmailController extends Controller
{

    /**
     * Email overview page
     *
     * @param Request $request
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $filterForm = $this->createForm(new EmailFilterType());
        $filterForm->handleRequest($request);

        $filter = $this->get('jumph_email.email_filter');

        return $this->render("JumphEmailBundle:Email:overview.html.twig", array(
            'filterForm' => $filterForm->createView(),
            'emails' => $filter->getPaginatedResults(
                $filterForm,
                $request->query->get('page', 1),
                15
            )
        ));
    }

    /**
     * @ParamConverter("email", class="JumphEmailBundle:Email", options={"id" = "emailId"})
     *
     * View email
     *
     * @param Email $email
     *
     * @return Response A Response instance
     */
    public function viewAction(Email $email)
    {
        return $this->render("JumphEmailBundle:Email:view.html.twig", array(
            'email' => $email
        ));
    }

    /**
     * Add email
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {
        $email = new Email();
        $emailForm = $this->createForm(new EmailType(), $email);

        if ($request->isMethod('POST')) {
            $emailForm->handleRequest($request);
            if ($emailForm->isValid()) {
                $emailManager = $this->get('jumph_email.email_manager');
                $emailManager->create($email);

                $dispatcher = $this->container->get('event_dispatcher');
                $dispatcher->dispatch(EmailEvents::CREATE_EMAIL, new Event());

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Email created!');

                return $this->redirect($this->generateUrl('jumph_email_overview'));
            }
        }

        return $this->render("JumphEmailBundle:Email:form.html.twig", array(
            'emailForm' => $emailForm->createView()
        ));
    }

    /**
     * @ParamConverter("email", class="JumphEmailBundle:Email", options={"id" = "emailId"})
     *
     * Edit email
     *
     * @param Request $request A Request instance
     * @param Email $email
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, Email $email)
    {
        $emailForm = $this->createForm(new EmailType(), $email);

        if ($request->isMethod('POST')) {
            $emailForm->handleRequest($request);
            if ($emailForm->isValid()) {
                $emailManager = $this->get('jumph_email.email_manager');
                $emailManager->update($email);

                $dispatcher = $this->container->get('event_dispatcher');
                $dispatcher->dispatch(EmailEvents::UPDATE_EMAIL, new Event());

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Email updated!');

                return $this->redirect($this->generateUrl('jumph_email_overview'));
            }
        }

        return $this->render("JumphEmailBundle:Email:form.html.twig", array(
            'emailForm' => $emailForm->createView()
        ));
    }

    /**
     * @ParamConverter("email", class="JumphEmailBundle:Email", options={"id" = "emailId"})
     *
     * Delete email
     *
     * @param Email $email
     *
     * @return RedirectResponse A Response instance
     */
    public function deleteAction(Email $email)
    {
        $emailManager = $this->get('jumph_email.email_manager');
        $emailManager->delete($email);

        $dispatcher = $this->container->get('event_dispatcher');
        $dispatcher->dispatch(EmailEvents::DELETE_EMAIL, new Event());

        $alertMessage = $this->get('jumph_app.alert_message');
        $alertMessage->success('Email deleted!');

        return $this->redirect($this->generateUrl('jumph_email_overview'));
    }
}
