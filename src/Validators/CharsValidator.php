<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

class CharsValidator implements CharsValidatorInterface
{
    /**
     * Pattern of allowed characters for regex validation
     *
     * @var string
     */
    private $allowedChars;

    /**
     * CharsValidator constructor.
     *
     * @param string $allowedChars
     */
    public function __construct(string $allowedChars = " \n\t\r")
    {
        $this->allowedChars = $allowedChars;
    }

    /**
     * @return string
     */
    public function getAllowedChars(): string
    {
        return $this->allowedChars;
    }

    /**
     * @param Bracy $bracy
     *
     * @return bool
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

        $allowedCharsArray = [
            $this->allowedChars,
            $openingChar,
            $closingChar
        ];

        return count(
                array_diff(
                    str_split($bracy->getInputString()),
                    $allowedCharsArray
                )
            ) === 0;
    }
}
