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

/**
 * Table
 */

$arrDraft = array();


// Configuration
$arrDraft['bootstrap'] = array
(
    'tl_article' => array
    (
        'subpalettes' => array
        (
            'addBootstrap'                => 'bootstrapContainerType,addBootstrapLayoutContainer,addBootstrapRow,addBootstrapCol,addBootstrapVisibility',
            'addBootstrapLayoutContainer' => 'bootstrapLayoutContainerClass',
            'addBootstrapCol'             => 'bootstrapColXs,bootstrapColSm,bootstrapColMd,bootstrapColLg,addBootstrapColOffset,addBootstrapColPush',
            'addBootstrapColOffset'       => 'bootstrapColXsOffset,bootstrapColSmOffset,bootstrapColMdOffset,bootstrapColLgOffset',
            'addBootstrapColPush'         => 'bootstrapColXsPush,bootstrapColSmPush,bootstrapColMdPush,bootstrapColLgPush',
            'addBootstrapVisibility'      => 'bootstrapHiddenXs,bootstrapHiddenSm,bootstrapHiddenMd,bootstrapHiddenLg'
                . ',bootstrapVisibleXsBlock,bootstrapVisibleSmBlock,bootstrapVisibleMdBlock,bootstrapVisibleLgBlock'
                . ',bootstrapVisibleXsInline,bootstrapVisibleSmInline,bootstrapVisibleMdInline,bootstrapVisibleLgInline'
                . ',bootstrapVisibleXsInlineBlock,bootstrapVisibleSmInlineBlock,bootstrapVisibleMdInlineBlock,bootstrapVisibleLgInlineBlock'
                . ',bootstrapHiddenPrint,bootstrapVisiblePrintBlock,bootstrapVisiblePrintInline,bootstrapVisiblePrintInlineBlock',
        ),
        'exeptions' => array(),
    ),
    'tl_content' => array
    (
        'palettes' => array
        (
            'bootstrap_start' => '{type_legend},type;{bootstrap_legend:hide},bootstrapContainerType,addBootstrapLayoutContainer,addBootstrapRow,addBootstrapCol,addBootstrapVisibility;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop',
        ),
        'subpalettes' => array
        (
            'addBootstrap'                => 'addBootstrapCol,addBootstrapVisibility',
            'addBootstrapLayoutContainer' => 'bootstrapLayoutContainerClass',
            'addBootstrapCol'             => 'bootstrapColXs,bootstrapColSm,bootstrapColMd,bootstrapColLg,addBootstrapColOffset,addBootstrapColPush',
            'addBootstrapColOffset'       => 'bootstrapColXsOffset,bootstrapColSmOffset,bootstrapColMdOffset,bootstrapColLgOffset',
            'addBootstrapColPush'         => 'bootstrapColXsPush,bootstrapColSmPush,bootstrapColMdPush,bootstrapColLgPush',
            'addBootstrapVisibility'      => 'bootstrapHiddenXs,bootstrapHiddenSm,bootstrapHiddenMd,bootstrapHiddenLg'
                . ',bootstrapVisibleXsBlock,bootstrapVisibleSmBlock,bootstrapVisibleMdBlock,bootstrapVisibleLgBlock'
                . ',bootstrapVisibleXsInline,bootstrapVisibleSmInline,bootstrapVisibleMdInline,bootstrapVisibleLgInline'
                . ',bootstrapVisibleXsInlineBlock,bootstrapVisibleSmInlineBlock,bootstrapVisibleMdInlineBlock,bootstrapVisibleLgInlineBlock'
                . ',bootstrapHiddenPrint,bootstrapVisiblePrintBlock,bootstrapVisiblePrintInline,bootstrapVisiblePrintInlineBlock',
        ),
        'exeptions' => array
        (
            '__selector__',
            'bootstrap_start',
            'html',
            'accordionSingle',
            'accordionStart',
            'accordionStop',
            'sliderStart',
            'sliderStop',
        ),
    ),
    'tl_form' => array
    (
        'subpalettes' => array
        (
            'addBootstrap' => 'bootstrapFormType',
        ),
        'exeptions' => array(),
    ),
    'tl_form_field' => array
    (
        'subpalettes' => array
        (
            'addBootstrap'         => 'addBootstrapCol,bootstrapFieldDisabled,bootstrapFieldReadonly',
            'addBootstrapRadio'    => 'addBootstrapCol,bootstrapFieldInline,bootstrapFieldDisabled,bootstrapFieldReadonly',
            'addBootstrapCheckbox' => 'addBootstrapCol,bootstrapFieldInline,bootstrapFieldDisabled,bootstrapFieldReadonly',
            'addBootstrapSubmit'   => 'addBootstrapCol,bootstrapFieldDisabled,bootstrapFieldReadonly,bootstrapButtonType',
            'addBootstrapCol'      => 'bootstrapColLabelXs,bootstrapColLabelSm,bootstrapColLabelMd,bootstrapColLabelLg,bootstrapColFieldXs,bootstrapColFieldSm,bootstrapColFieldMd,bootstrapColFieldLg',
        ),
        'exeptions' => array
        (
            '__selector__',
            'explanation',
            'html',
            'fieldset',
            'hidden',
            'divider',
        ),
    ),
);


