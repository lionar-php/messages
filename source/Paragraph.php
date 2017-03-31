<?php

namespace Messages;

use InvalidArgumentException;

class Paragraph
{
	protected $text = null;

	public function with ( Text $text )
	{				
		if ( strlen ( $text ) > 140 )
			throw new InvalidArgumentException ( 'the text for a paragraph should not be empty and should contain no more than 140 characters' );
		$this->text = $text;
		return $this;
	}

	public function __toString ( )
	{
		return ( string ) $this->text;
	}
}