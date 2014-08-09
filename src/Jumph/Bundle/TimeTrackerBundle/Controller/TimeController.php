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

use Jumph\Bundle\TimeTrackerBundle\Entity\TimeTracker;
use Jumph\Bundle\TimeTrackerBundle\Form\Type\TimeTrackerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TimeController extends Controller
{

    /**
     * @Template("JumphTimeTrackerBundle:Time:overview.html.twig")
     *
     * Time overview page
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        $timeTracker = new TimeTracker();
        $timeTrackerForm = $this->createForm(new TimeTrackerType(), $timeTracker);

        return array(
            'timeTrackerForm' => $timeTrackerForm->createView()
        );
    }

    /**
     * Add a new time
     *
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        $timeTracker = new TimeTracker();
        $timeTrackerForm = $this->createForm(new TimeTrackerType(), $timeTracker);

        if ($request->isXMLHttpRequest() && $request->isMethod('POST')) {
            $timeTrackerForm->handleRequest($request);
            if ($timeTrackerForm->isValid()) {
                $timeTrackerManager = $this->get('jumph_time_tracker.time_tracker_manager');
                $timeTrackerManager->create($timeTracker);

                return new JsonResponse(array('status' => 'success'));
            }
        }

        return new JsonResponse(array('status' => 'error'));
    }
}