// Fields
$arrDraft['fields']['addBootstrap'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrap'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('submitOnChange'=>true, 'tl_class'=>'clr w50 cbx'),
    'sql'       => "char(1) NOT NULL default ''"
);


foreach (array('Xs', 'Sm', 'Md', 'Lg') as $key)
{
    if ($strTable !== 'tl_form' && $strTable !== 'tl_form_field')
    {
        $arrDraft['fields']['bootstrapVisible' . $key . 'Block'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapVisible' . $key . 'Block'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class'=>'w25 cbx'),
            'sql'       => "char(1) NOT NULL default ''"
        );

        $arrDraft['fields']['bootstrapVisible' . $key . 'Inline'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapVisible' . $key . 'Inline'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class'=>'w25 cbx'),
            'sql'       => "char(1) NOT NULL default ''"
        );

        $arrDraft['fields']['bootstrapVisible' . $key . 'InlineBlock'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapVisible' . $key . 'InlineBlock'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class'=>'w25 cbx'),
            'sql'       => "char(1) NOT NULL default ''"
        );

        $arrDraft['fields']['bootstrapHidden' . $key] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapHidden' . $key],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class'=>'w25 cbx'),
            'sql'       => "char(1) NOT NULL default ''"
        );

        $arrDraft['fields']['bootstrapCol' . $key . 'Offset'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapCol' . $key . 'Offset'],
            'inputType' => 'select',
            'options'   => array(0,1,2,3,4,5,6,7,8,9,10,11,12),
            'eval'      => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w25'),
            'sql'       => "char(64) NOT NULL default ''"
        );

        $arrDraft['fields']['bootstrapCol' . $key . 'Push'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapCol' . $key . 'Push'],
            'inputType' => 'select',
            'options'   => array(1,2,3,4,5,6,7,8,9,10,11,12),
            'eval'      => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w25'),
            'sql'       => "char(64) NOT NULL default ''"
        );

    }

    $arrVariants = ($strTable === 'tl_form_field' ? array('Label', 'Field') : array(''));

    if ($strTable !== 'tl_form')
    {
        foreach ($arrVariants as $kkey)
        {
            $arrDraft['fields']['bootstrapCol' . $kkey . $key] = array
            (
                'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapCol' . $kkey . $key],
                'inputType' => 'select',
                'options'   => array(1,2,3,4,5,6,7,8,9,10,11,12),
                'eval'      => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w25'),
                'sql'       => "char(64) NOT NULL default ''"
            );
        }
    }
}


if ($strTable !== 'tl_form' && $strTable !== 'tl_form_field')
{
    foreach (array('HiddenPrint', 'VisiblePrintBlock', 'VisiblePrintInline', 'VisiblePrintInlineBlock') as $key)
    {
        $arrDraft['fields']['bootstrap' . $key] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrap' . $key],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class' => 'w25'),
            'sql'       => "char(1) NOT NULL default ''"
        );
    }

    $arrDraft['fields']['bootstrapContainerType'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapContainerType'],
        'inputType' => 'select',
        'default'   => '',
        'options'   => array('container', 'container-fluid'),
        'reference' => &$GLOBALS['TL_LANG']['bootstrap']['options']['bootstrapContainerType'],
        'eval'      => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'clr w50'),
        'sql'       => "char(64) NOT NULL default ''"
    );

    $arrDraft['fields']['addBootstrapLayoutContainer'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrapLayoutContainer'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('submitOnChange'=>true, 'tl_class'=>'clr cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );

    $arrDraft['fields']['bootstrapLayoutContainerClass'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapLayoutContainerClass'],
        'inputType' => 'text',
        'eval'      => array('maxlength'=>255, 'tl_class'=>'w50'),
        'sql'       => "varchar(255) NOT NULL default ''"
    );

    if ($strTable === 'tl_article' || $strTable === 'tl_content')
    {
        $arrDraft['fields']['addBootstrapRow'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrapRow'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => array('tl_class'=>'clr w50 cbx'),
            'sql'       => "char(1) NOT NULL default ''"
        );

        $arrDraft['fields']['bootstrapRowSubclass'] = array
        (
            'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapRowSubclass'],
            'inputType' => 'text',
            'eval'      => array('maxlength'=>255, 'tl_class'=>'w50 clr'),
            'sql'       => "varchar(255) NOT NULL default ''"
        );
    }

    $arrDraft['fields']['addBootstrapColOffset'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrapColOffset'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('submitOnChange'=>true, 'tl_class'=>'clr cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );

    $arrDraft['fields']['addBootstrapColPush'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrapColPush'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('submitOnChange'=>true, 'tl_class'=>'clr cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );

    $arrDraft['fields']['addBootstrapVisibility'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrapVisibility'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('submitOnChange'=>true, 'tl_class'=>'clr cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );
}


