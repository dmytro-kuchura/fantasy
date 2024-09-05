<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreateEventException extends RuntimeException
{
    protected $message = 'Event can\'t create!';
}
