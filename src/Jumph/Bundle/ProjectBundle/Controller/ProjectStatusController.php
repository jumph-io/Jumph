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

use Jumph\Bundle\ProjectBundle\Entity\ProjectStatus;
use Jumph\Bundle\ProjectBundle\Form\Filter\ProjectStatusFilterType;
use Jumph\Bundle\ProjectBundle\Form\Type\ProjectStatusType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProjectStatusController extends Controller
{
    /**
     * Project status overview page
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $filterForm = $this->createForm(new ProjectStatusFilterType());
        $filterForm->handleRequest($request);

        $filter = $this->get('jumph_project.project_status_filter');

        return $this->render("JumphProjectBundle:ProjectStatus:overview.html.twig", array(
            'filterForm' => $filterForm->createView(),
            'projectStatuses' => $filter->getPaginatedResults(
                $filterForm,
                $request->query->get('page', 1),
                15
            )
        ));
    }

    /**
     * @ParamConverter("projectStatus", class="JumphProjectBundle:ProjectStatus", options={"id" = "projectStatusId"})
     *
     * View project
     *
     * @param ProjectStatus $projectStatus
     *
     * @return Response A Response instance
     */
    public function viewAction(ProjectStatus $projectStatus)
    {
        return $this->render("JumphProjectBundle:ProjectStatus:view.html.twig", array(
            'projectStatus' => $projectStatus
        ));
    }

    /**
     * Add project
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {
        $projectStatus = new ProjectStatus();
        $projectStatusForm = $this->createForm(new ProjectStatusType(), $projectStatus);

        if ($request->isMethod('POST')) {
            $projectStatusForm->handleRequest($request);
            if ($projectStatusForm->isValid()) {
                $projectStatusManager = $this->get('jumph_project.project_status_manager');
                $projectStatusManager->create($projectStatus);

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Project status created!');

                return $this->redirect($this->generateUrl('jumph_config_project_status_overview'));
            }
        }

        return $this->render("JumphProjectBundle:ProjectStatus:form.html.twig", array(
            'projectStatusForm' => $projectStatusForm->createView()
        ));
    }

    /**
     * @ParamConverter("projectStatus", class="JumphProjectBundle:ProjectStatus", options={"id" = "projectStatusId"})
     *
     * Edit project
     *
     * @param Request $request A Request instance
     * @param ProjectStatus $projectStatus
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, ProjectStatus $projectStatus)
    {
        $projectStatusForm = $this->createForm(new ProjectStatusType(), $projectStatus);

        if ($request->isMethod('POST')) {
            $projectStatusForm->handleRequest($request);
            if ($projectStatusForm->isValid()) {
                $projectStatusManager = $this->get('jumph_project.project_status_manager');
                $projectStatusManager->update($projectStatus);

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Project status updated!');

                return $this->redirect($this->generateUrl('jumph_config_project_status_overview'));
            }
        }

        return $this->render("JumphProjectBundle:ProjectStatus:form.html.twig", array(
            'projectStatusForm' => $projectStatusForm->createView()
        ));
    }

    /**
     * @ParamConverter("projectStatus", class="JumphProjectBundle:ProjectStatus", options={"id" = "projectStatusId"})
     *
     * Delete project
     *
     * @param ProjectStatus $projectStatus
     *
     * @return RedirectResponse A Response instance
     */
    public function deleteAction(ProjectStatus $projectStatus)
    {
        $projectStatusManager = $this->get('jumph_project.project_status_manager');
        $projectStatusManager->delete($projectStatus);

        $alertMessage = $this->get('jumph_app.alert_message');
        $alertMessage->success('Project status deleted!');

        return $this->redirect($this->generateUrl('jumph_config_project_status_overview'));
    }
}
