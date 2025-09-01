<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Booking extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'booking_date',
        'number_adult',
        'number_teenager',
        'number_child',
        'name',
        'contact',
        'email',
        'code',
        'active',
        'memo',
    ];

    protected $appends = [
        // 'date',
        'image_url',
    ];

    public function registerMediaCollections(): void
    {
        // $this->addMediaCollection('images');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('default');
    }
}
