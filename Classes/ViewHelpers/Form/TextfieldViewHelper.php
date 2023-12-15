<?php

declare(strict_types=1);

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

use TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper;

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
final class TextfieldViewHelper extends AbstractFormFieldViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'input';

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerTagAttribute('autofocus', 'string', 'Specifies that an input should automatically get focus when the page loads');
        $this->registerTagAttribute('disabled', 'string', 'Specifies that the input element should be disabled when the page loads');
        $this->registerTagAttribute('maxlength', 'int', 'The maxlength attribute of the input field (will not be validated)');
        $this->registerTagAttribute('readonly', 'string', 'The readonly attribute of the input field');
        $this->registerTagAttribute('size', 'int', 'The size of the input field');
        $this->registerTagAttribute('placeholder', 'string', 'The placeholder of the textfield');
        $this->registerTagAttribute('pattern', 'string', 'HTML5 validation pattern');
        $this->registerTagAttribute('autocomplete', 'string', 'The autocomplete token');
        $this->registerArgument('errorClass', 'string', 'CSS class to set if there are errors for this ViewHelper', false, 'f3-form-error');
        $this->registerUniversalTagAttributes();
        $this->registerArgument('required', 'bool', 'If the field is required or not', false, false);
        $this->registerArgument('type', 'string', 'The field type, e.g. "text", "email", "url" etc.', false, 'text');
    }

    public function render(): string
    {
        $required = $this->arguments['required'];
        $type = $this->arguments['type'];

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

        $this->addAdditionalIdentityPropertiesIfNeeded();
        $this->setErrorClassAttribute();

        return $this->tag->render();
    }
}
