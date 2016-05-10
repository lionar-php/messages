# Lionar messages

Lionar messages provides a secure layer to create valid messages. Some validation rules are
automatically applied when you make use of this package. For example a paragraph can only
consist of a maximum of 140 characters. 

## Validation rules

- A paragraph consists of maximum 140 characters
- A title consists of maximum 70 characters
- Any html provided inside a message is automatically escaped with htmlentities

## Usage

```php
use 	Lionar\Messages\Message,
	Lionar\Messages\Paragraph,
	Lionar\Messages\Text;

require __DIR__ . '/vendor/autoload.php';

$text = new Text;
$paragraph = new Paragraph;

$paragraph->with( $text( 'after a development period of 2 years eyesign is finally finished, have a look at it at http://eyesign.nl' ) );

$message = new Message( $paragraph );

echo $message->body;
```