<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'full_name' => $this->name,
            'role' => $this->whenLoaded('roles',$this->getRoleNames(),["Administrator"]),
            'current_plan' => $this->name,
            'billing' => $this->name,
            'status' => 2,
        ];
    }
}
