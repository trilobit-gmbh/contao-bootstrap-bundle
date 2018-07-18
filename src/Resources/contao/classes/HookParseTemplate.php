<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2017 Leo Feyer
 *
 * @package     Trilobit
 * @author      trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license     LGPL-3.0-or-later
 * @copyright   trilobit GmbH
 */

namespace Trilobit\BootstrapBundle;

/**
 * Class HookParseTemplate
 * @package Trilobit\BootstrapBundle
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class HookParseTemplate
{
    public function addBootstrapClasses($that)
    {
        return Helper::addTemplateBootstrapClasses($that);
    }
}
