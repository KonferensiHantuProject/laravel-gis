<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function toDay($value)
    {
        return Carbon::parse($value)->format('d F Y');
    }
}
