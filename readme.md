# eyedouble messages

## basic usage

```php
use Eyedouble\Messages\Message,
	Eyedouble\Messages\Paragraph,
	Eyedouble\Messages\Text;

require __DIR__ . '/vendor/autoload.php';

$text = new Text;
$paragraph = new Paragraph;

$paragraph->with( $text( 'after a development period of 2 years eyesign is finally finished, have a look at it at http://eyesign.nl' ) );

$message = new Message( $paragraph );

echo $message->body;
```