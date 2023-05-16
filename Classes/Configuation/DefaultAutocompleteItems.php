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
 * Last modified: 16.05.23, 17:59
 */

namespace TRAW\Powermailautocomplete\Configuation;

class DefaultAutocompleteItems
{
    public static function get(): array
    {
        $LLL = 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:';

        return [
            [$LLL . 'on', 'on', '', 'general'],
            [$LLL . 'off', 'off', '', 'general'],
            [$LLL . 'name', 'name', '', 'name'],
            [$LLL . 'honorific-prefix', 'honorific-prefix', '', 'name'],
            [$LLL . 'given-name', 'given-name', '', 'name'],
            [$LLL . 'additional-name', 'additional-name', '', 'name'],
            [$LLL . 'family-name', 'family-name', '', 'name'],
            [$LLL . 'honorific-suffix', 'honorific-suffix', '', 'name'],
            [$LLL . 'nickname', 'nickname', '', 'name'],
            [$LLL . 'email', 'email', '', 'general'],
            [$LLL . 'username', 'username', '', 'user'],
            [$LLL . 'current-password', 'current-password', '', 'user'],
            [$LLL . 'one-time-code', 'one-time-code', '', 'user'],
            [$LLL . 'bday', 'bday', '', 'bday'],
            [$LLL . 'bday-day', 'bday-day', '', 'bday'],
            [$LLL . 'bday-month', 'bday-month', '', 'bday'],
            [$LLL . 'bday-year', 'bday-year', '', 'bday'],
        ];
    }
}