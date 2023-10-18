<?php
declare(strict_types=1);

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
 * Last modified: 16.05.23, 19:24
 */

namespace TRAW\Powermailautocomplete\ViewHelpers;

/**
 * Extends FormViewHelper class
 *
 * Register attribute autocomplete for form tag
 *
 * For more information:
 * @see \TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
 */
class FormViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
{

    /**
     * Initialize arguments.
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerTagAttribute('autocomplete', 'string', 'The autocomplete token',);
    }

    /**
     * Render the form.
     *
     * @return string rendered form
     */
    public function render(): string
    {
        if (!empty($autocomplete)) {
            $this->tag->addAttribute('autocomplete', $autocomplete);
        }

        return parent::render();
    }
}
