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

use Jumph\Bundle\TimeTrackerBundle\Entity\TimeCategory;
use Jumph\Bundle\TimeTrackerBundle\Form\Filter\TimeCategoryFilterType;
use Jumph\Bundle\TimeTrackerBundle\Form\Type\TimeCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class TimeCategoryController extends Controller
{
    /**
     * Time category overview page
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request)
    {
        $filterForm = $this->createForm(new TimeCategoryFilterType());
        $filterForm->handleRequest($request);

        $filter = $this->get('jumph_time_tracker.time_category_filter');

        return $this->render("JumphTimeTrackerBundle:TimeCategory:overview.html.twig", array(
            'filterForm' => $filterForm->createView(),
            'timeCategories' => $filter->getPaginatedResults(
                $filterForm,
                $request->query->get('page', 1),
                15
            )
        ));
    }

    /**
     * @ParamConverter("timeCategory", class="JumphTimeTrackerBundle:TimeCategory", options={"id" = "timeCategoryId"})
     *
     * View time category
     *
     * @param TimeCategory $timeCategory
     *
     * @return Response A Response instance
     */
    public function viewAction(TimeCategory $timeCategory)
    {
        return $this->render("JumphTimeTrackerBundle:TimeCategory:view.html.twig", array(
            'timeCategory' => $timeCategory
        ));
    }

    /**
     * Add time category
     *
     * @param Request $request A Request instance
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request)
    {
        $timeCategory = new TimeCategory();
        $timeCategoryForm = $this->createForm(new TimeCategoryType(), $timeCategory);

        if ($request->isMethod('POST')) {
            $timeCategoryForm->handleRequest($request);
            if ($timeCategoryForm->isValid()) {
                $timeCategoryManager = $this->get('jumph_time_tracker.time_category_manager');
                $timeCategoryManager->create($timeCategory);

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Time category created!');

                return $this->redirect($this->generateUrl('jumph_config_time_category_overview'));
            }
        }

        return $this->render("JumphTimeTrackerBundle:TimeCategory:form.html.twig", array(
            'timeCategoryForm' => $timeCategoryForm->createView()
        ));
    }

    /**
     * @ParamConverter("timeCategory", class="JumphTimeTrackerBundle:TimeCategory", options={"id" = "timeCategoryId"})
     *
     * Edit time category
     *
     * @param Request $request A Request instance
     * @param TimeCategory $timeCategory
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, TimeCategory $timeCategory)
    {
        $timeCategoryForm = $this->createForm(new TimeCategoryType(), $timeCategory);

        if ($request->isMethod('POST')) {
            $timeCategoryForm->handleRequest($request);
            if ($timeCategoryForm->isValid()) {
                $timeCategoryManager = $this->get('jumph_time_tracker.time_category_manager');
                $timeCategoryManager->update($timeCategory);

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Time category updated!');

                return $this->redirect($this->generateUrl('jumph_config_time_category_overview'));
            }
        }

        return $this->render("JumphTimeTrackerBundle:TimeCategory:form.html.twig", array(
            'timeCategoryForm' => $timeCategoryForm->createView()
        ));
    }

    /**
     * @ParamConverter("timeCategory", class="JumphTimeTrackerBundle:TimeCategory", options={"id" = "timeCategoryId"})
     *
     * Delete time category
     *
     * @param TimeCategory $timeCategory
     *
     * @return RedirectResponse A Response instance
     */
    public function deleteAction(TimeCategory $timeCategory)
    {
        $timeCategoryManager = $this->get('jumph_time_tracker.time_category_manager');
        $timeCategoryManager->delete($timeCategory);

        $alertMessage = $this->get('jumph_app.alert_message');
        $alertMessage->success('Time category deleted!');

        return $this->redirect($this->generateUrl('jumph_config_time_category_overview'));
    }
}
