<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bracy\DTO\Bracy;
use Bracy\Validators\BalancedValidator;
use Bracy\Validators\CharsValidator;

$bracy = new Bracy('(((())))()');

$charsValidator = new CharsValidator();
$balancedValidator = new BalancedValidator($charsValidator);
$isValid = $balancedValidator->isValid($bracy);

echo $isValid ? 'valid' : 'invalid';