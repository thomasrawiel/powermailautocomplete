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
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_field', [
    'autocomplete_section' => [
        'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.section',
        'config' => [
            'type' => 'input',
            'eval' => 'trim',
            'max' => '100',
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
        'displayCond' => [
            'AND' => [
                'FIELD:type:IN:input,textarea',
                'FIELD:autocomplete_token:!IN:on,off',
                'FIELD:autocomplete_token:REQ:true',
            ],
        ],
    ],
    'autocomplete_type' => [
        'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => '', 'value' => ''],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:billing', 'value' => 'billing'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:shipping', 'value' => 'shipping'],
            ],
        ],
        'displayCond' => [
            'AND' => [
                'FIELD:type:IN:input,textarea',
                'FIELD:autocomplete_token:!IN:on,off',
                'FIELD:autocomplete_token:REQ:true',
            ],
        ],
    ],
    'autocomplete_purpose' => [
        'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.purpose',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => '', 'value' => ''],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:home', 'value' => 'home'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:work', 'value' => 'work'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:mobile', 'value' => 'mobile'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:fax', 'value' => 'fax'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:pager', 'value' => 'pager'],
            ],

        ],
        'displayCond' => [
            'AND' => [
                'FIELD:type:IN:input,textarea',
                'FIELD:autocomplete_token:IN:email,impp,tel,tel-country-code,tel-national,tel-area-code,tel-local,tel-local-prefix,tel-local-suffix,tel-extension',
            ],
        ],
    ],
    'autocomplete_token' => [
        'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.token',
        'description' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:tca.token-description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'itemsProcFunc' => 'TRAW\Powermailautocomplete\Hooks\AutoCompleteItemsProcFunc->getAutoCompleteItems',
            'itemsProcConfig' => [
                'useDefaultItems' => true,
            ],
            'items' => [
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:none', 'value' => ''],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:on', 'value' => 'on', 'icon' => '', 'group' => 'general'],
                ['label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:off', 'value' => 'off', 'icon' => '', 'group' => 'general'],
            ],
            'itemGroups' => [
                'general' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.general',
                'name' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.name',
                'contact' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.contact',
                'address' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.address',
                'tel' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.tel',
                'bday' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.bday',
                'user' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.user',
                'cc' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.cc',
                'other' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.other',

            ],
            'default' => '',
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
        'displayCond' => [
            'OR' => [
                'FIELD:type:=:input',
                'FIELD:type:=:textarea',
            ],
        ],
    ],
]);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_powermail_domain_model_field', '--palette--;;autocomplete,--palette--;;autocomplete_additional', '', 'after:description');

$GLOBALS['TCA']['tx_powermail_domain_model_field']['palettes']['autocomplete'] = [
    'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:palette.autocomplete',
    'showitem' => 'autocomplete_token,autocomplete_purpose',
];
$GLOBALS['TCA']['tx_powermail_domain_model_field']['palettes']['autocomplete_additional'] = [
    'label' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:palette.additional',
    'showitem' => 'autocomplete_section,autocomplete_type',
];
