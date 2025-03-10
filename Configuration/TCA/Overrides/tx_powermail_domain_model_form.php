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
 * Last modified: 10.03.2025 13:37
 */

defined('TYPO3') || die('Access denied.');

//add autocomplete tokens, see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_form', [
    'autocomplete_token' => [
        'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.token',
        'description' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.token-description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:none', 'value' => ''],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:on', 'value' => 'on'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:off', 'value' => 'off'],
            ],
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
    ],
]);

$GLOBALS['TCA']['tx_powermail_domain_model_form']['palettes']['autocomplete'] = [
    'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:palette.autocomplete',
    'showitem' => 'autocomplete_token',
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_powermail_domain_model_form', '--palette--;;autocomplete', '', 'after:css');
