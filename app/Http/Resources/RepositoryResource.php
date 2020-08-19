<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RepositoryResource extends JsonResource
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
            'name'              => $this->name,
            'repository_id'     => $this->repository_id,
            'url'               => $this->url,
            'created_date'      => $this->created_date,
            'last_pushed_date'  => $this->last_push_date,
            'description'       => $this->description,
            'number_of_stars'   => $this->number_of_stars,
        ];
    }
}
