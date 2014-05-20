<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle\Controller;

use Jumph\Bundle\ProjectBundle\Entity\Project;
use Jumph\Bundle\ProjectBundle\Form\Type\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProjectController extends Controller
{

    /**
     * @Template("JumphProjectBundle:Project:overview.html.twig")
     *
     * Project overview page
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function overviewAction()
    {
        return array();
    }

    /**
     * @Template("JumphProjectBundle:Project:view.html.twig")
     * @ParamConverter("Project", class="JumphProjectBundle:Project")
     *
     * View project
     *
     * @param Project $project
     *
     * @return Response A Response instance
     */
    public function viewAction(Project $project)
    {
        return array();
    }

    /**
     * @Template("JumphProjectBundle:Project:form.html.twig")
     *
     * Add project
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {
        $project = new Project();
        $projectForm = $this->createForm(new ProjectType(), $project);

        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_project_overview'));
        }

        return array(
            'projectForm' => $projectForm->createView()
        );
    }

    /**
     * @Template("JumphProjectBundle:Project:form.html.twig")
     * @ParamConverter("Project", class="JumphProjectBundle:Project")
     *
     * Edit project
     *
     * @param Request $request A Request instance
     * @param Project $project
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, Project $project)
    {
        $projectForm = $this->createForm(new ProjectType(), $project);

        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_project_overview'));
        }

        return array(
            'projectForm' => $projectForm->createView()
        );
    }

    /**
     * @ParamConverter("Project", class="JumphProjectBundle:Project")
     *
     * Delete project
     *
     * @param Project $project
     *
     * @return Response A Response instance
     */
    public function deleteAction(Project $project)
    {
        return $this->redirect($this->generateUrl('jumph_project_overview'));
    }
}
