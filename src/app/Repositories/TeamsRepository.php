<?php

namespace App\Repositories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamsRepository implements Repository
{
    public function get(int $id): ?Team
    {
        return Team::where('id', $id)->first();
    }

    public function all(): Collection
    {
        return Team::all();
    }

    public function store(array $data): Team
    {
        $team = new Team;
        $team->name = $data['name'];
        $team->short_name = $data['short_name'];
        $team->code = $data['code'];
        $team->strength = $data['strength'];
        $team->external_id = $data['id'];
        $team->save();
        return $team;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }

    public function findByCode(string $code): ?Team
    {
        return Team::where('code', $code)->first();
    }
}
