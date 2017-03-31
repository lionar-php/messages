<?php

namespace Messages\Tests;

use Messages\Text;
use	Mockery;
use	Testing\TestCase;

class TextTest extends TestCase
{
	private $text = null;

	public function setUp ( )
	{
		$this->text = new Text;
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function __construct_withEmptyString_throwsInvalidArgumentException ( )
	{
		$this->text->__invoke ( '' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider nonStringValues
	 */
	public function __construct_withNonStringValue_throwsInvalidArgumentException ( $value )
	{
		$this->text->__invoke ( $value );
	}

	/**
	 * @test
     	 */
	public function __construct_withStringThatContainsAtLeastOneCharacter_setsTheText ( )
	{
		$validText = 'Eyesign beta release';
		$this->text->__invoke ( $validText );
		$this->assertEquals ( $validText, ( string ) $this->text );
	}

	/**
	 * @test
     	 */
	public function __construct_withStringThatContainsHTMLtags_escapesTheTagsAndSetsTheOutcomeOfThatEscapingAsText( )
	{
		$htmlTaggedText = '<h1>hello world</h1>';
		$htmlEscapedText = '&lt;h1&gt;hello world&lt;/h1&gt;';

		$this->text->__invoke ( $htmlTaggedText );
		$this->assertEquals ( $htmlEscapedText, ( string ) $this->text );
	}
}