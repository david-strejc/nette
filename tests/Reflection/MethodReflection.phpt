<?php

/**
 * Test: MethodReflection tests.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */

use Nette\Reflection\MethodReflection;



require __DIR__ . '/../initialize.php';



class A {
	static function foo($a, $b) {
		return $a + $b;
	}
}

class B extends A {
	function bar() {}
}

$methodInfo = new MethodReflection('B', 'foo');
Assert::equal( new Nette\Reflection\ClassReflection('A'), $methodInfo->getDeclaringClass() );


Assert::null( $methodInfo->getExtension() );


Assert::same( 23, $methodInfo->callback->invoke(20, 3) );
