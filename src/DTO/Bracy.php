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
     * Opening brace
     *
     * @var string
     */
    private $openingBrace;

    /**
     * Closing brace
     *
     * @var string
     */
    private $closingBrace;

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
    )
    {
        $this->inputString = $userInput;
        $this->openingBrace = $openingChar;
        $this->closingBrace = $closingChar;
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
    public function getOpeningBrace(): string
    {
        return $this->openingBrace;
    }

    /**
     * @return string
     */
    public function getClosingBrace(): string
    {
        return $this->closingBrace;
    }
}
