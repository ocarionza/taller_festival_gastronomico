<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'city' => $this->city,
            'phone' => $this->phone,
            'category_id' => $this->category_id,
            'delivery' => $this->delivery,
            'schedule' => $this->schedule,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
           
    }
}
