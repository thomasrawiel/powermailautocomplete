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
 * Last modified: 17.05.23, 14:15
 */

namespace TRAW\Powermailautocomplete\Configuation;

/**
 * Class DefaultAutocompleteItems
 */
class DefaultAutocompleteItems
{
    /**
     * @return array[]
     */
    public static function get(): array
    {
        $LLL = 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:';

        return [
            [$LLL . 'name', 'name', '', 'name'],
            [$LLL . 'honorific-prefix', 'honorific-prefix', '', 'name'],
            [$LLL . 'given-name', 'given-name', '', 'name'],
            [$LLL . 'additional-name', 'additional-name', '', 'name'],
            [$LLL . 'family-name', 'family-name', '', 'name'],
            [$LLL . 'honorific-suffix', 'honorific-suffix', '', 'name'],
            [$LLL . 'nickname', 'nickname', '', 'name'],
            [$LLL . 'sex', 'sex', '', 'name'],
            [$LLL . 'email', 'email', '', 'contact'],
            [$LLL . 'impp', 'impp', '', 'contact'],
            [$LLL . 'url', 'url', '', 'contact'],
            [$LLL . 'organization-title', 'organization-title', '', 'contact'],
            [$LLL . 'organization', 'organization', '', 'contact'],
            [$LLL . 'street-address', 'street-address', '', 'contact'],
            [$LLL . 'country', 'country', '', 'contact'],
            [$LLL . 'country-name', 'country-name', '', 'contact'],
            [$LLL . 'postal-code', 'postal-code', '', 'contact'],
            [$LLL . 'address-line1', 'address-line1', '', 'address'],
            [$LLL . 'address-line2', 'address-line2', '', 'address'],
            [$LLL . 'address-line3', 'address-line3', '', 'address'],
            [$LLL . 'address-level1', 'address-level1', '', 'address'],
            [$LLL . 'address-level2', 'address-level2', '', 'address'],
            [$LLL . 'address-level3', 'address-level3', '', 'address'],
            [$LLL . 'address-level4', 'address-level4', '', 'address'],
            [$LLL . 'tel', 'tel', '', 'tel'],
            [$LLL . 'tel-country-code', 'tel-country-code', '', 'tel'],
            [$LLL . 'tel-area-code', 'tel-area-code', '', 'tel'],
            [$LLL . 'tel-national', 'tel-national', '', 'tel'],
            [$LLL . 'tel-local', 'tel-local', '', 'tel'],
            [$LLL . 'tel-local-prefix', 'tel-local-prefix', '', 'tel'],
            [$LLL . 'tel-local-suffix', 'tel-local-suffix', '', 'tel'],
            [$LLL . 'tel-extension', 'tel-extension', '', 'tel'],
            [$LLL . 'username', 'username', '', 'user'],
            [$LLL . 'new-password', 'new-password', '', 'user'],
            [$LLL . 'current-password', 'current-password', '', 'user'],
            [$LLL . 'one-time-code', 'one-time-code', '', 'user'],
            [$LLL . 'bday', 'bday', '', 'bday'],
            [$LLL . 'bday-day', 'bday-day', '', 'bday'],
            [$LLL . 'bday-month', 'bday-month', '', 'bday'],
            [$LLL . 'bday-year', 'bday-year', '', 'bday'],
            [$LLL . 'cc-name', 'cc-name', '', 'cc'],
            [$LLL . 'cc-given-name', 'cc-given-name', '', 'cc'],
            [$LLL . 'cc-additional-name', 'cc-additional-name', '', 'cc'],
            [$LLL . 'cc-family-name', 'cc-family-name', '', 'cc'],
            [$LLL . 'cc-number', 'cc-number', '', 'cc'],
            [$LLL . 'cc-exp', 'cc-exp', '', 'cc'],
            [$LLL . 'cc-exp-month', 'cc-exp-month', '', 'cc'],
            [$LLL . 'cc-exp-year', 'cc-exp-year', '', 'cc'],
            [$LLL . 'cc-csc', 'cc-csc', '', 'cc'],
            [$LLL . 'cc-type', 'cc-type', '', 'cc'],
            [$LLL . 'transaction-currency', 'transaction-currency', '', 'cc'],
            [$LLL . 'transaction-amount', 'transaction-amount', '', 'cc'],
            [$LLL . 'language', 'language', '', 'other'],
            [$LLL . 'photo', 'photo', '', 'name'],
        ];
    }
}
