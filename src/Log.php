<?php
/**
 * log service.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

namespace Urumuqi\DbLog;

use Illuminate\Support\Facades\DB;
use Urumuqi\DbLog\Model\Log as ModelLog;

/**
 * Class Log.
 * save log and read log.
 */
class Log
{
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
    {
        $newLog = new ModelLog();
        $newLog->biz_tag = $bizTag;
        $newLog->action_tag = $actionTag;
        $newLog->log_content = json_encode($content);
        $newLog->operator = $operator;
        $newLog->track_key = $traceKey;
        $newLog->created_date = date('Y-m-d');
        return $newLog->save();
    }

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
    {
        $cond = empty($actionTag) ? ['biz_tag' => $bizTag] : ['biz_tag' => $bizTag, 'action_tag' => $actionTag];
        $cond = ['biz_tag' => $bizTag];
        if (!empty($actionTag)) {
            $cond['action_tag'] = $actionTag;
        }
        if (!empty($traceKey)) {
            $cond['track_key'] = $traceKey;
        }
        if (!empty($operator)) {
            $cond['operator'] = $operator;
        }
        $list = DB::table('db_log')
            ->select(['operator', 'log_content', 'track_key', 'created_at'])
            ->where($cond)
            ->orderBy('created_at', $asc ? 'asc' : 'desc')
            ->forPage($pageNum, $pageSize)
            ->get()
            ->toArray();;
        array_walk($list, function (&$it) {
            $it->log_content = json_decode($it->log_content, true);
        });

        return $list;
    }
}