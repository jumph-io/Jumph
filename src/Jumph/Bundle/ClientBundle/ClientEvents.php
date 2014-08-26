<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ClientBundle;

class ClientEvents
{
    /**
     * The create.company event is thrown each time a company is created within the system
     *
     * @var string
     */
    const CREATE_COMPANY = "create.company";

    /**
     * The update.company event is thrown each time a company is updated within the system
     *
     * @var string
     */
    const UPDATE_COMPANY = "update.company";

    /**
     * The delete.company event is thrown each time a company is deleted within the system
     *
     * @var string
     */
    const DELETE_COMPANY = "delete.company";

    /**
     * The create.employee event is thrown each time a employee is created within the system
     *
     * @var string
     */
    const CREATE_EMPLOYEE = "create.employee";

    /**
     * The update.employee event is thrown each time a employee is updated within the system
     *
     * @var string
     */
    const UPDATE_EMPLOYEE = "update.employee";

    /**
     * The delete.employee event is thrown each time a employee is deleted within the system
     *
     * @var string
     */
    const DELETE_EMPLOYEE = "delete_employee";
}
