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
 * Class ContentBootstrapStop
 *
 * @author trilobit GmbH <http://www.trilobit.de>
 */
class ContentBootstrapStop extends \ContentElement
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapStop';


    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
        }

        if (empty($_SESSION['Trilobit']['BootstrapBundle']['wrappers'])) return;

        $arrTmp = array_keys($_SESSION['Trilobit']['BootstrapBundle']['wrappers']);
        $intLast = end($arrTmp);

        foreach (array_keys($_SESSION['Trilobit']['BootstrapBundle']['wrappers'][$intLast]) as $key)
        {
            $this->Template->{$key} = $_SESSION['Trilobit']['BootstrapBundle']['wrappers'][$intLast][$key];
        }

        unset($_SESSION['Trilobit']['BootstrapBundle']['wrappers'][$intLast]);
    }
}
