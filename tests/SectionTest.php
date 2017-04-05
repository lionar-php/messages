<?php

namespace Messages\Tests;

use Messages\Header;
use Messages\Paragraph;
use Messages\Section;
use Mockery;
use Testing\TestCase;

class SectionTest extends TestCase
{
	private $section, $header = null;
	private $paragraphs = [ ];

	public function setUp ( )
	{
		$paragraph = Mockery::mock ( Paragraph::class );
		$this->header = $header = Mockery::mock ( Header::class );
		$this->paragraphs = $paragraphs = [ $paragraph ];
		$this->section = new Section ( 'Mock name', $header, $paragraphs );
	}

	/*
	|--------------------------------------------------------------------------
	| Constructor
	|--------------------------------------------------------------------------
	|
	| In this section we test that we can give the section object a name. We also
	| check that the header get's set on the section. Finally we test that the section 
	| object enforces to have at least one paragraph inside it on creation.  
	*/

	/**
	 * @test
	 */
	public function __construct_withAStringForName_setsNameAsSectionName ( )
	{
		$name = 'name';
		$section = new Section ( $name, $this->header, $this->paragraphs );
		assertThat ( $section->name, is ( identicalTo ( $name ) ) );
	}

	/**
	 * @test
	 */
	public function __construct_withHeader_addHeaderToSection ( )
	{
		$section = new Section ( 'Mock name', $this->header, $this->paragraphs );
		assertThat ( $section->header, is ( identicalTo ( $this->header ) ) );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function __construct_withEmptyParagraphsArray_throwsException ( )
	{
		$paragraphs = [ ];
		$section = new Section ( 'Mock name', $this->header, $paragraphs );
	}

	/**
	 * @test
	 * @expectedException TypeError
	 */
	public function __construct_withParahraphsArrayWithNonParagraphObject_throwsException ( )
	{
		$this->paragraphs [ ] = 'This is not a valid paragaph object';
		$section = new Section ( 'Mock name', $this->header, $this->paragraphs );
	}

	/**
	 * @test
	 */
	public function __construct_withParahraphsArray_addsParagraphsArrayToSection ( )
	{
		$section = new Section ( 'Mock name', $this->header, $this->paragraphs );
		assertThat ( $section->paragraphs, is ( identicalTo ( $this->paragraphs ) ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Add
	|--------------------------------------------------------------------------
	|
	| In this section we test that the section object can have paragraph's 
	| added to it.
	| 
	*/

	/**
	 * @test
	 */
	public function add_withParagraph_addsParagraphToSection ( )
	{
		$paragraph = Mockery::mock ( Paragraph::class );
	
		$this->section->add ( $paragraph );
		assertThat ( $this->section->paragraphs, hasItemInArray ( $paragraph ) );
	}
}