# aircms-php

Aircms PHP API client

### Requirements

* PHP 7.3 or higher

### Documentation

* [Installation](#installation)
* [Get started](#get-started)
* [All pages](#get-all-pages)
* [Page info](#get-page-info)
* [Page fields](#get-page-fields)

#### Installation

```bash
composer require aircms/aircms-php
```

#### Get started

```php
use Aircms\Aircms;

$aircms = new Aircms;

$aircms->setAuthToken('<api_token>');
```

#### Get all pages

```php
$aircms->getPages();

// [
//     [
//         "name" => "startpage"
//         "uuid" => "948a3718-a454-42df-9d87-a0d5214da6a0"
//         "created_at" => "2021-10-02T20:25:07.000000Z"
//         "updated_at" => "2021-10-11T15:41:49.000000Z"
//         "cached_at" => "2021-10-11T15:41:49.000000Z"
//         "cache_disabled" => false
//     ]
// ]
```

#### Get page info

```php
$aircms->getPage('startpage');

// [
//     "name" => "startpage"
//     "uuid" => "948a3718-a454-42df-9d87-a0d5214da6a0"
//     "created_at" => "2021-10-02T20:25:07.000000Z"
//     "updated_at" => "2021-10-11T15:41:49.000000Z"
//     "cached_at" => "2021-10-11T15:41:49.000000Z"
//     "cache_disabled" => false
// ]
```

#### Get page fields

```php
$aircms->getPageFields('startpage');

// [
//     'hero_text' => 'Welcome',
//     'sv' => [
//         'hero_text' => 'Välkommen'
//     ]
// ]

$aircms->getPageFields('startpage', [
    'locale' => 'sv'
]);

// [
//     'hero_text' => 'Välkommen'
// ]
```
