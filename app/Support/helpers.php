<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Get a setting value by key.
     */
    function setting(string $key, mixed $default = null): mixed
    {
        if ($key === '') {
            return $default;
        }

        $record = Setting::query()->where('key', $key)->first();

        if (! $record) {
            return $default;
        }

        return $record->value ?? $default;
    }
}

if (! function_exists('settings')) {
    /**
     * Get all settings as key => value array.
     */
    function settings(): array
    {
        return Setting::query()->pluck('value', 'key')->toArray();
    }
}
