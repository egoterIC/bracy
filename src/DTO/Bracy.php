<?php

namespace Bracy\DTO;

/**
 * Immutable value object representing a storage for
 * user-provided string as well as valid opening and
 * closing characters
 */
class Bracy
{
    /**
     * Input expression provided by user
     *
     * @var string
     */
    private $inputString;

    /**
     * Opening char
     *
     * @var string
     */
    private $openingChar;

    /**
     * Closing char
     *
     * @var string
     */
    private $closingChar;

    /**
     * Bracy constructor
     *
     * @param string $userInput
     * @param string $openingChar
     * @param string $closingChar
     */
    public function __construct(
        string $userInput,
        string $openingChar = '(',
        string $closingChar = ')'
    ) {
        $this->inputString = $userInput;
        $this->openingChar = $openingChar;
        $this->closingChar = $closingChar;
    }

    /**
     * Return user-defined string.
     *
     * @return string
     */
    public function getInputString(): string
    {
        return $this->inputString;
    }

    /**
     * Return a character denoting opening char.
     *
     * @return string
     */
    public function getOpeningChar(): string
    {
        return $this->openingChar;
    }

    /**
     * Return a character denoting closing char.
     *
     * @return string
     */
    public function getClosingChar(): string
    {
        return $this->closingChar;
    }
}
