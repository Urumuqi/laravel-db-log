<?php
/**
 * log service.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace Urumuqi\DbLog;

use Illuminate\Support\Facades\DB;

/**
 * Class Log.
 * save log and read log.
 */
class Log
{
    public function write($bigTag, $actionTag, array $content, $operator = '', $traceKey = '')
    {
        //
    }

    public function read($bigTag, $actionTag = '', $pageNum = 1, $pageSize = 15)
    {
        $list = DB::table('db_log')
            ->select(['operator', 'log_content'])
            ->where(['big_tag' => $bigTag, 'action_tag' => $actionTag])
            ->forPage($pageNum, $pageSize);

        return [];
    }
}