<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'id' => $this->id,
        'imagepath' => $this->imagepath,
        'title' => $this->title,
        'description' => $this->description,
        'price' => (int)$this->price,
        'categories' => $this->categories,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at
       ];
    }
}
