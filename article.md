```php

when ( 'i want to write an article', then ( apply ( a ( 

function ( author $author, article $article )
{

} ) ) ) );

$container->bind ( 'articles\\author', function (  )
{

} );

$container->bind ( 'articles\\title', function ( input $input )
{
    $text = new text;
    $title = new title;
    return $title->with ( $text ( $input->text ) );
} );

$container->bind ( 'articles\\article', 

function ( title $title, lead $lead, body $body, author $author )
{
    return new article ( $title, $lead, $body, $author );
} );

class article extends message
{
    public function __construct ( 
        title $title, paragraph $lead, array $body = [ ], author $author )
    {

    }
}



```