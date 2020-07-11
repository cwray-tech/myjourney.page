<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'domain',
        'picture',
        'introduction',
        'published_at',
        'is_public'
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


    public function steps()
    {
        return $this->hasMany(\App\Step::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function isPublic()
    {
        return $this->is_public ? true : false;
    }
}
