<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{

    /**
     * Dashboard overview page
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        $blocksContainer = $this->get('jumph_dashboard.dashboard_block_container');

        return $this->render("JumphDashboardBundle:Dashboard:overview.html.twig", array(
            'blocks' => $blocksContainer->getAllBlocks()
        ));
    }
}
