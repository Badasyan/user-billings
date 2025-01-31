<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->resource->name,
            'age' => $this->resource->age,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
            'token' => $this->resource->token,
        ];
    }
}
