<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreatePlayerException extends RuntimeException
{
    protected $message = 'Player can\'t create or update!';
}
