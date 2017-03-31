<?php

namespace Messages\Tests;

use Messages\Title;
use	Mockery;
use	Testing\TestCase;

class TitleTest extends TestCase
{
	private $title, $text = null;

	public function setUp ( )
	{
		$this->title = new Title;
		$this->text = Mockery::mock ( 'Messages\\Text' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
     	 */
	public function __construct_withStringThatContainsMoreThan70Characters_throwsInvalidArgumentException ( )
	{
		$stringLongerThan70Characters = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dignissim, odio';
		$this->text->shouldReceive ( '__toString' )->once ( )->andReturn ( $stringLongerThan70Characters );

		$this->title->with ( $this->text );
	}

	/**
	 * @test
    	 */
	public function __construct_withStringThatContainsAtLeastOneCharacterButNoMoreThan70Characters_setsTheTitleText ( )
	{
		$validTitle = 'Eyesign beta release';
		$this->text->shouldReceive ( '__toString' )->twice ( )->andReturn ( $validTitle );
		$this->title->with ( $this->text );
		$this->assertEquals ( $validTitle, ( string ) $this->title );
	}
}