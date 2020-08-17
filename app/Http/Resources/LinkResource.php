<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
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
            'link' => $this->link,
            'local_link' => $this->local_link,
            'created_at_for_human' => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at->format('Y-m-d')
        ];
    }
}
