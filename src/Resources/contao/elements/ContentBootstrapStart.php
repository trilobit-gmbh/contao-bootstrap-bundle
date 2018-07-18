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
 * Class ContentBootstrapStart
 *
 * @author trilobit GmbH <http://www.trilobit.de>
 */
class ContentBootstrapStart extends \ContentElement
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapStart';


    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
        }

        $this->addBootstrap = '1';

        $_SESSION['Trilobit']['BootstrapBundle']['wrappers'][$this->id] = array
        (
            'addBootstrap' => $this->addBootstrap,
            'bootstrapContainerType' => $this->bootstrapContainerType,
            'addBootstrapRow' => $this->addBootstrapRow,
            'protected' => $this->protected,
            'guests' => $this->guests,
            'invisible' => $this->invisible,
            'start' => $this->start,
            'stop' => $this->stop,
        );
    }

    /**
     * Parse the template
     *
     * @return string
     */
    public function generate()
    {
        $this->addBootstrap = '1';

        return parent::generate();
    }
}
