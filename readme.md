# Falsey assertEquals Detector

Detects usage of `assertEquals()` with falsey values and marks the test as risky.

## Usage

Use the trait in your base test class:

```php
class My_Test extends PHPUnit_Framework_TestCase {

    use \FalseyAssertEqualsDetector\Test;

    public function testSomethingFalsey() {
        $this->assertEquals( 0, false );
    }
}
```

Any time one of your tests calls `assertEquals()`, the test will be marked as risky if either the expected value or the actual value are falsey.
