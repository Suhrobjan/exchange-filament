<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Staff extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'position',
        'bio',
        'photo',
        'type',
        'sort_order',
        'is_active',
    ];

    public array $translatable = [
        'name',
        'position',
        'bio',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSupervisoryBoard($query)
    {
        return $query->where('type', 'supervisory_board');
    }

    public function scopeBoardOfDirectors($query)
    {
        return $query->where('type', 'board_of_directors');
    }
}
