# Lionar messages

Lionar messages provides a secure layer to create valid messages. The following validation rules are automatically applied when using this package.

## Validation rules

- A paragraph consists of maximum 140 characters
- A title consists of maximum 70 characters
- Any html provided inside a message is automatically escaped with htmlentities

## Usage

```php
use Messages\Message;
use Messages\Paragraph;
use	Messages\Text;

require __DIR__ . '/vendor/autoload.php';

$text = new Text;
$paragraph = new Paragraph;

$paragraph->with( $text( 'Our new site is online, go take a look: http://eyedouble.nl' ) );

$message = new Message( $paragraph );

echo $message->body; // 'Our new site is online, go take a look: http://eyedouble.nl'
```