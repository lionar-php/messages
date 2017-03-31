<?php

namespace Messages\Tests;

use Messages\Message;
use	Mockery;
use	Testing\TestCase;

class MessageTest extends TestCase
{
	public function setUp ( )
	{
		$this->paragraph = Mockery::mock ( 'Messages\\Paragraph' );
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