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

$strTable = 'tl_content';

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

// Update options
$GLOBALS['TL_DCA'][$strTable]['fields']['perRow']['options'] = array(1, 2, 3, 4, 6, 12);


// Headerfields
$GLOBALS['TL_DCA'][$strTable]['list']['sorting']['headerFields'][] = 'addBootstrap';

$GLOBALS['TL_DCA'][$strTable]['list']['sorting']['headerFields'][] = 'bootstrapContainerType';
$GLOBALS['TL_DCA'][$strTable]['list']['sorting']['headerFields'][] = 'addBootstrapRow';
