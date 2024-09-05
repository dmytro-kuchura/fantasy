<?php

namespace App\Services;

use App\Exceptions\NotCreateTeamException;
use App\Models\Event;
use App\Repositories\EventsRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class EventService
{
    private EventsRepository $repository;

    public function __construct(EventsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function saveEvents(array $events): void
    {
        foreach ($events as $event) {
            if (!$this->findEvent($event['id'])) {
                $this->saveEvent($event);
            }
        }
    }

    public function saveEvent(array $data): Event
    {
        DB::beginTransaction();
        try {
            $event = $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreateTeamException($exception->getMessage());
        }
        DB::commit();
        return $event;
    }

    public function findEvent(string $externalId): ?Event
    {
        return $this->repository->findByExternalId($externalId);
    }
}
