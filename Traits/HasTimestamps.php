<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasTimestamps
{
    /**
     * Get the created at attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $value->format('Y-m-d H:i:s') : null,
        );
    }

    /**
     * Get the updated at attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $value->format('Y-m-d H:i:s') : null,
        );
    }
}