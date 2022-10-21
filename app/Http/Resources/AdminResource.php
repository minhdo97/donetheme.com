<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'email' => $this->email,
            'avatar' => $this->getFirstMediaUrl('avatar'),
            'role' => $this->whenLoaded('roles', $this->getRoleNames()[0], []),
            'current_plan' => '',
            'billing' => '',
            'status' => $this->status,
        ];
    }
}
