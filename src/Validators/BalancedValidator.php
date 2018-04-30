<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;
use Bracy\Exceptions\EmptyContentException;

class BalancedValidator implements BracketValidatorInterface
{
    /**
     * @var CharsValidator
     */
    private $charsValidator;

    /**
     * BalancedValidator constructor.
     *
     * @param $allowedCharsValidator
     */
    public function __construct(CharsValidatorInterface $charsValidator)
    {
        $this->charsValidator = $charsValidator;
    }

    /**
     * @param Bracy $bracy
     *
     * @return bool
     *
     * @throws EmptyContentException
     */
    public function isValid(Bracy $bracy): bool
    {
        if (empty($inputString = $bracy->getInputString())) {
            throw new EmptyContentException(
                'Provided string is empty.'
            );
        }

        if (!($this->charsValidator->isValid($bracy))) {
            throw new \InvalidArgumentException(
                'Provided string contains invalid characters.'
            );
        }

        $inputCharArray = str_split($inputString);

        $openingBrace = $bracy->getOpeningBrace();
        $closingBrace = $bracy->getClosingBrace();

        $balancedStack = new \SplStack();

        foreach ($inputCharArray as $char) {
            switch ($char) {
                // in case of opening bracket push it to the stack
                case $openingBrace:
                    $balancedStack->push($char);
                    break;
                case $closingBrace:
                    if ($balancedStack->isEmpty()) {
                        return false;
                    }
                    $balancedStack->pop();
                    break;
            }
        }

        return $balancedStack->isEmpty();
    }
}