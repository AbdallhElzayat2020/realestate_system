<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'role',
        'content',
        'image',
        'status',
        'order',
    ];

    public array $translatable = ['name', 'role', 'content'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
