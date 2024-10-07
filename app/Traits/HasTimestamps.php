<?php

namespace App\Traits;

use Carbon\Carbon;

trait HasTimestamps
{
    /**
     * Get the created at attribute.
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        //return $value ? $value->format('Y-m-d H:i:s') : null;
        return $value ? Carbon::parse($value) : null;
    }

    /**
     * Get the updated at attribute.
     *
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        //return $value ? $value->format('Y-m-d H:i:s') : null;
        return $value ? Carbon::parse($value) : null;
    }
}