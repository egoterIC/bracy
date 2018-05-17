<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

/**
 * Representation of balanced brackets validator
 */
interface BracketValidatorInterface extends BracyValidatorInterface
{
    /**
     * Check Bracy data object for balanced brackets.
     *
     * {@inheritDoc}
     */
    public function isValid(Bracy $bracy): bool;
}
