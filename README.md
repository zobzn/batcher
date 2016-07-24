# zobzn/batcher

[![Build Status](https://img.shields.io/travis/zobzn/batcher/master.svg?style=flat-square)](https://travis-ci.org/zobzn/batcher)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Perform batch operations

## Installation

```bash
composer require zobzn/batcher
```

## Basic Usage

```php
require_once __DIR__ . '/vendor/autoload.php';

$batcher = new \Zobzn\Batcher(30, function (array $items) {
    var_export($items);
});

for ($i = 0; $i < 100; $i++) {
    $batcher->add($i);
}

$batcher->finish();
```
