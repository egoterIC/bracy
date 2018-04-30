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
     */
    public function isValid(Bracy $bracy): bool
    {
        $allowedCharsPattern = sprintf(
            "/[^%s%s%s]/",
            $this->allowedChars,
            $bracy->getOpeningBrace(),
            $bracy->getClosingBrace()
        );

        return !preg_match($allowedCharsPattern, $bracy->getInputString());
    }

    /**
     * @param string $allowedChars
     *
     * @return CharsValidator
     */
    public function setAllowedChars(string $allowedChars): CharsValidator
    {
        $this->allowedChars = $allowedChars;
        return $this;
    }
}
