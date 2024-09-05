<?php

namespace App\Integrations\PremierLeague\Exception;

use RuntimeException;

class CommunicationErrorException extends RuntimeException
{
    protected $message = 'Error communication with English Premier League!';
}
