<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Journey extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'domain' => $this->domain,
            'picture' => $this->picture,
            'introduction' => $this->introduction,
            'published_at' => $this->published_at,
        ];
    }
}
