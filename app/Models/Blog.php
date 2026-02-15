<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'status',
        'show_on_home',
        'title',
        'slug',
        'content',
        'image',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
    ];

    public array $translatable = ['title', 'content'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeShowOnHome($query)
    {
        return $query->where('show_on_home', true);
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
