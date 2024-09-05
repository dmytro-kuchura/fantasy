<?php

namespace App\Integrations\PremierLeague\Request;

class GetBootstrapStaticRequest extends ApiRequest
{
    const METHOD = 'GET';
    const URL = '/api/bootstrap-static';

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getQueryUrl(): string
    {
        return self::URL;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
