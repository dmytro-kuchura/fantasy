<?php

namespace App\Exceptions;

use RuntimeException;

class NotCreateTeamException extends RuntimeException
{
    protected $message = 'Team can\'t create!';
}
