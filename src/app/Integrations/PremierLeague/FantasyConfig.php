<?php

namespace App\Integrations\PremierLeague;

class FantasyConfig
{
    public string $baseUri = 'https://fantasy.premierleague.com';

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }
}
