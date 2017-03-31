<?php

namespace Messages;

use InvalidArgumentException;

class Text
{
	protected $text = '';

	public function __invoke ( $string )
	{
		if ( ! is_string ( $string ) or empty ( $string ) )
			throw new InvalidArgumentException ( 'you did not provide a valid string' );
		$this->text = htmlentities ( $string );
		return $this;
	}

	public function __toString ( )
	{
		return $this->text;
	}
}