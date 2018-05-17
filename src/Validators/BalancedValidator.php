<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;
use Bracy\Exceptions\EmptyContentException;

/**
 * Balanced validator encapsulation
 */
class BalancedValidator implements BracketValidatorInterface
{
    /**
     * Validator to check a string for illegal characters
     *
     * @var CharsValidatorInterface $charsValidator
     */
    private $charsValidator;

    /**
     * BalancedValidator constructor
     *
     * @param CharsValidatorInterface $charsValidator
     */
    public function __construct(CharsValidatorInterface $charsValidator)
    {
        $this->charsValidator = $charsValidator;
    }

    /**
     * {@inheritDoc}
     *
     * @throws EmptyContentException
     * @throws \InvalidArgumentException
     */
    public function isValid(Bracy $bracy): bool
    {
        $inputString = $bracy->getInputString();

        // checks if the string is empty
        if (empty($inputString)) {
            throw new EmptyContentException(
                'Provided string is empty.'
            );
        }

        // validates if the string contains illegal characters
        if (!($this->charsValidator->isValid($bracy))) {
            throw new \InvalidArgumentException(
                'Provided string contains invalid characters.'
            );
        }

        $inputCharArray = str_split($inputString);

        $openingBrace = $bracy->getOpeningChar();
        $closingBrace = $bracy->getClosingChar();

        return $this->isArrayBalanced(
            $openingBrace,
            $closingBrace,
            $inputCharArray
        );
    }

    /**
     * Verify an array consisting exclusively
     * of brackets if they are balanced.
     *
     * @param $openingBrace
     * @param $closingBrace
     * @param $inputCharArray
     *
     * @return bool
     */
    private function isArrayBalanced(
        string $openingBrace,
        string $closingBrace,
        array $inputCharArray
    ): bool {
        $purelyBracedArray = array_intersect(
            $inputCharArray,
            [$openingBrace, $closingBrace]
        );

        $balancedStack = new \SplStack();

        foreach ($purelyBracedArray as $char) {
            /* @var string $char */
            if ($char == $openingBrace) {
                $balancedStack->push($char);
                continue;
            }

            if ($balancedStack->isEmpty()) {
                return false;
            }

            $balancedStack->pop();
        }

        return $balancedStack->isEmpty();
    }
}
