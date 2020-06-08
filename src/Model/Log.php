<?php

namespace Urumuqi\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log.
 */
class Log extends Model
{
    protected $table = 'db_log';

    protected $fillable = [
        'biz_tag',
        'action_tag',
        'track_key',
        'operator',
        'log_content',
        'created_at',
        'created_date',
    ];
}
