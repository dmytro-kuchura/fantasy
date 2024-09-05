<?php

namespace App\Http\Controllers;

use App\Integrations\PremierLeague\ApiCommunicator;
use App\Integrations\PremierLeague\Request\GetBootstrapStaticRequest;
use App\Integrations\PremierLeague\Response\GetBootstrapStaticResponse;
use App\Services\EventService;
use App\Services\PlayerService;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{

    private ApiCommunicator $apiCommunicator;
    private TeamService $teamService;
    private EventService $eventService;
    private PlayerService $playerService;

    public function __construct(
        ApiCommunicator $apiCommunicator,
        TeamService     $teamService,
        EventService    $eventService,
        PlayerService    $playerService,
    )
    {
        $this->apiCommunicator = $apiCommunicator;
        $this->teamService = $teamService;
        $this->eventService = $eventService;
        $this->playerService = $playerService;
    }

    public function home(): View
    {
        $request = new GetBootstrapStaticRequest();
        $response = $this->apiCommunicator->send($request);
        $this->teamService->saveTeams($response->getTeams());
        $this->eventService->saveEvents($response->getEvents());
        $this->playerService->savePlayers($response->getElements());
        dd($response);
    }
}
