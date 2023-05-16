<?php
defined('TYPO3') || die('Access denied.');

//add autocomplete tokens, see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_form', [
    'autocomplete_token' => [
        'label' => 'Autocomplete token',
        'description' => 'See https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete#values',
        'config' => [
            'exclude' => false,
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:none', ''],
                ['LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:on', 'on'],
                ['LLL:EXT:powermailautocomplete/Resources/Private/Language/locallang_db.xlf:off', 'off'],
            ],
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
        ],
    ],
]);

$GLOBALS['TCA']['tx_powermail_domain_model_form']['palettes']['autocomplete'] = [
    'showitem' => 'autocomplete_token'
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_powermail_domain_model_form', '--palette--;;autocomplete', '', 'after:css');
