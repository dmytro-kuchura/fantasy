<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property integer $code
 * @property string $notes
 *
 * @property string $type
 *
 * @property string $price
 * @property string $name
 * @property string $status
 * @property integer $minutes
 * @property string $selected_by
 * @property integer $goals_scored
 * @property integer $assists
 * @property integer $clean_sheets
 * @property integer $goals_conceded
 * @property integer $own_goals
 * @property integer $penalties_saved
 * @property integer $penalties_missed
 * @property integer $yellow_cards
 * @property integer $red_cards
 *
 * @property integer $team
 * @property integer $team_code
 * @property integer $total_points
 *
 * @property integer $transfers_in
 * @property integer $transfers_in_event
 * @property integer $transfers_out
 * @property integer $transfers_out_event
 *
 * @property integer external_id
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Player extends Model
{
    protected $table = 'fantasy_players';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'notes',
        'type',
        'price',
        'name',
        'status',
        'minutes',
        'selected_by',
        'goals_scored',
        'assists',
        'clean_sheets',
        'goals_conceded',
        'own_goals',
        'penalties_saved',
        'penalties_missed',
        'yellow_cards',
        'red_cards',
        'team',
        'team_code',
        'total_points',
        'transfers_in',
        'transfers_in_event',
        'transfers_out',
        'transfers_out_event',
        'external_id',
        'created_at',
        'updated_at',
    ];
}

