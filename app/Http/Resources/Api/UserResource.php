<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' =>  $this->id,
            'username' =>  $this->username,
            'firstname' =>  $this->first_name,
            'lastname' =>  $this->last_name,
            'email' =>  $this->email,
            'wallet' => new WalletResource($this->wallet),
        ];
    }
}