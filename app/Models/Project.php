<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'status',
        'project_state',
        'service_id',
        'category_id',
        'name',
        'slug',
        'thumbnail',
        'banner',
        'main_image',
        'description',
        'tags',
        'map',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
        'tags' => 'array',
    ];

    public const PROJECT_STATES = [
        'under_construction' => 'قيد التنفيذ',
        'completed' => 'منتهي',
        'planned' => 'مخطط له',
    ];

    public array $translatable = ['name', 'description'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
