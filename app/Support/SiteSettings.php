<?php

namespace App\Support;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class SiteSettings
{
    public static function all(): array
    {
        if (! Schema::hasTable('site_settings')) {
            return [];
        }

        return Cache::rememberForever('site_settings', function (): array {
            return SiteSetting::query()->pluck('value', 'key')->all();
        });
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        $value = static::all()[$key] ?? null;

        return filled($value) ? $value : $default;
    }

    public static function putMany(array $settings): void
    {
        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        Cache::forget('site_settings');
    }

    public static function mediaUrl(?string $path, ?string $default = null): ?string
    {
        if (blank($path)) {
            return $default;
        }

        return str_starts_with($path, 'http') ? $path : Storage::url($path);
    }
}
