<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public array $translatable = [
        'name',
        'description',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
