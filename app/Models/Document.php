<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Document extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'category',
        'file_path',
        'file_name',
        'file_size',
        'is_published',
        'download_count',
        'sort_order',
    ];

    public array $translatable = [
        'title',
        'description',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function incrementDownloads()
    {
        $this->increment('download_count');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('files');
    }
}
