<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property integer $player_id
 *
 * @property string $price
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
 * @property string $status
 * @property integer $total_points
 *
 * @property integer $transfers_in
 * @property integer $transfers_out
 *
 * @property string $created_at
 * @property string $updated_at
 */
class PlayerHistory extends Model
{
    protected $table = 'fantasy_players_statistics';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'player_id',
        'price',
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
        'transfers_out',
        'status',
        'external_id',
        'created_at',
        'updated_at',
    ];
}

