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
 * Last modified: 17.05.23, 14:03
 */
declare(strict_types=1);

namespace TRAW\Powermailautocomplete\ViewHelpers;

use In2code\Powermail\Domain\Model\Field;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class AutocompleteViewHelper
 */
class AutocompleteViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('field', Field::class, 'Field', true);
    }

    /**
     * render the value for the autocomplete attribute
     *
     * @return string
     */
    /**
     * render the value for the autocomplete attribute
     *
     * @return string
     */
    public function render(): string
    {
        $field = $this->arguments['field'];

        [$autocompleteTokens, $token, $section, $type, $purpose]
            = [
            '',
            $field->getAutocompleteToken(),
            trim($field->getAutocompleteSection()),
            $field->getAutocompleteType(),
            $field->getAutocompletePurpose(),
        ];

        // If token is empty or 'on'/'off', other tokens are not allowed.
        if (empty($token) || in_array($token, ['on', 'off'])) {
            return $token;
        }

        // Optional section token must begin with the string 'section-'
        if (!empty($section)) {
            if ($this->tokenIsAllowedForSection($token)) {
                $autocompleteTokens .= 'section-' . $section . ' ';
            }
        }

        // Optional type token must be either 'shipping' or 'billing'
        if (!empty($type)) {
            if ($this->tokenIsAllowedForType($token, $type)) {
                $autocompleteTokens .= $type . ' ';
            }
        }

        // Optional purpose token is only allowed for certain autofill-field tokens
        if (!empty($purpose)) {
            if ($this->tokenIsAllowedForPurpose($token, $purpose)) {
                $autocompleteTokens .= $purpose . ' ';
            }
        }

        return $autocompleteTokens . $token;
    }


    /**
     * @param string $token
     * @param string $type
     *
     * @return bool
     */
    protected function tokenIsAllowedForType(string $token, string $type): bool
    {
        $allowedTypes = ['shipping', 'billing'];
        $tokensNotSupportingType = ['nickname', 'sex', 'impp', 'url', 'organization-title', 'tel-country-code', 'tel-area-code', 'tel-national', 'tel-local', 'tel-local-prefix', 'tel-local-suffix', 'tel-extension', 'username', 'new-password', 'current-password', 'one-time-code', 'bday', 'bday-day', 'bday-month', 'bday-year', 'language', 'photo'];
        return in_array($type, $allowedTypes)
            && !in_array($token, $tokensNotSupportingType);
    }


    /**
     * @param string $token
     * @param string $purpose
     *
     * @return bool
     */
    protected function tokenIsAllowedForPurpose(string $token, string $purpose): bool
    {
        $allowedPurposes = ['home', 'work', 'mobile', 'fax', 'pager'];
        $tokensSupportingPurpose = ['tel', 'email', 'impp'];

        return in_array($type, $allowedPurposes, true)
            && !in_array($token, $tokensSupportingPurpose, true);
    }

    /**
     * @param string $token
     *
     * @return bool
     */
    protected function tokenIsAllowedForSection(string $token): bool
    {
        $tokensNotSupportingSection = ['nickname', 'sex', 'impp', 'url', 'organization-title', 'username', 'new-password', 'current-password', 'one-time-code', 'bday', 'bday-day', 'bday-month', 'bday-year', 'language', 'photo'];
        return !in_array($token, $tokensNotSupportingSection, true);
    }
}
