<?php

namespace App\Services;

use App\Exceptions\NotCreatePlayerException;
use App\Models\Player;
use App\Repositories\PlayersHistoryRepository;
use App\Repositories\PlayersRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class PlayerService
{
    private PlayersRepository $playersRepository;
    private PlayersHistoryRepository $playersHistoryRepository;

    public function __construct(
        PlayersRepository        $playersRepository,
        PlayersHistoryRepository $playersHistoryRepository
    )
    {
        $this->playersRepository = $playersRepository;
        $this->playersHistoryRepository = $playersHistoryRepository;
    }

    public function savePlayers(array $players): void
    {
        foreach ($players as $player) {
            $result = $this->findPlayer($player['code']);
            if (!$result) {
                $this->savePlayer($player);
            } else {
                $this->updatePlayer($player, $result->id);
            }
        }
    }

    public function savePlayer(array $data): Player
    {
        DB::beginTransaction();
        try {
            $player = $this->playersRepository->store($data);
            $this->savePlayerHistory($data, $player->id);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreatePlayerException($exception->getMessage());
        }
        DB::commit();
        return $player;
    }

    public function updatePlayer(array $data, $playerId): Player
    {
        DB::beginTransaction();
        try {
            $player = $this->playersRepository->update($data, $playerId);
            $this->savePlayerHistory($data, $player->id);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreatePlayerException($exception->getMessage());
        }
        DB::commit();
        return $player;
    }

    public function savePlayerHistory(array $data, $playerId): void
    {
        DB::beginTransaction();
        try {
            $data['player_id'] = $playerId;
            $this->playersHistoryRepository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new NotCreatePlayerException($exception->getMessage());
        }
        DB::commit();
    }

    public function findPlayer(string $code): ?Player
    {
        return $this->playersRepository->findByCode($code);
    }
}
