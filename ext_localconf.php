<?php
defined('TYPO3') || die('Access denied.');

$container = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class);
$container->registerImplementation(
    \In2code\Powermail\Domain\Model\Field::class,
    \TRAW\Powermailautocomplete\Domain\Model\Field::class
);
$container->registerImplementation(
    \In2code\Powermail\Domain\Model\Form::class,
    \TRAW\Powermailautocomplete\Domain\Model\Form::class
);