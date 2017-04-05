<?php

namespace Messages\Tests;

use Messages\Text;
use Mockery;
use Testing\TestCase;

class TextTest extends TestCase
{
	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function __construct_withEmptyString_throwsException ( )
	{
		$text = Mockery::mock ( Text::class, [ '' ] );
	}

	/**
	 * @test
	 */
	public function __construct_withTextNoMoreThan140Characters_setsTextOnParagraph ( )
	{
		$text = 'Finally our website is finished. Checkout our awesome website at: http://eyedouble.nl';
		$textObject = Mockery::mock ( Text::class, [ $text ] );
		assertThat ( $textObject->text, is ( identicalTo ( $text ) ) );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function __construct_withTextMoreThan140Characters_throwsException ( )
	{
		$text = 'Finally our website is finished. Checkout our awesome website at: http://eyedouble.nl. It is the most awesome website ever build. By the way this paragraph has way to many characters for anybody to even care about.';
		$text = Mockery::mock ( Text::class, [ $text ] );
	}

	/**
	 * @test
	 */
	public function __construct_withWrongPunctuatedText_autoCorrectsPunctuation ( )
	{
		$text = 'finally our website is finished. checkout our awesome website at: http://eyedouble.nl. don\'t you think it\'s awesome? i think it is! do you?';
		$text = Mockery::mock ( Text::class, [ $text ] );
		assertThat ( $text->text, is ( identicalTo ( 'Finally our website is finished. Checkout our awesome website at: http://eyedouble.nl. Don\'t you think it\'s awesome? I think it is! Do you?' ) ) );
	}
}