# Alleantia IOT Server unofficial PHP SDK

A simple SDK to access [Alleantia IOT Server Rest APIs](https://kb.alleantia.com/how-to-use-rest-api-with-alleantia-isc-software) (version 2.3).

## Requirements

- PHP 8.0+

## Installing

Use Composer to install it:

```
composer require filippo-toso/alleantia-sdk
```

If you don't already have an implementation for psr/http-factory and psr/http-client, you should execute also:

```
composer require php-http/curl-client laminas/laminas-diactoros
```

## Vanilla PHP usage

Create the SDK instance and call the various endpoints.

```php
use FilippoToso\Alleantia\Alleantia;
use FilippoToso\Alleantia\Options;

require(__DIR__ . '/../vendor/autoload.php');

$options = new Options([
    'apiKey' => 'your-api-key', 
]);

$alleantia = new Alleantia($options);

$response = $alleantia->system()->info();

print_r($response->body());
```

## Laravel usage

In your config/services.php files add:

```php
return [
    
    // ...
    
    'alleantia' => [
        'api_key' => env('ALLEANTIA_API_KEY'),
    ],   
];
```

In your .env file, add the following variables:

```
ALLEANTIA=your-api-key
```

In your Laravel code:

```php
use FilippoToso\Alleantia\Laravel\Alleantia;

$response = Alleantia::system()->info();

dump($response->body());
```
