<?php

namespace App\Integrations\PremierLeague\Response;

abstract class ApiResponse
{
    public array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    abstract public function getResponseStatus(): string;

    abstract public function getResponseResult(): ?array;
}
