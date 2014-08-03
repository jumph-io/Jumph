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

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InstallController
{

    /**
     * @Template("JumphInstallerBundle:Install:check.html.twig")
     *
     * Check if system complies
     *
     * @return Response A Response instance
     */
    public function checkAction()
    {
        return array(

        );
    }

    /**
     * @Template("JumphInstallerBundle:Install:database.html.twig")
     *
     * Install database page
     *
     * @return Response A Response instance
     */
    public function databaseAction()
    {
         return array(

        );
    }

    /**
     * @Template("JumphInstallerBundle:Install:user.html.twig")
     *
     * Install user page
     *
     * @return Response A Response instance
     */
    public function userAction()
    {
        return array(

        );
    }
}
