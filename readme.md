# Falsey assertEquals Detector

Detects usage of `assertEquals()` with falsey values and marks the test as risky.

## Installation

```shell
composer require --dev johnbillion/falsey-assertequals-detector=^3
```

* For PHPUnit 6 support, use version `^2`.
* For PHPUnit 5 support, use version `^1`.

## Usage

Use the trait in your base test class:

```php
class My_Test extends \PHPUnit\Framework\TestCase {

    use \FalseyAssertEqualsDetector\Test;

    public function testSomethingFalsey() {
        $this->assertEquals( 0, false );
    }
}
```

Any time one of your tests calls `assertEquals()`, the test will be marked as risky if either the expected value or the actual value are falsey.
