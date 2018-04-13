## Laravel OpenProvider

### Installation
Install this package with composer:
```
composer require nickurt/laravel-openprovider:1.*
```

Add the provider to config/app.php file

```php
'nickurt\OpenProvider\ServiceProvider',
```

and the facade in the file

```php
'OpenProvider' => 'nickurt\OpenProvider\Facade',
```

Copy the config files for the OpenProvider-plugin

```
php artisan vendor:publish --provider="nickurt\OpenProvider\ServiceProvider" --tag="config"
```
### Tests
```sh
phpunit
```
- - - 