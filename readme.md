Trafi Unofficial SDK
==

The Unofficial SDK of Trafi for PHP.

About
--

Installation
--

Install Trafi Unofficial SDK using [Composer](https://getcomposer.org/).

```
$ composer require abizareyhan/trafi
```

After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```php
Abizareyhan\Trafi\TrafiServiceProvider::class,
```

You can use the facade for shorter code:

```php
'Trafi' => Abizareyhan\Trafi\Facades\Trafi::class,
```

Usage
--

```php
$client = new Abizareyhan\Trafi\HTTPClient\CurlHTTPClient();
$trafi = new Abizareyhan\Trafi\Trafi($client);

//Getting Current Events
$response = $trafi->getEvents();
$events = $response->getJSONDecodedBody();

//Getting Stops inside Bounds
$bounds = new Abizareyhan\Trafi\Bounds(
  [
    -6.0537830087495905, //Top Left Latitude
    106.63549041748047 //Top Left Longitude
  ],
  [
    -6.0537830087495905, //Top Right Latitude
    107.04747772216797 //Top Right Longitude
  ],
  [
    -6.1903288844762585, //Bottom Left Latitude
    106.63549041748047 //Bottom Left Longitude
  ],
  [
    -6.1903288844762585, //Bottom Right Latitude
    107.04747772216797 //Bottom Right Longitude
  ]
);
 
$response = $trafi->getStops($bounds);
$stops = $response->getJSONDecodedBody();

//Getting Transjakarta Realtime Coordinate inside Bounds
$bounds = new Abizareyhan\Trafi\Bounds(
  [
    -6.0537830087495905, //Top Left Latitude
    106.63549041748047 //Top Left Longitude
  ],
  [
    -6.0537830087495905, //Top Right Latitude
    107.04747772216797 //Top Right Longitude
  ],
  [
    -6.1903288844762585, //Bottom Left Latitude
    106.63549041748047 //Bottom Left Longitude
  ],
  [
    -6.1903288844762585, //Bottom Right Latitude
    107.04747772216797 //Bottom Right Longitude
  ]
);
 
$response = $trafi->getTransports($bounds);
$transports = $response->getJSONDecodedBody();
```
