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
use Jumph\Bundle\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Template("JumphUserBundle:User:overview.html.twig")
     *
     * User overview page
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $userManager = $this->get('jumph_user.user_manager');

        return array(
            'users' => $userManager->getPaginatedResults($request->query->get('page', 1))
        );
    }

    /**
     * @Template("JumphUserBundle:User:view.html.twig")
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
        return array(
            'user' => $user
        );
    }

    /**
     * @Template("JumphUserBundle:User:form.html.twig")
     *
     * Add user
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {

    }

    /**
     * @Template("JumphUserBundle:User:form.html.twig")
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
