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
 * Last modified: 17.05.23, 11:03
 */

declare(strict_types=1);

namespace TRAW\Powermailautocomplete\Domain\Model;

/**
 * Class Field
 */
class Field extends \In2code\Powermail\Domain\Model\Field
{
    /**
     * @var string
     */
    protected string $autocompleteToken = '';

    /**
     * @var string
     */
    protected string $autocompleteSection = '';

    /**
     * @var string
     */
    protected string $autocompleteType = '';

    /**
     * @var string
     */
    protected string $autocompletePurpose = '';

    /**
     * @return string
     */
    public function getAutocompleteSection(): string
    {
        return $this->autocompleteSection;
    }

    /**
     * @param string $autocompleteSection
     */
    public function setAutocompleteSection(string $autocompleteSection): void
    {
        $this->autocompleteSection = $autocompleteSection;
    }

    /**
     * @return string
     */
    public function getAutocompleteType(): string
    {
        return $this->autocompleteType;
    }

    /**
     * @param string $autocompleteType
     */
    public function setAutocompleteType(string $autocompleteType): void
    {
        $this->autocompleteType = $autocompleteType;
    }

    /**
     * @return string
     */
    public function getAutocompletePurpose(): string
    {
        return $this->autocompletePurpose;
    }

    /**
     * @param string $autocompletePurpose
     */
    public function setAutocompletePurpose(string $autocompletePurpose): void
    {
        $this->autocompletePurpose = $autocompletePurpose;
    }

    /**
     * @return string
     */
    public function getAutocompleteToken(): string
    {
        return $this->autocompleteToken;
    }

    /**
     * @param string $autocompleteToken
     */
    public function setAutocompleteToken(string $autocompleteToken): void
    {
        $this->autocompleteToken = $autocompleteToken;
    }
}
