<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\EmailBundle;

class EmailEvents
{
    /**
     * The create.email event is thrown each time an email is created within the system
     *
     * @var string
     */
    const CREATE_EMAIL = "create.email";

    /**
     * The update.email event is thrown each time an email is updated within the system
     *
     * @var string
     */
    const UPDATE_EMAIL = "update.email";

    /**
     * The delete.email event is thrown each time an email is deleted within the system
     *
     * @var string
     */
    const DELETE_EMAIL = "delete.email";
}
