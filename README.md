![Events](./logotype.jpg?raw=true)

[![Version](https://img.shields.io/packagist/v/kornheiser/events?style=plastic)](https://packagist.org/packages/kornheiser/events)
[![Downloads](https://img.shields.io/packagist/dt/kornheiser/events?style=plastic)](https://packagist.org/packages/kornheiser/events)
[![License](https://img.shields.io/packagist/l/kornheiser/events?style=plastic)](https://en.wikipedia.org/wiki/MIT_License)
[![PHPVersion](https://img.shields.io/packagist/php-v/kornheiser/events?style=plastic)](https://packagist.org/packages/kornheiser/events)

## Installation
```bash
composer require kornheiser/events
```
## Example 

### Make ur own Event
```php
use Kornheiser\Event\Event;

class NewMessageEvent implements Event {
    
    public function __construct(
        public string $text,
        public int $time,
        public string $senderMail
    ): void {}
}
```

### Handling 

#### Simple handler
```php
use Kornheiser\Event\Handler;

class NewMessageHandler implements Handler {
    
    public function onHandle(Event $ev): void {
        var_dump($ev->text, $ev->time, $ev->senderMail);
    }
}
```

#### Callable handler 
```php
use Kornheiser\Event\CallableHandler;

$callableHandler = new CallableHandler(function(Event $ev) {
    echo $ev->senderMail . ": " . $ev->text;
});
``` 

#### Targeted handler

A targeted handler, unlike a regular handler, only targets a once specific event, see:
```php
use Kornheiser\Event\TargetedHandler;

$handler1 = new TargetedHandler(NewMessageEvent::class, new NewMessageHandler());
$handler2 = new TargetedHandler(NewMessageEvent::class, $callableHandler);
```

### Conclusion
```php
use Kornheiser\Event\EventManager;

$invoker = new EventManager();

$invoker->addHandler($handler1);
$invoker->addHandler($handler2);

$invoker->call(new NewMessageEvent(text: "hello world", time: time(), senderMail: "some programmer"));
```
