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
 * ViewHelper which creates a text field :html:`<input type="text">`.
 *
 * Examples
 * ========
 *
 * Example::
 *
 *    <f:form.textfield name="myTextBox" value="default value" />
 *
 * Output::
 *
 *    <input type="text" name="myTextBox" value="default value" />
 */
class TextfieldViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
{
    /**
     * Initialize the arguments.
     *
     * @throws \TYPO3Fluid\Fluid\Core\ViewHelper\Exception
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerTagAttribute('autocomplete', 'string', 'The autocomplete token',);
    }

    /**
     * Renders the textfield.
     *
     * @return string
     */
    public function render()
    {
        $required = $this->arguments['required'] ?? false;
        $type = $this->arguments['type'] ?? null;

        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);
        $this->setRespectSubmittedDataValue(true);

        $this->tag->addAttribute('type', $type);
        $this->tag->addAttribute('name', $name);

        $value = $this->getValueAttribute();

        if ($value !== null) {
            $this->tag->addAttribute('value', $value);
        }

        if ($required !== false) {
            $this->tag->addAttribute('required', 'required');
        }

        $autocomplete = $this->arguments['autocomplete'] ?? null;
        if (!empty($autocomplete)) {
            $this->tag->addAttribute('autocomplete', $autocomplete);
        }

        $this->addAdditionalIdentityPropertiesIfNeeded();
        $this->setErrorClassAttribute();

        return $this->tag->render();
    }
}
