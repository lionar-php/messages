<?php

namespace Messages;

use Accessibility\Readable;

class Message
{
	use Readable;

	private $title, $body = null;

	public function __construct ( Title $title, Body $body )
	{
		$this->title = $title;
		$this->body = $body;
	}
}