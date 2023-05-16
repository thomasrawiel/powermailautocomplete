<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
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
