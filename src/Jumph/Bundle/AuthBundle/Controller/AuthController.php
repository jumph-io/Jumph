<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\AuthBundle\Controller;

use Jumph\Bundle\UserBundle\Entity\Role;
use Jumph\Bundle\UserBundle\Entity\User;
use Jumph\Bundle\UserBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AuthController extends Controller
{
    /**
     * @Template("JumphAuthBundle:Auth:register.html.twig")
     *
     * Form to register a user. This method is temporary till a installation page has been completed
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $role = new Role();
        $role->setName('admin');
        $role->setRole('ROLE_ADMIN');
        $user->addRole($role);

        $registerForm = $this->createForm(new UserType(), $user);
        $userRepository = $this->get('jumph_user.user_repository');

        if ($request->isMethod('POST')) {
            $registerForm->handleRequest($request);
            if ($registerForm->isValid()) {

                // Set password
                $hash = $this->get('security.encoder_factory')
                    ->getEncoder($user)
                    ->encodePassword($registerForm->get('password')->getData(), null);
                $user->setPassword($hash);

                $userRepository->create($user);
                return $this->redirect($this->generateUrl('jumph_dashboard_overview'));
            }
        }

        return array(
            'registerForm' => $registerForm->createView(),
        );
    }

    /**
     * @Template("JumphAuthBundle:Auth:login.html.twig")
     *
     * Log as user in
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }

        return array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContextInterface::LAST_USERNAME),
            'error'         => $error,
        );
    }
}
