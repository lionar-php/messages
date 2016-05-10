<?php

namespace Lionar\Messages\Tests;

use 	Lionar\Messages\Paragraph,
	Lionar\Testing\TestCase,
	Mockery;

class ParagraphTest extends TestCase
{
	private $paragraph, $text = null;

	public function setUp ( )
	{
		$this->paragraph = new Paragraph;
		$this->text = Mockery::mock ( 'Lionar\\Messages\\Text' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
     	 */
	public function with_withTextThatContainsMoreThan140Characters_throwsInvalidArgumentException ( )
	{
		$stringLongerThan140Characters = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Aliquam ut consequat lectus, eu venenatis nibh. Sed interdum ante eu eleifend ante eu sed interdum';

		$this->text->shouldReceive ( '__toString' )->once ( )->andReturn ( $stringLongerThan140Characters );
		$this->paragraph->with ( $this->text );
	}

	/**
	 * @test
     	 */
	public function with_withTextThatContainsAtLeastOneCharacterButNoMoreThan140Characters_setsTheParagraphText( )
	{
		$validParagraph = 'Eyesign beta release';
		$this->text->shouldReceive ( '__toString' )->twice ( )->andReturn ( $validParagraph );
		$this->paragraph->with ( $this->text );
		$this->assertEquals ( $validParagraph, ( string ) $this->paragraph );
	}
}