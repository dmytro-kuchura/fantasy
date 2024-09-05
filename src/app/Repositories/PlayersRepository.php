<?php

namespace App\Repositories;

use App\Helpers\PriceHelper;
use App\Helpers\TypeHelper;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class PlayersRepository implements Repository
{
    public function get(int $id): ?Player
    {
        return Player::where('id', $id)->first();
    }

    public function all(): Collection
    {
        return Player::all();
    }

    public function store(array $data): Player
    {
        $player = new Player;
        $player->name = $data['web_name'];
        $player->code = $data['code'];
        $player->notes = $data['news'];
        $player->goals_scored = $data['goals_scored'];
        $player->assists = $data['assists'];
        $player->clean_sheets = $data['clean_sheets'];
        $player->goals_conceded = $data['goals_conceded'];
        $player->own_goals = $data['own_goals'];
        $player->penalties_saved = $data['penalties_saved'];
        $player->penalties_missed = $data['penalties_missed'];
        $player->yellow_cards = $data['yellow_cards'];
        $player->red_cards = $data['red_cards'];
        $player->team = $data['team'];
        $player->team_code = $data['team_code'];
        $player->total_points = $data['total_points'];
        $player->transfers_in = $data['transfers_in'];
        $player->transfers_in_event = $data['transfers_in_event'];
        $player->transfers_out = $data['transfers_out'];
        $player->transfers_out_event = $data['transfers_out_event'];
        $player->status = $data['status'];
        $player->minutes = $data['minutes'];
        $player->selected_by = $data['selected_by_percent'];

        $player->type = TypeHelper::generateType($data['element_type']);
        $player->price = PriceHelper::generatePrice($data['now_cost']);

        $player->external_id = $data['id'];
        $player->save();
        return $player;
    }

    public function update(array $data, int $id): Player
    {
        $player = [];

        $player['notes'] = $data['news'];
        $player['goals_scored'] = $data['goals_scored'];
        $player['assists'] = $data['assists'];
        $player['clean_sheets'] = $data['clean_sheets'];
        $player['goals_conceded'] = $data['goals_conceded'];
        $player['own_goals'] = $data['own_goals'];
        $player['penalties_saved'] = $data['penalties_saved'];
        $player['penalties_missed'] = $data['penalties_missed'];
        $player['yellow_cards'] = $data['yellow_cards'];
        $player['red_cards'] = $data['red_cards'];
        $player['total_points'] = $data['total_points'];
        $player['transfers_in'] = $data['transfers_in'];
        $player['transfers_in_event'] = $data['transfers_in_event'];
        $player['transfers_out'] = $data['transfers_out'];
        $player['transfers_out_event'] = $data['transfers_out_event'];
        $player['status'] = $data['status'];
        $player['minutes'] = $data['minutes'];
        $player['price'] = PriceHelper::generatePrice($data['now_cost']);

        Player::where('id', $id)->update($player);

        return Player::where('id', $id)->first();
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }

    public function findByCode(string $code): ?Player
    {
        return Player::where('code', $code)->first();
    }
}
