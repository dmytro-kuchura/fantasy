<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property integer $name
 * @property string $price
 * @property string $notes
 * @property string $status
 * @property string $selected_by
 * @property string $team
 *
 * @property string $delivered
 *
 * @property string $created_at
 * @property string $updated_at
 */
class PlayerNotifications extends Model
{
    protected $table = 'fantasy_players_notifications';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'notes',
        'status',
        'selected_by',
        'team',
        'delivered',
        'created_at',
        'updated_at',
    ];
}
