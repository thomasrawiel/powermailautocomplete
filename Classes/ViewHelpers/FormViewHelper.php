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

namespace TRAW\Powermailautocomplete\ViewHelpers;

use TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfigurationService;
use TYPO3\CMS\Extbase\Mvc\RequestInterface;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Extbase\Security\Cryptography\HashService;
use TYPO3\CMS\Extbase\Service\ExtensionService;
use TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormViewHelper;
use TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper;

/**
 * Form ViewHelper. Generates a :html:`<form>` Tag.
 *
 * Basic usage
 * ===========
 *
 * Use :html:`<f:form>` to output an HTML :html:`<form>` tag which is targeted
 * at the specified action, in the current controller and package.
 * It will submit the form data via a POST request. If you want to change this,
 * use :html:`method="get"` as an argument.
 *
 * Examples
 * ========
 *
 * A complex form with a specified encoding type
 * ---------------------------------------------
 *
 * Form with enctype set::
 *
 *    <f:form action=".." controller="..." package="..." enctype="multipart/form-data">...</f:form>
 *
 * A Form which should render a domain object
 * ------------------------------------------
 *
 * Binding a domain object to a form::
 *
 *    <f:form action="..." name="customer" object="{customer}">
 *       <f:form.hidden property="id" />
 *       <f:form.textbox property="name" />
 *    </f:form>
 *
 * This automatically inserts the value of ``{customer.name}`` inside the
 * textbox and adjusts the name of the textbox accordingly.
 */
class FormViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
{

    /**
     * Initialize arguments.
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerTagAttribute('autocomplete', 'string', 'The autocomplete token',);
    }

    /**
     * Render the form.
     *
     * @return string rendered form
     */
    public function render()
    {
        $this->setFormActionUri();
        if (isset($this->arguments['method']) && strtolower($this->arguments['method']) === 'get') {
            $this->tag->addAttribute('method', 'get');
        } else {
            $this->tag->addAttribute('method', 'post');
        }

        if (isset($this->arguments['novalidate']) && $this->arguments['novalidate'] === true) {
            $this->tag->addAttribute('novalidate', 'novalidate');
        }

        $this->addFormObjectNameToViewHelperVariableContainer();
        $this->addFormObjectToViewHelperVariableContainer();
        $this->addFieldNamePrefixToViewHelperVariableContainer();
        $this->addFormFieldNamesToViewHelperVariableContainer();
        $formContent = $this->renderChildren();

        if (isset($this->arguments['hiddenFieldClassName']) && $this->arguments['hiddenFieldClassName'] !== null) {
            $content = LF . '<div class="' . htmlspecialchars($this->arguments['hiddenFieldClassName']) . '">';
        } else {
            $content = LF . '<div>';
        }

        $content .= $this->renderHiddenIdentityField($this->arguments['object'] ?? null, $this->getFormObjectName());
        $content .= $this->renderAdditionalIdentityFields();
        $content .= $this->renderHiddenReferrerFields();

        // Render the trusted list of all properties after everything else has been rendered
        $content .= $this->renderTrustedPropertiesField();

        $content .= LF . '</div>' . LF;
        $content .= $formContent;
        $this->tag->setContent($content);
        $this->removeFieldNamePrefixFromViewHelperVariableContainer();
        $this->removeFormObjectFromViewHelperVariableContainer();
        $this->removeFormObjectNameFromViewHelperVariableContainer();
        $this->removeFormFieldNamesFromViewHelperVariableContainer();
        $this->removeCheckboxFieldNamesFromViewHelperVariableContainer();

        $autocomplete = $this->arguments['autocomplete'] ?? null;
        if(!empty($autocomplete)) {
            $this->tag->addAttribute('autocomplete', $autocomplete);
        }

        return $this->tag->render();
    }
}