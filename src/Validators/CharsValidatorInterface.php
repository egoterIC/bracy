<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

/**
 * Representation of fields validator of Bracy DTO
 */
interface CharsValidatorInterface extends BracyValidatorInterface
{
    /**
     * Checks Bracy data object for validity of fields
     *
     * {@inheritDoc}
     */
    public function isValid(Bracy $bracy): bool;
}
