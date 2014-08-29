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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends Controller
{

    /**
     * @Template("JumphDashboardBundle:Dashboard:overview.html.twig")
     *
     * Dashboard overview page
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        $blocksContainer = $this->get('jumph_dashboard.dashboard_block_container');

        return array(
            'blocks' => $blocksContainer->getAllBlocks()
        );
    }
}
