<?php

namespace Urumuqi\DbLog\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log.
 *
 * @property string $biz_tag
 * @property string $action_tag
 * @property string $track_key
 * @property string $operator
 * @property string $log_content
 * @property string $created_at
 * @property string $created_date
 */
class Log extends Model
{
    protected $table = 'db_log';

    const UPDATED_AT = null;

    protected $fillable = [
        'biz_tag',
        'action_tag',
        'track_key',
        'operator',
        'log_content',
        'created_at',
        'created_date',
    ];

    protected $casts = [
        'biz_tag' => 'string',
        'action_tag' => 'string',
        'track_key' => 'string',
        'operator' => 'string',
        'log_content' => 'string',
        'created_at' => 'string',
        'created_date' => 'string',
    ];
}
