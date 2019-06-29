<?php

namespace FalseyAssertEqualsDetector;

trait Test {
	/**
	 * Asserts that two variables are equal.
	 *
	 * @param mixed  $expected
	 * @param mixed  $actual
	 * @param string $message
	 * @param float  $delta
	 * @param int    $maxDepth
	 * @param bool   $canonicalize
	 * @param bool   $ignoreCase
	 */
	public static function assertEquals( $expected, $actual, string $message = '', float $delta = 0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false ) : void {
		parent::assertEquals( $expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase );

		if ( ! $expected ) {
			throw new \PHPUnit\Framework\RiskyTestError( sprintf(
				'A falsey expected value is being used in assertEquals(). Type: %s, value: %s.',
				gettype( $expected ),
				str_replace( "\n", '', var_export( $expected, true ) )
			) );
		}

		if ( ! $actual ) {
			throw new \PHPUnit\Framework\RiskyTestError( sprintf(
				'A falsey actual value is being used in assertEquals(). Type: %s, value: %s.',
				gettype( $actual ),
				str_replace( "\n", '', var_export( $actual, true ) )
			) );
		}
	}
}
