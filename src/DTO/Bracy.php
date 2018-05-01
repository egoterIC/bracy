<?php

namespace Bracy\DTO;

class Bracy
{
    /**
     * Input string provided by user
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
     * Bracy constructor.
     *
     * @param string $userInput
     * @param string $openingChar
     * @param string $closingChar
     */
    public function __construct(
        string $userInput,
        string $openingChar = "(",
        string $closingChar = ")"
    ) {
        $this->inputString = $userInput;
        $this->openingChar = $openingChar;
        $this->closingChar = $closingChar;
    }

    /**
     * @return string
     */
    public function getInputString(): string
    {
        return $this->inputString;
    }

    /**
     * @return string
     */
    public function getOpeningChar(): string
    {
        return $this->openingChar;
    }

    /**
     * @return string
     */
    public function getClosingChar(): string
    {
        return $this->closingChar;
    }
}
