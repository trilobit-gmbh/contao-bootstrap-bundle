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
 * Class HookParseWigetFileUpload
 * @package Trilobit\BootstrapBundle
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class HookParseWigetFileUpload extends \FormFileUpload
{
    public function addBootstrapClasses($strBuffer, $that)
    {
        if (   !Helper::checkAddBootstrap($that)
            || $that->type !== 'upload'
        )
        {
            return $strBuffer;
        }

        // field disabled
        if ($that->bootstrapFieldDisabled !== '')
        {
            $that->arrAttributes['disabled'] = 'disabled';
        }

        // field readonly
        if ($that->bootstrapFieldReadonly !== '')
        {
            $that->arrAttributes['readonly'] = 'readonly';
        }

        return Helper::addWidgetBootstrapClasses($strBuffer, $that);
    }
}
