<?php

namespace Messages;

use Accessibility\Readable;

class Body
{
	use Readable;

	private $sections = [ ];

	public function __construct ( array $sections )
	{
		foreach ( $sections as $section )
			$this->add ( $section );
	}

	public function add ( Section $section )
	{
		$this->sections [ ] = $section;
	}
}