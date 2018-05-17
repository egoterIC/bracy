# Bracy
[![Build Status](https://scrutinizer-ci.com/g/stolnikov/bracy/badges/build.png?b=code-review)](https://scrutinizer-ci.com/g/stolnikov/bracy/build-status/code-review)
[![Code Quality](https://scrutinizer-ci.com/g/stolnikov/bracy/badges/quality-score.png?b=code-review)](https://scrutinizer-ci.com/g/stolnikov/bracy/?branch=code-review)


Bracy is a verifier for balanced brackets in a user provided string.

# Requirements
*  PHP >= 7.1

# Installation
This package is installable and autoloadable via Composer as stolnikov/bracy.

```shell
    composer require stolnikov/bracy
```

# Usage
```php
    use Bracy\DTO\Bracy;
    use Bracy\Exceptions\EmptyContentException;
    use Bracy\Validators\BalancedValidator;
    use Bracy\Validators\CharsValidator;

    $string = '((()))()(()))';
    
    try {
        $bracy = new Bracy($string);
        $balancedValidator = new BalancedValidator(new CharsValidator());
        $isBalanced = $balancedValidator->isValid($bracy);
    } catch (EmptyContentException | \InvalidArgumentException | \Throwable $e) {
        $errorMessage = sprintf("%s" . PHP_EOL, $e->getMessage());
        $isBalanced = null;
    }
    
    if ($isValid !== null) {
        $result = sprintf(
            "Check complete. Brackets are %s." . PHP_EOL,
            $isValid ? 'balanced' : 'unbalanced'
        );
    } else {
       $result = $errorMessage;
    }
    
    echo $result; // Check complete. Brackets are unbalanced.
```