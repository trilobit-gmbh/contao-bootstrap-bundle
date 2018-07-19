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

$strTable = 'tl_form_field';

/*
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
*/

\Trilobit\BootstrapBundle\Helper::updateDcaPalette($strTable,    'template_legend');
