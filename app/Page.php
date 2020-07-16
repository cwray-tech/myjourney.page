<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getRouteKeyName()
    {
        return 'domain';
    }

    public function journeys()
    {
        return $this->hasManyThrough(Journey::class, User::class);
    }
}
