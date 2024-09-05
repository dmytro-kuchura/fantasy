<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $name
 * @property string deadline_time
 * @property integer $average_points
 * @property integer $highest_points
 * @property integer $total_ranked
 * @property integer $most_captained
 * @property integer $most_vice_captained
 * @property integer $external_id
 * @property integer $finished
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Event extends Model
{
    protected $table = 'fantasy_events';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'deadline_time',
        'average_points',
        'highest_points',
        'total_ranked',
        'most_captained',
        'most_vice_captained',
        'external_id',
        'finished',
        'created_at',
        'updated_at',
    ];
}

