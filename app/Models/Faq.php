<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $fillable = [
        'question',
        'answer',
        'status',
    ];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array',
    ];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public static function statuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
    }
}
