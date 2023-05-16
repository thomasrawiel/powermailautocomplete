<?php

declare(strict_types = 1);
namespace TRAW\Powermailautocomplete\Domain\Model;


/**
 * Class Field
 * @package TRAW\Powermailautocomplete\Domain\Model
 */
class Field extends \In2code\Powermail\Domain\Model\Field
{
    /**
     * @var string
     */
    protected string $autocompleteToken = '';

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