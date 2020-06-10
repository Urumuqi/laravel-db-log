# urumuqi/dblog

this library provider 2 methods, and let can write and read log.

`Log` service has been register into laravel service container as `singleton`.

Keep Code As Simple As Possible.

read & write definition:

```php
/**
 * save log content.
 *
 * @param string $bizTag
 * @param string $actionTag
 * @param array  $content
 * @param string $operator
 * @param string $traceKey
 *
 * @return boolean
 */
public function write($bizTag, $actionTag, array $content, $operator = '', $traceKey = '')

/**
 * read log.
 *
 * @param string  $bizTag
 * @param string  $actionTag
 * @param string  $traceKey
 * @param string  $operator
 * @param integer $pageNum
 * @param integer $pageSize
 * @param boolean $asc      true order by asc ｜ false order by desc
 *
 * @return array
 */
public function read($bizTag, $actionTag = '', $traceKey = '', $operator = '', $pageNum = 1, $pageSize = 15, $asc = true)

/**
 * read log content by trace_key.
 *
 * @param string  $traceKey
 * @param integer $pageNum
 * @param integer $pageSize
 * @param boolean $asc      asc or desc
 *
 * @return array
 */
public function readByTraceKey($traceKey, $pageNum = 1, $pageSize = 15, $asc = true)

/**
 * read by biz_tag.
 *
 * @param string  $bizTag
 * @param integer $pageNum
 * @param integer $pageSize
 * @param boolean $asc
 *
 * @return array
 */
public function readByBizTag($bizTag, $pageNum = 1, $pageSize = 20, $asc = true)

/**
 * read by biz_tag and trace_key.
 *
 * @param string  $bizTag
 * @param string  $traceKey
 * @param integer $pageNum
 * @param integer $pageSize
 * @param boolean $asc
 *
 * @return void
 */
public function readByBizTraceKey($bizTag, $traceKey, $pageNum = 1, $pageSize = 20, $asc = true)

/**
 * read by operator.
 *
 * @param string  $operator
 * @param string  $bizTag
 * @param integer $pageNum
 * @param integer $pageSize
 * @param boolean $asc
 *
 * @return array
 */
public function readByOperator($operator, $bizTag = '', $pageNum = 1, $pageSize = 20, $asc = true)
```

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
$readRs2 = $dblog->readByTraceKey($traceKey, $pageNum = 1, $pageSize = 15, $asc = true);
```
