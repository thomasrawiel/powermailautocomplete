<?php
defined('TYPO3') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'powermailautocomplate',
    'Configuration/TypoScript/',
    'Powermail Autocomplete'
);
