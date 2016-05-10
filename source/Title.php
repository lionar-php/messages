<?php

namespace Lionar\Messages;

use InvalidArgumentException;

class Title
{
	private $text = null;

	public function with ( Text $text )
	{				
		if ( strlen ( $text ) > 70 )
			throw new InvalidArgumentException ( 'the text for a title should not be empty and should contain no more than 70 characters' );
		$this->text = $text;
		return $this;
	}

	public function __toString ( )
	{
		return ( string ) $this->text;
	}
}
