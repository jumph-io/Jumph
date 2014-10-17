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

class TimeController extends Controller
{

    /**
     * Time overview page
     *
     * @param Request $request
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $timeTracker = new TimeTracker();
        $timeTrackerForm = $this->createForm(new TimeTrackerType(), $timeTracker);
        $timeTrackerManager = $this->get('jumph_time_tracker.time_tracker_manager');

        return $this->render("JumphTimeTrackerBundle:TimeTracker:overview.html.twig", array(
            'timeTrackerForm' => $timeTrackerForm->createView(),
            'timeTrackers' => $timeTrackerManager->getPaginatedResults(
                $request->query->get('page', 1),
                20
            )
        ));
    }

    /**
     * Add a new time
     *
     * @param Request $request
     *
     * @return JsonResponse A Response instance
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

                return new JsonResponse(array(
                    'status' => 'success',
                    'html' => $this->renderView('JumphTimeTrackerBundle:TimeTracker:_time_line.html.twig', array(
                        'timeTracker' => $timeTracker
                    ))
                ));
            }
        }

        return new JsonResponse(array(
            'status' => 'error',
            'error' => $timeTrackerForm->getErrorsAsString()
            ));
    }
}
