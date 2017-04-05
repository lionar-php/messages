<?php

namespace Messages\Tests;

use Messages\Title;
use Testing\TestCase;

class TitleTest extends TestCase
{
	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function __construct_withTextMoreThan140Characters_throwsException ( )
	{
		$text = 'Look at our new awesome website it\'s totally amazing, believe me yess it is!';
		$title = new Title ( $text );
	}
}