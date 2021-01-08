# Falsey assertEquals Detector

This package will mark a PHPUnit test as risky if it tests a falsey value with `assertEquals()`.

## Why?

`assertEquals()` isn't type sensitive which means checking falsey values with it can result in tests passing when they shouldn't. For example, this assertion passes but it's probably unexpected:

```php
$expected = false;
$actual   = 0;

assertEquals( $expected, $actual );
```

Instead, `assertSame()` should be used when testing falsey values.

This package will mark a test as risky if it tests a falsey value with `assertEquals()` so that you can investigate the test and improve its assertions as necessary.

Falsey values include:

* An empty array
* An empty string
* Boolean `false`
* Float `0.0`
* Integer `0`
* `null`
* String `'0'`

## Installation

```shell
composer require --dev johnbillion/falsey-assertequals-detector=^3
```

PHPUnit 7, 8, and 9 are supported.

* For PHPUnit 6 support, use version `^2`.
* For PHPUnit 5 support, use version `^1`.

## Usage

Use the trait in your base test class:

```diff
 class My_Test extends \PHPUnit\Framework\TestCase {
 
+    use \FalseyAssertEqualsDetector\Test;
+
     public function testSomethingFalsey() {
         $this->assertEquals( 0, false );
     }
 }
```

Any time one of your tests calls `assertEquals()`, the test will be marked as risky if either the expected value or the actual value are falsey.

## Example Output

```
1) test_foo
A falsey value is being used in assertEquals().
Expected type:  string
Expected value: ''
Actual type:    boolean
Actual value:   false
```
