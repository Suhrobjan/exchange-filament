<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LegalDocument extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'type',
        'document_number',
        'adopted_at',
        'url',
        'is_active',
        'sort_order',
    ];

    public array $translatable = [
        'title',
        'description',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'is_active' => 'boolean',
        'adopted_at' => 'date',
    ];
}