if ($strTable !== 'tl_form')
{
    $arrDraft['fields']['addBootstrapCol'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['addBootstrapCol'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('submitOnChange'=>true, 'tl_class'=>'clr w50 cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );
}


if ($strTable === 'tl_form')
{
    $arrDraft['fields']['bootstrapFormType'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapFormType'],
        'inputType' => 'select',
        'options'   => array('form-inline', 'form-horizontal'),
        'eval'      => array('mandatory'=>true, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'clr w50'),
        'sql'       => "char(64) NOT NULL default ''"
    );

}


if ($strTable === 'tl_form_field')
{
    $arrDraft['fields']['addBootstrapRadio']    = $arrDraft['fields']['addBootstrap'];
    $arrDraft['fields']['addBootstrapCheckbox'] = $arrDraft['fields']['addBootstrap'];
    $arrDraft['fields']['addBootstrapSubmit']   = $arrDraft['fields']['addBootstrap'];

    $arrDraft['fields']['bootstrapFieldDisabled'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapFieldDisabled'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('tl_class'=>'clr w50 cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );

    $arrDraft['fields']['bootstrapFieldReadonly'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapFieldReadonly'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('tl_class'=>'w50 cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );

    $arrDraft['fields']['bootstrapFieldInline'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapFieldInline'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => array('tl_class'=>'clr w50 cbx'),
        'sql'       => "char(1) NOT NULL default ''"
    );

    $arrDraft['fields']['bootstrapFieldSize'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapFieldSize'],
        'inputType' => 'select',
        'options'   => array('input-lg', 'input-sm'),
        'eval'      => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'clr w50'),
        'sql'       => "char(64) NOT NULL default ''"
    );

    $arrDraft['fields']['bootstrapButtonType'] = array
    (
        'label'     => &$GLOBALS['TL_LANG']['bootstrap']['bootstrapButtonType'],
        'inputType' => 'select',
        'options'   => array('btn btn-default', 'btn btn-primary', 'btn btn-success', 'btn btn-info', 'btn btn-warning', 'btn btn-danger', 'btn btn-link'),
        'eval'      => array('chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
        'sql'       => "char(64) NOT NULL default ''"
    );
}


// Paletes
$GLOBALS['TL_DCA'][$strTable]['palettes'] = array_merge
(
    (is_array($GLOBALS['TL_DCA'][$strTable]['palettes'])     ? $GLOBALS['TL_DCA'][$strTable]['palettes']     : array()),
    (is_array($arrDraft['bootstrap'][$strTable]['palettes']) ? $arrDraft['bootstrap'][$strTable]['palettes'] : array())
);


// Subpaletes
$GLOBALS['TL_DCA'][$strTable]['subpalettes'] = array_merge
(
    (is_array($GLOBALS['TL_DCA'][$strTable]['subpalettes'])     ? $GLOBALS['TL_DCA'][$strTable]['subpalettes']     : array()),
    (is_array($arrDraft['bootstrap'][$strTable]['subpalettes']) ? $arrDraft['bootstrap'][$strTable]['subpalettes'] : array())
);


// Selectors
$GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'] = array_merge
(
    (is_array($GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']) ? $GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']    : array()),
    (is_array($arrDraft['bootstrap'][$strTable]['subpalettes'])          ? array_keys($arrDraft['bootstrap'][$strTable]['subpalettes']) : array())
);


// Fields
$GLOBALS['TL_DCA'][$strTable]['fields'] = array_merge
(
    (is_array($GLOBALS['TL_DCA'][$strTable]['fields']) ? $GLOBALS['TL_DCA'][$strTable]['fields'] : array()),
    (is_array($arrDraft['fields'])                     ? $arrDraft['fields']                     : array())
);
