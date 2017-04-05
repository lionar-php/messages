<?php

namespace Messages\Tests;

use Messages\Body;
use Messages\Section;
use Mockery;
use Testing\TestCase;

class BodyTest extends TestCase
{
	private $sections = [ ];
	private $body, $section = null;

	public function setUp ( )
	{
		$this->section = Mockery::mock ( Section::class );
		$this->sections = [ $this->section ];
		$this->body = new Body ( $this->sections );
	}
	/*
	|--------------------------------------------------------------------------
	| Constructor
	|--------------------------------------------------------------------------
	|
	| In this section we test that we can create a new body with sections. 
	*/

	/**
	 * @test
	 * @expectedException TypeError
	 */
	public function __construct_withArrayWithNonSectionObjects_throwsException ( )
	{
		$body = new Body ( [ 'Not a valid section object' ] );
	}

	/**
	 * @test
	 */
	public function __construct_withSectionsArray_addsSectionsArrayToBody ( )
	{
		$body = new Body ( $this->sections );
		assertThat ( $body->sections, hasItemInArray ( $this->section ) );
	}
}