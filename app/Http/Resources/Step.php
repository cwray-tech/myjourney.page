<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Step extends JsonResource
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
            'title' => $this->title,
            'journey_id' => $this->journey_id,
            'published_at' => $this->published_at,
            'description' => $this->description,
            'date' => $this->date,
            'picture' => $this->picture,
        ];
    }
}
