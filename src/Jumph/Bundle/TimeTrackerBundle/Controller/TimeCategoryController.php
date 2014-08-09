<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\TimeTrackerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TimeCategoryController extends Controller
{
    /**
     * @Template("JumphTimeTrackerBundle:TimeCategory:overview.html.twig")
     *
     * Time category overview page
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_time_tracker_overview'));
        }

        return array(

        );
    }
}
