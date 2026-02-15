<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'status',
        'name',
        'slug',
        'thumbnail',
        'banner',
        'description',
    ];

    public array $translatable = ['name', 'description'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public static function generateUniqueSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;
        while (static::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
