<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventsRepository implements Repository
{
    public function get(int $id): ?Event
    {
        return Event::where('id', $id)->first();
    }

    public function all(): Collection
    {
        return Event::all();
    }

    public function store(array $data): Event
    {
        $event = new Event;
        $event->name = $data['name'];
        $event->deadline_time = $data['deadline_time'];
        $event->average_points = $data['average_entry_score'] ?? null;
        $event->highest_points = $data['highest_score'] ?? null;
        $event->total_ranked = $data['ranked_count'] ?? null;
        $event->most_captained = $data['most_captained'] ?? null;
        $event->most_vice_captained = $data['most_vice_captained'] ?? null;
        $event->finished = $data['finished'];
        $event->external_id = $data['id'];
        $event->save();
        return $event;

        //    "chip_plays" => array:2 [▼
        //      0 => array:2 [▼
        //        "chip_name" => "bboost"
        //        "num_played" => 144974
        //      ]
        //      1 => array:2 [▼
        //        "chip_name" => "3xc"
        //        "num_played" => 221430
        //      ]
        //    ]
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }

    public function findByExternalId(string $externalId): ?Event
    {
        return Event::where('external_id', $externalId)->first();
    }
}
