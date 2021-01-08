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

		if ( $expected && $actual ) {
			return;
		}

		$falsey_message = '';

		if ( $expected !== $actual ) {
			$falsey_message = "\n\n" . 'The actual value is NOT identical to the expected value.';
		}

		throw new \PHPUnit\Framework\RiskyTestError( sprintf(
			"A falsey value is being used in assertEquals().\nExpected type:  %s\nExpected value: %s\nActual type:    %s\nActual value:   %s" . $falsey_message,
			gettype( $expected ),
			str_replace( "\n", '', var_export( $expected, true ) ),
			gettype( $actual ),
			str_replace( "\n", '', var_export( $actual, true ) )
		) );
	}
}
