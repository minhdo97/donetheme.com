<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'name' => $this->name,
            'assigned_to' => $this->whenLoaded('roles',$this->getRoleNames(),["Administrator"]),
            'created_date' => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
        ];
    }
}
