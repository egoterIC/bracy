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

    try {
        $string = '((()))()(()))';
    
        // To account for brackets other than () use optional Bracy contructor arguments
        // like so: new Bracy($string, '{', '}');
        $bracy = new Bracy($string);

        // You can pass allowed string characters into the constructor of CharsValidator
        // Default values are: " \n\t\r"
        $validator = new BalancedValidator(new CharsValidator());

        $isBalanced = $validator->isValid($bracy);
        $result = sprintf(
            "Check complete. Brackets are %sbalanced." . PHP_EOL,
            $validator->isValid($bracy) ? '' : 'un'
        );
    } catch (EmptyContentException | \InvalidArgumentException $e) {
        $result = sprintf("%s" . PHP_EOL, $e->getMessage());
    } catch (\Throwable $e) {
        echo sprintf("Halting execution. Reason: %s" . PHP_EOL, $e->getMessage());
        exit(1);
    }
    
    echo $result; // Check complete. Brackets are unbalanced.
```