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

use Jumph\Bundle\EmailBundle\Entity\Email;
use Jumph\Bundle\EmailBundle\Form\Filter\EmailFilterType;
use Jumph\Bundle\EmailBundle\Form\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class EmailController extends Controller
{

    /**
     * @Template("JumphEmailBundle:Email:overview.html.twig")
     *
     * Email overview page
     *
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $filterForm = $this->createForm(new EmailFilterType());
        $filterForm->handleRequest($request);

        $filter = $this->get('jumph_email.email_filter');

        return array(
            'filterForm' => $filterForm->createView(),
            'emails' => $filter->getPaginatedResults(
                $filterForm,
                $request->query->get('page', 1),
                15,
                array(
                    'sort' => $request->query->get('sort', 'DESC'),
                    'direction' => $request->query->get('direction', 'dateCreated')
                )
            )
        );
    }

    /**
     * @Template("JumphEmailBundle:Email:view.html.twig")
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
        return array(
            'email' => $email
        );
    }

    /**
     * @Template("JumphEmailBundle:Email:form.html.twig")
     *
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

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Email created!');

                return $this->redirect($this->generateUrl('jumph_email_overview'));
            }
        }

        return array(
            'emailForm' => $emailForm->createView()
        );
    }

    /**
     * @Template("JumphEmailBundle:Email:form.html.twig")
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

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Email updated!');

                return $this->redirect($this->generateUrl('jumph_email_overview'));
            }
        }

        return array(
            'emailForm' => $emailForm->createView()
        );
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

        $alertMessage = $this->get('jumph_app.alert_message');
        $alertMessage->success('Email deleted!');

        return $this->redirect($this->generateUrl('jumph_email_overview'));
    }
}
