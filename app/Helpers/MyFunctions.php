<?php

namespace App\Helpers;

use App\Models\Request;

class MyFunctions {
    public static function getRequests($start) {
        return Request::whereBetween('id', [$start, $start + 20]);
    }
}

