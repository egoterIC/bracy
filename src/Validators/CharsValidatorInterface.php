<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

/**
 * Representation of fields validator of Bracy DTO
 */
interface CharsValidatorInterface
{
    /**
     * Checks Bracy data object for validity fields
     *
     * @param Bracy $bracy
     *
     * @return bool
     */
    public function isValid(Bracy $bracy): bool;
}
