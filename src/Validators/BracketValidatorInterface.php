<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

/**
 * Representation of balanced brackets validator
 */
interface BracketValidatorInterface
{
    /**
     * Check Bracy data object for balanced brackets.
     *
     * @param Bracy $bracy
     *
     * @return bool
     */
    public function isValid(Bracy $bracy): bool;
}
