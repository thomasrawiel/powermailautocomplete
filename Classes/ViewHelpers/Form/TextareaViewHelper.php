<?php

/*
 * Copyright notice
 *
 * (c) 2023 Thomas Rawiel <t.rawiel@lingner.com>
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 *
 * Last modified: 16.05.23, 19:24
 */

namespace TRAW\Powermailautocomplete\ViewHelpers\Form;

/**
 * Generates an :html:`<textarea>`.
 *
 * The value of the text area needs to be set via the ``value`` attribute, as with all other form ViewHelpers.
 *
 * Examples
 * ========
 *
 * Example::
 *
 *    <f:form.textarea name="myTextArea" value="This is shown inside the textarea" />
 *
 * Output::
 *
 *    <textarea name="myTextArea">This is shown inside the textarea</textarea>
 */
class TextareaViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\TextareaViewHelper
{
    /**
     * Initialize the arguments.
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerTagAttribute('autocomplete', 'string', 'The autocomplete token',);
    }

    /**
     * Renders the textarea.
     *
     * @return string
     */
    public function render()
    {
        $required = $this->arguments['required'] ?? false;
        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);
        $this->setRespectSubmittedDataValue(true);

        $this->tag->forceClosingTag(true);
        $this->tag->addAttribute('name', $name);
        if ($required === true) {
            $this->tag->addAttribute('required', 'required');
        }
        $this->tag->setContent(htmlspecialchars($this->getValueAttribute()));
        $this->addAdditionalIdentityPropertiesIfNeeded();
        $this->setErrorClassAttribute();


        $autocomplete = $this->arguments['autocomplete'] ?? null;
        if(!empty($autocomplete)) {
            $this->tag->addAttribute('autocomplete', $autocomplete);
        }
        return $this->tag->render();
    }
}
