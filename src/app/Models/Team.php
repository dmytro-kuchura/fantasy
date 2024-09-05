<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $name
 * @property string $short_name
 * @property integer $code
 * @property integer $strength
 * @property integer $external_id
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Team extends Model
{
    protected $table = 'fantasy_teams';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'short_name',
        'code',
        'strength',
        'external_id',
        'created_at',
        'updated_at',
    ];
}

