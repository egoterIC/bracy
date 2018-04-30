<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

interface CharsValidatorInterface
{
    public function isValid(Bracy $bracy): bool;
}