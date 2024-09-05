<?php

namespace App\Integrations\PremierLeague\Response;

class GetBootstrapStaticResponse extends ApiResponse
{

    public function getResponseStatus(): string
    {
        return $this->response['status'];
    }

    public function getResponseResult(): ?array
    {
        return $this->response;
    }

    public function getElements(): ?array
    {
        return $this->response['elements'] ?? null;
    }

    public function getEvents(): ?array
    {
        return $this->response['events'] ?? null;
    }

    public function getTeams(): ?array
    {
        return $this->response['teams'] ?? null;
    }

    public function getPhases(): ?array
    {
        return $this->response['phases'] ?? null;
    }
}
