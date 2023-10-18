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
final class TextareaViewHelper extends AbstractFormFieldViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'textarea';

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerTagAttribute('autofocus', 'string', 'Specifies that a text area should automatically get focus when the page loads');
        $this->registerTagAttribute('rows', 'int', 'The number of rows of a text area');
        $this->registerTagAttribute('cols', 'int', 'The number of columns of a text area');
        $this->registerTagAttribute('disabled', 'string', 'Specifies that the input element should be disabled when the page loads');
        $this->registerTagAttribute('placeholder', 'string', 'The placeholder of the textarea');
        $this->registerArgument('errorClass', 'string', 'CSS class to set if there are errors for this ViewHelper', false, 'f3-form-error');
        $this->registerTagAttribute('readonly', 'string', 'The readonly attribute of the textarea', false);
        $this->registerArgument('required', 'bool', 'Specifies whether the textarea is required', false, false);
        $this->registerTagAttribute('autocomplete', 'string', 'The autocomplete token',);
        $this->registerUniversalTagAttributes();
    }

    public function render(): string
    {
        $required = $this->arguments['required'];
        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);
        $this->setRespectSubmittedDataValue(true);

        $this->tag->forceClosingTag(true);
        $this->tag->addAttribute('name', $name);
        if ($required === true) {
            $this->tag->addAttribute('required', 'required');
        }
        $this->tag->setContent(htmlspecialchars((string)$this->getValueAttribute()));
        $this->addAdditionalIdentityPropertiesIfNeeded();
        $this->setErrorClassAttribute();

        return $this->tag->render();
    }
}
