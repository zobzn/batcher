# zbz-batcher

Perform batch operations

Installation:

```bash
composer require zobzn/zbz-batcher
```

Example:

```php
require_once __DIR__ . '/vendor/autoload.php';

$batcher = new \Zbz\Batcher(30, function (array $items) {
    var_export($items);
});

for ($i = 0; $i < 100; $i++) {
    $batcher->add($i);
}

$batcher->finish();
```
