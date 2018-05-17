<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

/**
 * Encapsulation Bracy DTO fields validator
 *
 * Acts as a precondition for the matching brackets check.
 */
class CharsValidator implements CharsValidatorInterface
{
    /**
     * Sequence of allowed characters for
     * allowed characters validation
     *
     * @var string
     */
    private $allowedChars;

    /**
     * CharsValidator constructor
     *
     * @param string $allowedChars
     */
    public function __construct(string $allowedChars = " \n\t\r")
    {
        $this->allowedChars = $allowedChars;
    }

    /**
     * Return valid characters sequence
     *
     * @return string
     */
    public function getAllowedChars(): string
    {
        return $this->allowedChars;
    }

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     */
    public function isValid(Bracy $bracy): bool
    {
        $openingChar = $bracy->getOpeningChar();
        $closingChar = $bracy->getClosingChar();

        if ($openingChar == $closingChar) {
            throw new \InvalidArgumentException(
                'Opening and closing brackets must not be equal.'
            );
        }

        $allowedCharsArray = str_split(
            stripcslashes($this->allowedChars)
        );
        $allowedCharsArray[] = $openingChar;
        $allowedCharsArray[] = $closingChar;

        $inputStringArray = str_split($bracy->getInputString());
        $differenceArray = array_diff($inputStringArray, $allowedCharsArray);

        return empty($differenceArray);
    }
}
