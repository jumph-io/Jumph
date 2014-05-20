<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle\Controller;

use Jumph\Bundle\ClientBundle\Entity\Company;
use Jumph\Bundle\ClientBundle\Entity\Employee;
use Jumph\Bundle\ClientBundle\Form\Type\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class EmployeeController extends Controller
{

    /**
     * @Template("JumphClientBundle:Employee:overview.html.twig")
     * @ParamConverter("Company", class="JumphClientBundle:Company")
     *
     * Client overview page
     *
     * @param Company $company
     *
     * @return Response A Response instance
     */
    public function overviewAction(Company $company)
    {
        return array();
    }

    /**
     * @Template("JumphClientBundle:Employee:view.html.twig")
     * @ParamConverter("Company", class="JumphClientBundle:Company")
     * @ParamConverter("Employee", class="JumphClientBundle:Employee")
     *
     * View employee
     *
     * @param Company $company
     * @param Employee $employee
     *
     * @return Response A Response instance
     */
    public function viewAction(Company $company, Employee $employee)
    {
        return array();
    }

    /**
     * @Template("JumphClientBundle:Employee:form.html.twig")
     * @ParamConverter("Company", class="JumphClientBundle:Company")
     *
     * Add employee
     *
     * @param Request $request A Request instance
     * @param Company $company
     *
     * @return Response A Response instance
     */
    public function addAction(Request $request, Company $company)
    {
        $employee = new Employee();
        $employeeForm = $this->createForm(new EmployeeType(), $employee);

        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_employee_overview'));
        }

        return array(
            'employeeForm' => $employeeForm->createView()
        );
    }

    /**
     * @Template("JumphClientBundle:Employee:form.html.twig")
     * @ParamConverter("Company", class="JumphClientBundle:Company")
     * @ParamConverter("Employee", class="JumphClientBundle:Employee")
     *
     * Edit employee
     *
     * @param Request $request A Request instance
     * @param Company $company
     * @param Employee $employee
     *
     * @return Response A Response instance
     */
    public function editAction(Request $request, Company $company, Employee $employee)
    {
        $employeeForm = $this->createForm(new EmployeeType(), $employee);

        if ($request->isMethod('POST')) {
            return $this->redirect($this->generateUrl('jumph_employee_overview'));
        }

        return array(
            'employeeForm' => $employeeForm->createView()
        );
    }

    /**
     * Delete employee
     *
     * @return Response A Response instance
     */
    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('jumph_employee_overview'));
    }
}
