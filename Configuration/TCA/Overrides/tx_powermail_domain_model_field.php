<?php
defined('TYPO3') || die('Access denied.');

//add autocomplete tokens, see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_field', [
    'autocomplete_token' => [
        'label' => 'Autocomplete token',
        'description' => 'See https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete#values',
        'config' => [
            'exclude' => false,
            'type' => 'select',
            'renderType' => 'selectSingle',
            'itemsProcFunc' => 'TRAW\Powermailautocomplete\Hooks\AutoCompleteItemsProcFunc->getAutoCompleteItems',
            'itemsProcConfig' => [
                'useDefaultItems' => true,
            ],
            'items' => [
                ['LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:none', ''],
            ],
            'itemGroups' => [
                'general' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.general',
                'name' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.name',
                'user' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.user',
                'bday' => 'LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:groups.bday',
            ],
            'default' => '',
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
        ],
        'displayCond' => [
            'OR' => [
                'FIELD:type:=:input',
                'FIELD:type:=:textarea',
            ]
        ]
    ],
]);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_powermail_domain_model_field', '--palette--;;autocomplete', '', 'after:description');

$GLOBALS['TCA']['tx_powermail_domain_model_field']['palettes']['autocomplete'] = [
    'showitem' => 'autocomplete_token'
];
