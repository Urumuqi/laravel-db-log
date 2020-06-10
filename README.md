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

/**
 * 返回结构.
 */
[
    'data' => [],
    'total' => 10,
];
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
$bizTag = 'dblogtest';
$actionTag = 'new';
$logContent = [
    'package' => 'urumuqi/dblog',
    'author' => 'urumuqi',
    'email' => 'wuqi226@gmail.com',
    'create_date' => date('Y-m-d H:i:s'),
];
$operator = 'urumuqi';
$traceKey = 'dblog';
$saveRs = $dblog->write($bizTag, $actionTag, $logContent, $operator, $traceKey);
$readRs1 = $dblog->read($bizTag);
$readRs2 = $dblog->readByTraceKey($traceKey);
$readRs3 = $dblog->readByBizTag($bizTag);
$readRs4 = $dblog->readByBizTraceKey($bizTag, $traceKey);
$readRs5 = $dblog->readByOperator($operator);
dd($saveRs, $readRs1, $readRs2, $readRs3, $readRs4, $readRs5);
```
