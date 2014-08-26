<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\ProjectBundle;

class ProjectEvents
{
    /**
     * The create.project event is thrown each time a project is created within the system
     *
     * @var string
     */
    const CREATE_PROJECT = "create.project";

    /**
     * The update.project event is thrown each time a project is updated within the system
     *
     * @var string
     */
    const UPDATE_PROJECT = "update.project";

    /**
     * The delete.project event is thrown each time a project is deleted within the system
     *
     * @var string
     */
    const DELETE_PROJECT = "delete.project";
}
