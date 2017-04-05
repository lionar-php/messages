<?php

namespace Messages;

use Accessibility\Readable;
use InvalidArgumentException;

abstract class Text
{
	use Readable;

	private $text = null;
	const allowedLength = 140;

	public function __construct ( string $text )
	{
		$this->check ( $text );
		$this->text = $this->capitalizeSentences ( $text );
	}

	private function capitalizeSentences ( string $text )
	{
		$text = ucfirst ( strtolower ( $text ) );

		return preg_replace_callback ( '/[.!?] .*?\w/', 
		  create_function ( '$matches', 'return strtoupper($matches[0]);' ), $text );
	}

	protected function check ( $text )
	{
		if ( empty ( $text ) )
			throw new InvalidArgumentException ( 'Text may not be empty' );

		if ( strlen ( $text ) > $this::allowedLength )
			throw new InvalidArgumentException ( 'The text exceeded the allowed character lenght of: ' . $this::allowedLength );
	}
	
	public function __toString ( )
	{
		return $this->text;
	}
}