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
 * Class HookParseWiget
 * @package Trilobit\BootstrapBundle
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class HookParseWiget
{
    public function addBootstrapClasses($strBuffer, $that)
    {
        $arrClasses = array();

        if (   $that->addBootstrap
            || $that->addBootstrapCheckbox
            || $that->addBootstrapRadio
            || $that->addBootstrapSubmit
        )
        {
            // add classes
            foreach (array('Xs', 'Sm', 'Md', 'Lg') as $key)
            {
                foreach (array('Label', 'Field') as $kkey)
                {
                    if (   $that->addBootstrapCol
                        && $that->{'bootstrapCol' . $kkey . $key} !== ''
                    )
                    {
                        $arrClasses[$kkey][] = strtolower('col-' . $key . '-' . $that->{'bootstrapCol' . $kkey . $key});
                    }
                }
            }

            //post process classes
            foreach (array('Label', 'Field') as $kkey)
            {
                $that->{'class' . $kkey} = implode
                (
                    ' ',
                    array_unique($arrClasses[$kkey])
                );
            }

            // show inline (radio, checkbox)
            $that->blnInline = false;
            if ($that->bootstrapFieldInline !== '')
            {
                $that->blnInline = true;
            }

            // set form type
            $objForm = \FormModel::findById($that->pid);

            $that->bootstrapFormType = $objForm->bootstrapFormType;

            $that->classButton = ($that->bootstrapButtonType ? $that->bootstrapButtonType : '');

            // field disabled
            $that->blnDisabled = false;
            if ($that->bootstrapFieldDisabled !== '')
            {
                $that->blnDisabled = true;
                $that->arrAttributes['disabled'] = 'disabled';
            }

            // field readonly
            $that->blnReadonly = false;
            if ($that->bootstrapFieldReadonly !== '')
            {
                $that->blnReadonly = true;
                $that->arrAttributes['readonly'] = 'readonly';
            }

            // generate field
            $strBuffer = $that->inherit();
        }

        return $strBuffer;
    }
}
