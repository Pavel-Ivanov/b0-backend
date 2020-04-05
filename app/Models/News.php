<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Conversion\Conversion;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\File;

class News extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function setPublishedAttribute($value)
    {
        $this->attributes['published'] = (int) $value;
    }

/*    public function getPublishedAttribute($value)
    {
        return (bool) $value;
    }*/

    public function registerMediaCollections()
    {
        // Коллекция основной фотографии продукта
        $this->addMediaCollection('news-image')
            ->singleFile()
            ->registerMediaConversions(function (Media $media)
                {
                    $this->addMediaConversion('thumb')
                        ->width(160)
                        ->height(120)
                        ->sharpen(10);
                });

        // Коллекция фотографий для галереи продукта
        $this->addMediaCollection('news-gallery');
    }

}
