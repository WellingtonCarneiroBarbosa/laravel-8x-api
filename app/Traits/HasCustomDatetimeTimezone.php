<?php

namespace App\Traits;

trait HasCustomDatetimeTimezone
{
    public function getCreatedAtAttribute($value)
    {
        return datetime_timezone_mutator($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return datetime_timezone_mutator($value);
    }
}
