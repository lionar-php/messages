<?php

namespace Lionar\Messages;

class Message
{
	protected $body = null;

	public function __construct ( Paragraph $body )
	{
		$this->body = $body;
	}

	public function __get ( $property )
	{
		if ( isset ( $this->{ $property } ) )
			return $this->{ $property };
	}

	public function __toString ( )
	{
		if ( isset ( $this->body ) )
			return ( string ) $this->body;
		return '';
	}
}
