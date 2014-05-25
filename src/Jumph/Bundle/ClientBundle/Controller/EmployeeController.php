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
     * @ParamConverter("company", class="JumphClientBundle:Company", options={"id" = "companyId"})
     *
     * Client overview page
     *
     * @param Request $request A Request instance
     * @param Company $company
     *
     * @return Response A Response instance
     */
    public function overviewAction(Request $request, Company $company)
    {
        $employeeRepository = $this->get('jumph_client.employee_repository');

        return array(
            'employees' => $employeeRepository->getPaginatedResults($company, $request->query->get('page', 1)),
            'company' => $company
        );
    }

    /**
     * @Template("JumphClientBundle:Employee:view.html.twig")
     * @ParamConverter("company", class="JumphClientBundle:Company", options={"id" = "companyId"})
     * @ParamConverter("employee", class="JumphClientBundle:Employee", options={"id" = "employeeId"})
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
        return array(
            'company' => $company,
            'employee' => $employee
        );
    }

    /**
     * @Template("JumphClientBundle:Employee:form.html.twig")
     * @ParamConverter("company", class="JumphClientBundle:Company", options={"id" = "companyId"})
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
        $employee->setCompany($company);
        $employeeForm = $this->createForm(new EmployeeType(), $employee);

        if ($request->isMethod('POST')) {
            $employeeForm->handleRequest($request);
            if ($employeeForm->isValid()) {
                $employeeRepository = $this->get('jumph_client.employee_repository');
                $employeeRepository->create($employee);

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Employee created!');

                return $this->redirect(
                    $this->generateUrl(
                        'jumph_employee_overview',
                        array(
                            'companyId' => $company->getId()
                        )
                    )
                );
            }
        }

        return array(
            'employeeForm' => $employeeForm->createView(),
            'company' => $company
        );
    }

    /**
     * @Template("JumphClientBundle:Employee:form.html.twig")
     * @ParamConverter("company", class="JumphClientBundle:Company", options={"id" = "companyId"})
     * @ParamConverter("employee", class="JumphClientBundle:Employee", options={"id" = "employeeId"})
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
            $employeeForm->handleRequest($request);
            if ($employeeForm->isValid()) {
                $employeeRepository = $this->get('jumph_client.employee_repository');
                $employeeRepository->update($employee);

                $alertMessage = $this->get('jumph_app.alert_message');
                $alertMessage->success('Employee updated!');

                return $this->redirect(
                    $this->generateUrl(
                        'jumph_employee_overview',
                        array(
                            'companyId' => $company->getId()
                        )
                    )
                );
            }
        }

        return array(
            'employeeForm' => $employeeForm->createView(),
            'company' => $company
        );
    }

    /**
     * @ParamConverter("company", class="JumphClientBundle:Company", options={"id" = "companyId"})
     * @ParamConverter("employee", class="JumphClientBundle:Employee", options={"id" = "employeeId"})
     *
     * Delete employee
     *
     * @param Company $company
     * @param Employee $employee
     *
     * @return Response A Response instance
     */
    public function deleteAction(Company $company, Employee $employee)
    {
        $employeeRepository = $this->get('jumph_client.employee_repository');
        $employeeRepository->delete($employee);

        $alertMessage = $this->get('jumph_app.alert_message');
        $alertMessage->success('Employee deleted!');

        return $this->redirect(
            $this->generateUrl(
                'jumph_employee_overview',
                array(
                    'companyId' => $company->getId()
                )
            )
        );
    }
}
