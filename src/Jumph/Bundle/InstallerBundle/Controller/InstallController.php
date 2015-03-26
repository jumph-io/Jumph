<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\InstallerBundle\Controller;

use Jumph\Bundle\InstallerBundle\Form\Type\AdminUserType;
use Jumph\Bundle\InstallerBundle\Form\Type\DatabaseType;
use Jumph\Bundle\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once dirname(__FILE__).'/../../../../../app/SymfonyRequirements.php';

class InstallController extends Controller
{

    /**
     * Check if system complies
     *
     * @return Response A Response instance
     */
    public function requirementsAction()
    {
        $symfonyRequirements = new \SymfonyRequirements();
        $requirements = $symfonyRequirements->getRequirements();

        return $this->render("JumphInstallerBundle:Install:requirements.html.twig", array(
            'requirements' => $requirements
        ));
    }

    /**
     * Check if system complies
     *
     * @return Response A Response instance
     */
    public function recommendationsAction()
    {
        $symfonyRequirements = new \SymfonyRequirements();
        $recommendations = $symfonyRequirements->getRecommendations();

        return $this->render("JumphInstallerBundle:Install:recommendations.html.twig", array(
            'recommendations' => $recommendations
        ));
    }

    /**
     * Install database page
     *
     * @param Request $request
     *
     * @return Response A Response instance
     */
    public function databaseAction(Request $request)
    {
        $databaseForm = $this->createForm(new DatabaseType());

        if ($request->isMethod('POST')) {
            $databaseForm->handleRequest($request);
            if ($databaseForm->isValid()) {
                $this->get('jumph_install.parameter_persister')->dumpParameters($databaseForm->getData());

                return $this->redirect($this->generateUrl('jumph_install_user'));
            }
        }

        return $this->render("JumphInstallerBundle:Install:database.html.twig", array(
            'databaseForm' => $databaseForm->createView()
        ));
    }

    /**
     * Install user page
     *
     * @param Request $request
     *
     * @return Response A Response instance
     */
    public function userAction(Request $request)
    {
        $user = new User();
        $adminUserForm = $this->createForm(new AdminUserType(), $user);

        if ($request->isMethod('POST')) {
            $adminUserForm->handleRequest($request);
            if ($adminUserForm->isValid()) {

                $user->setEnabled(true);

                // Set password
                $hash = $this->get('security.encoder_factory')
                    ->getEncoder($user)
                    ->encodePassword($adminUserForm->get('password')->getData(), null);
                $user->setPassword($hash);

                $userManager = $this->get('jumph_user.user_manager');
                $userManager->create($user);

                return $this->redirect($this->generateUrl('fos_user_security_login'));
            }
        }

        return $this->render("JumphInstallerBundle:Install:user.html.twig", array(
            'adminUserForm' => $adminUserForm->createView()
        ));
    }
}
