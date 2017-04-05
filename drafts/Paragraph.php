<?php

namespace Messages;

use Accessibility\Readable;

class Paragraph
{
	use Readable;
	
	private $text = '';

	public function __construct ( string $text )
	{
		if ( strlen ( $text ) > 140 )
			throw new InvalidArgumentException ( 'the text for a paragraph should not be empty and should contain no more than 140 characters' );
		$this->text = $text;
	}
}