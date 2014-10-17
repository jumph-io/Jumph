<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\IssueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IssueController extends Controller
{

    /**
     * Issue overview page
     *
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        return $this->render("JumphIssueBundle:Issue:overview.html.twig");
    }
}
