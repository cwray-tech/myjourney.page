<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $appends = ['picture_path'];
    use HasSlug;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'picture',
        'introduction',
        'published_at',
        'is_public',
        'is_published',
        'is_anonymous'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function steps()
    {
        return $this->hasMany(Step::class)->orderBy('date', 'asc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isPublic()
    {
        return $this->is_public ? true : false;
    }
    public function getPicturePathAttribute()
    {
        return  $this->picture ? asset(Storage::url($this->picture)) : null;
    }
}
