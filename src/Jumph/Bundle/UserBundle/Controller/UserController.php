<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\UserBundle\Controller;

use Jumph\Bundle\UserBundle\Entity\User;
use Jumph\Bundle\UserBundle\Form\Filter\UserFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Controller to manage users
 */
class UserController extends Controller
{

    /**
     * User overview page
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $filterForm = $this->createForm(new UserFilterType());
        $filterForm->handleRequest($request);

        $filter = $this->get('jumph_user.user_filter');

        return $this->render('JumphUserBundle:User:overview.html.twig', array(
            'filterForm' => $filterForm->createView(),
            'users' => $filter->getPaginatedResults(
                $filterForm,
                $request->query->get('page', 1),
                15
            )
        ));
    }

    /**
     * @ParamConverter("user", class="JumphUserBundle:User", options={"id" = "userId"})
     *
     * View user
     *
     * @param User $user
     *
     * @return Response A Response instance
     */
    public function viewAction(User $user)
    {
        return $this->render('JumphUserBundle:User:view.html.twig', array(
            'user' => $user
        ));
    }

    /**
     * Add user
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_user_overview'));
        }

        return $this->render('JumphUserBundle:User:form.html.twig', array(

        ));
    }

    /**
     * @ParamConverter("user", class="JumphUserBundle:User", options={"id" = "userId"})
     *
     * Edit user
     *
     * @param Request $request A Request instance
     * @param User $user
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, User $user)
    {
        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_user_overview'));
        }

        return $this->render('JumphUserBundle:User:form.html.twig', array(

        ));
    }

    /**
     * @ParamConverter("user", class="JumphUserBundle:User", options={"id" = "userId"})
     *
     * Delete user
     *
     * @param User $user
     *
     * @return RedirectResponse A Response instance
     */
    public function deleteAction(User $user)
    {
        $userManager = $this->get('jumph_user.user_manager');
        $userManager->delete($user);

        $alertMessage = $this->get('jumph_app.alert_message');
        $alertMessage->success('User deleted!');

        return $this->redirect($this->generateUrl('jumph_user_overview'));
    }
}
