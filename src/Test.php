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
	public static function assertEquals( $expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false ) {
		parent::assertEquals( $expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase );

		if ( ! $expected ) {
			throw new \PHPUnit_Framework_RiskyTestError( sprintf(
				'A falsey expected value is being used in assertEquals(). Type: %s, value: %s.',
				gettype( $expected ),
				str_replace( "\n", '', var_export( $expected, true ) )
			) );
		}

		if ( ! $actual ) {
			throw new \PHPUnit_Framework_RiskyTestError( sprintf(
				'A falsey actual value is being used in assertEquals(). Type: %s, value: %s.',
				gettype( $actual ),
				str_replace( "\n", '', var_export( $actual, true ) )
			) );
		}
	}
}
