# urumuqi/dblog

this library provider 2 methods, and let can write and read log.

`Log` service has been register into laravel service container as `singleton`.

Keep Code As Simple As Possible.

## involved in laravel


```shell
composer require urumuqi/dblog
```

config/app.php add `LogProvider`

```php
'providers' => [
    Urumuqi\DbLog\LogProvider::class,
],
```

Run migrate, create dblog table

```shell
php artisan migrate
```

## usage

```php
$dblog = app('dblog');
$content = [
    'name' => 'urumuqi',
    'message' => [
        'error' => false,
        'notice' => '测试中，请稍后',
    ],
    'before' => [],
];
$saveRs = $dblog->write('test', 'save', $content, 'urumuqi');
$readRs = $dblog->read('test', 'save');
```
