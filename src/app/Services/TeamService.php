<?php

namespace App\Services;

use App\Exceptions\NotCreateTeamException;
use App\Models\Team;
use App\Repositories\TeamsRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class TeamService
{
    private TeamsRepository $repository;

    public function __construct(TeamsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function saveTeams(array $teams): void
    {
        foreach ($teams as $team) {
            if (!$this->findTeam($team['code'])) {
                $this->saveTeam($team);
            }
        }
    }

    public function saveTeam(array $data): Team
    {
        DB::beginTransaction();
        try {
            $team = $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreateTeamException($exception->getMessage());
        }
        DB::commit();
        return $team;
    }

    public function findTeam(string $code): ?Team
    {
        return $this->repository->findByCode($code);
    }
}
