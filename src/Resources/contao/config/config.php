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
 * Register hook to add news items to the indexer
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Trilobit\BootstrapBundle\HookParseTemplate', 'addBootstrapClasses');
//$GLOBALS['TL_HOOKS']['parseWidget'][]   = array('Trilobit\BootstrapBundle\HookParseWiget',    'addBootstrapClasses');

$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetTextField',   'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetTextArea',    'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetSelectMenu',  'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetCheckBox',    'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetRadioButton', 'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetFileUpload',  'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetPassword',    'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetCaptcha',     'addBootstrapClasses');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Trilobit\BootstrapBundle\HookParseWigetSubmit',      'addBootstrapClasses');


/**
 * Content elements
 */
$GLOBALS['TL_CTE']['bootstrap'] = array
(
    'bootstrap_start' => '\Trilobit\BootstrapBundle\ContentBootstrapStart',
    'bootstrap_stop'  => '\Trilobit\BootstrapBundle\ContentBootstrapStop',
);


/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'bootstrap_start';
$GLOBALS['TL_WRAPPERS']['stop'][]  = 'bootstrap_stop';



/**
 * Add css
 */
if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][] = 'bundles/trilobitbootstrap/css/backend.css';
}


/**
 * Update form_field palette
 */

#\Trilobit\BootstrapBundle\Helper::updateDcaPalette('tl_article',    'template_legend');
#\Trilobit\BootstrapBundle\Helper::updateDcaPalette('tl_content',    'template_legend');
#\Trilobit\BootstrapBundle\Helper::updateDcaPalette('tl_form_field', 'expert_legend');
