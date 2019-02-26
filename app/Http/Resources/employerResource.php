<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class employerResource extends JsonResource
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
        'name' => $this->name,
        'email' => $this->name,
        'role' => $this->role,
        'password' =>$this->pasword
           ];
    }
}
