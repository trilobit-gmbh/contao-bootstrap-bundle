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

$strTable = 'tl_form';

$arrDraft = array
(
    'palettes' => array
    (
        '__selector__' => array(),
    ),
    'subpalettes' => array(),
    'fields' => array(),
);

require 'bootstrap.php';


\Controller::loadLanguageFile('bootstrap');


// Palettes
$GLOBALS['TL_DCA'][$strTable]['palettes']['default'] = str_replace
(
    ';{template_legend',
    ';{bootstrap_legend:hide},addBootstrap;{template_legend',
    $GLOBALS['TL_DCA'][$strTable]['palettes']['default']
);
