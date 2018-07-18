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
 * Class Helper
 * @package Trilobit\BootstrapBundle
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class Helper
{
    public static function checkAddBootstrap($that)
    {
        if (   $that->addBootstrap
            || $that->addBootstrapCheckbox
            || $that->addBootstrapRadio
            || $that->addBootstrapSubmit
        )
        {
            return true;
        }

        return false;
    }

    public static function addWidgetBootstrapClasses($strBuffer, $that)
    {
        $objForm = \FormModel::findById($that->pid);

        if (!self::checkAddBootstrap($objForm)) return $strBuffer;


        $arrClasses = array();

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
            if (is_array($arrClasses[$kkey]))
            {
                $that->{'class' . $kkey} = implode
                (
                    ' ',
                    array_unique($arrClasses[$kkey])
                );
            }
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

        // generate field
        $strBuffer = $that->inherit();

        return $strBuffer;
    }

    public static function addTemplateBootstrapClasses($that)
    {
        $arrClasses = array();

        if ($that->addBootstrap)
        {
            foreach (array('Xs', 'Sm', 'Md', 'Lg') as $key)
            {
                if (   $that->addBootstrapCol
                    && $that->{'bootstrapCol' . $key} !== ''
                )
                {
                    $arrClasses[] = strtolower('col-' . $key . '-' . $that->{'bootstrapCol' . $key});
                }

                if (   $that->addBootstrapColOffset
                    && $that->{'bootstrapCol' . $key . 'Offset'} !== ''
                )
                {
                    $arrClasses[] = strtolower('col-' . $key . '-offset-' . $that->{'bootstrapCol' . $key . 'Offset'});
                }

                if (   $that->addBootstrapColPush
                    && $that->{'bootstrapCol' . $key . 'Push'} !== ''
                )
                {
                    $arrClasses[] = strtolower('col-' . $key . '-push-' . $that->{'bootstrapCol' . $key . 'Push'});
                }

                if ($that->addBootstrapVisibility)
                {
                    if ($that->{'bootstrapVisible' . $key . 'Block'} !== '')
                    {
                        $arrClasses[] = strtolower('visible-' . $key . '-block');
                    }

                    if ($that->{'bootstrapVisible' . $key . 'Inline'} !== '')
                    {
                        $arrClasses[] = strtolower('visible-' . $key . '-inline');
                    }

                    if ($that->{'bootstrapVisible' . $key . 'InlineBlock'} !== '')
                    {
                        $arrClasses[] = strtolower('visible-' . $key . '-inline-block');
                    }

                    if ($that->{'bootstrapHidden' . $key} !== '')
                    {
                        $arrClasses[] = strtolower('hidden-' . $key);
                    }
                }
            }

            if ($that->addBootstrapVisibility)
            {
                if ($that->bootstrapHiddenPrint !== '')
                {
                    $arrClasses[] = strtolower('Hidden-Print');
                }

                if ($that->bootstrapVisiblePrintBlock !== '')
                {
                    $arrClasses[] = strtolower('Visible-Print-Block');
                }

                if ($that->bootstrapVisiblePrintInline !== '')
                {
                    $arrClasses[] = strtolower('Visible-Print-Inline');
                }

                if ($that->bootstrapVisiblePrintInlineBlock !== '')
                {
                    $arrClasses[] = strtolower('Visible-Print-Inline-Block');
                }
            }

            if ($that->bootstrapFormType !== '')
            {
                $that->classForm = strtolower($that->bootstrapFormType);
            }

            $that->class = implode
            (
                ' ',
                array_unique
                (
                    array_merge
                    (
                        $arrClasses,
                        explode(' ', $that->class)
                    )
                )
            );
        }
    }

    public static function updateDcaPalette($strTable=null, $strAddBefore='expert_legend')
    {
        $strAddBefore = ';{' . $strAddBefore;

        \Controller::loadDataContainer($strTable);
        \Controller::loadLanguageFile('bootstrap');

        $arrDraft = array
        (
            'palettes' => array
            (
                '__selector__' => array(),
            ),
            'subpalettes' => array(),
            'fields' => array(),
        );


        require __DIR__ . '/../dca/bootstrap.php';


        // Palettes
        foreach (array_keys($GLOBALS['TL_DCA'][$strTable]['palettes']) as $key)
        {
            if (in_array($key, $arrDraft['bootstrap'][$strTable]['exeptions'])) continue;

            $GLOBALS['TL_DCA'][$strTable]['palettes'][$key] = str_replace
            (
                $strAddBefore,
                ';{bootstrap_legend:hide},addBootstrap' . ($key === 'radio' || $key === 'checkbox' || $key === 'submit' ? ucfirst($key) : '') . $strAddBefore,
                $GLOBALS['TL_DCA'][$strTable]['palettes'][$key]
            );
        }
    }
}
