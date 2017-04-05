<?php

namespace Messages\Tests;

use Messages\Body;
use Messages\Message;
use Messages\Title;
use Mockery;
use Testing\TestCase;

class MessageTest extends TestCase
{
	public function setUp ( )
	{
		$this->title = Mockery::mock ( Title::class );
		$this->body = Mockery::mock ( Body::class );
	}

	/**
	 * @test
	 */
	public function __construct_withTitle_setsTitleOnMessage ( )
	{
		$message = new Message ( $this->title, $this->body );
		assertThat ( $message->title, is ( identicalTo ( $this->title ) ) );
	}

	/**
	 * @test
	 */
	public function __construct_withBody_setsBodyOnMessage ( )
	{
		$message = new Message ( $this->title, $this->body );
		assertThat ( $message->body, is ( identicalTo ( $this->body ) ) );
	}
	
}