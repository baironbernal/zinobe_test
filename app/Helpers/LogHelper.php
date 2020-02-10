<?php

namespace App\Helpers;

use App\Models\Log;

class LogHelper 
{
    public static function registerLog(string $user_id, string $response, string $type_log)
    {
        return Log::create(['user_id' => $user_id, 'response_query' => $response, 'type_log' => $type_log]);
    }
}
