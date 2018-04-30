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
     * @param Bracy $bracy
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public function isValid(Bracy $bracy): bool
    {
        $openingBrace = $bracy->getOpeningBrace();
        $closingBrace = $bracy->getClosingBrace();

        if ($openingBrace == $closingBrace) {
            throw new \InvalidArgumentException(
                'Opening and closing brackets must not be equal.'
            );
        }

        $allowedCharsPattern = sprintf(
            "/[^%s%s%s]/",
            $this->allowedChars,
            $openingBrace,
            $closingBrace
        );

        return !preg_match($allowedCharsPattern, $bracy->getInputString());
    }
}
