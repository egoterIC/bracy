<?php

namespace Bracy\Validators;

use Bracy\DTO\Bracy;

interface BracketValidatorInterface
{
    public function isValid(Bracy $bracy): bool;
}