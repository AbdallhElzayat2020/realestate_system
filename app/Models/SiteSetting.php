<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * In-memory cache for all settings per request.
     *
     * @var array<string, mixed>|null
     */
    protected static ?array $settingsCache = null;

    protected static function allSettings(): array
    {
        if (self::$settingsCache === null) {
            self::$settingsCache = self::query()
                ->pluck('value', 'key')
                ->toArray();
        }

        return self::$settingsCache;
    }

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $all = self::allSettings();

        return array_key_exists($key, $all) ? $all[$key] : $default;
    }

    public static function getBool(string $key, bool $default = false): bool
    {
        $value = self::getValue($key, null);
        if ($value === null) {
            return $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        $value = strtolower((string) $value);
        return in_array($value, ['1', 'true', 'yes', 'on'], true);
    }

    public static function setValue(string $key, mixed $value): void
    {
        self::query()->updateOrCreate(
            ['key' => $key],
            ['value' => is_bool($value) ? ($value ? '1' : '0') : (string) $value]
        );

        // Reset per-request cache so next read sees fresh data.
        self::$settingsCache = null;
    }
}

