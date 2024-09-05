<?php

namespace App\Repositories;

use App\Helpers\PriceHelper;
use App\Models\PlayerHistory;
use Illuminate\Database\Eloquent\Collection;

class PlayersHistoryRepository implements Repository
{
    public function get(int $id): ?PlayerHistory
    {
        return PlayerHistory::where('id', $id)->first();
    }

    public function all(): Collection
    {
        return PlayerHistory::all();
    }

    public function store(array $data): PlayerHistory
    {
        $player = new PlayerHistory;
        $player->player_id = $data['player_id'];
        $player->goals_scored = $data['goals_scored'];
        $player->assists = $data['assists'];
        $player->clean_sheets = $data['clean_sheets'];
        $player->goals_conceded = $data['goals_conceded'];
        $player->own_goals = $data['own_goals'];
        $player->penalties_saved = $data['penalties_saved'];
        $player->penalties_missed = $data['penalties_missed'];
        $player->yellow_cards = $data['yellow_cards'];
        $player->red_cards = $data['red_cards'];
        $player->total_points = $data['total_points'];
        $player->transfers_in = $data['transfers_in'];
        $player->transfers_out = $data['transfers_out'];
        $player->status = $data['status'];
        $player->minutes = $data['minutes'];
        $player->selected_by = $data['selected_by_percent'];

        $player->price = PriceHelper::generatePrice($data['now_cost']);

        $player->save();
        return $player;
    }

    public function update(array $data, int $id): PlayerHistory
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }
}
