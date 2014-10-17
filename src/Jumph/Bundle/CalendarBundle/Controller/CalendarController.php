<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{

    /**
     * Calendar overview page
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        return $this->render("JumphCalendarBundle:Calendar:overview.html.twig");
    }
}
