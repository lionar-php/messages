<?php

namespace Lionar\Messages\Tests;

use 	Lionar\Messages\Message,
	Lionar\Testing\TestCase,
	Mockery;

class MessageTest extends TestCase
{
	public function setUp ( )
	{
		$this->paragraph = Mockery::mock ( 'Lionar\\Messages\\Paragraph' );
	}

	/**
	 * @test
	 * @dataProvider bodyTexts
     */
	public function __get_withBodyProperty_returnsSetBody ( $body )
	{
		$this->paragraph->shouldReceive( '__toString' )->once ( )->andReturn ( $body );
		$message = new Message ( $this->paragraph );
		$this->assertEquals ( $body , ( string ) $message->body );
	}

	/**
	 * @test
	 * @dataProvider bodyTexts
     	 */
	public function __toString_withBodyProperty_returnsSetBody ( $body )
	{
		$this->paragraph->shouldReceive ( '__toString' )->once ( )->andReturn ( $body );
		$message = new Message ( $this->paragraph );
		$this->assertEquals ( $body , ( string ) $message );
	}

	public function bodyTexts ( )
	{
		return array (

			array ( 'my body text' ),
			array ( 'after years of development' )
		);
	}
}