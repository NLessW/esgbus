<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Board extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = ['type', 'name', 'title', 'content', 'password', 'comment', 'commented_at'];
    protected $appends = [
        'image_url',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 800, 600)
            ->nonQueued();
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('default', 'thumb');
    }

    public function scopeNotice($query)
    {
        return $query->where('type', 'notice');
    }

    public function scopeGallery($query)
    {
        return $query->where('type', 'gallery');
    }

    public function scopePrivate($query)
    {
        return $query->where('type', 'private');
    }

    public function scopeNewsroom($query)
    {
        return $query->where('type', 'newsroom');
    }
}
