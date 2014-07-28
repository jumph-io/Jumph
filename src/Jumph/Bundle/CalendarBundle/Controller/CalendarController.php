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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CalendarController extends Controller
{

    /**
     * @Template("JumphCalendarBundle:Calendar:overview.html.twig")
     *
     * Calendar overview page
     *
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {

        return array();
    }
}
