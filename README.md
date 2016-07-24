# zbz-batcher

[![Build Status](https://img.shields.io/travis/zobzn/zbz-batcher/master.svg?style=flat-square)](https://travis-ci.org/zobzn/zbz-batcher)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Perform batch operations

## Installation

```bash
composer require zobzn/zbz-batcher
```

## Basic Usage

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
