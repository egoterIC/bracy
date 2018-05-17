<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

/**
 * This interface defines the methods common to
 * each Bracy data object validator.
 */
interface BracyValidatorInterface
{
    /**
     * @param Bracy $bracy
     *
     * @return bool
     */
    public function isValid(Bracy $bracy): bool;
}
