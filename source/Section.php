<?php

namespace Messages;

use Accessibility\Readable;
use InvalidArgumentException;

class Section
{
	use Readable;

	private $name = '';
	private $header = null;
	private $paragraphs = [ ];

	public function __construct ( string $name, Header $header, array $paragraphs )
	{
		$this->name = $name;
		$this->header = $header;
		$this->addInitialParagraphs ( $paragraphs );
	}

	public function add ( Paragraph $paragraph )
	{
		$this->paragraphs [ ] = $paragraph;
	}

	private function addInitialParagraphs ( array $paragraphs )
	{
		if ( empty ( $paragraphs ) )
			throw new InvalidArgumentException ( 'There must be at least one paragraph in a section.' );
		foreach ( $paragraphs as $paragraph )
			$this->add ( $paragraph );
	}
}