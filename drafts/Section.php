<?php

// may a section be empty?
// no that doesn't make any sense right?

$section = new Section;

foreach ( $paragraphs as $paragraph )
	$section->add ( $paragraph );