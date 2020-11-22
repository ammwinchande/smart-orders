<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'supplier_name' => $this->supplier->name,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => is_null($this->deleted_at) ? '' : $this->deleted_at->format('d/m/Y'),
        ];
    }
}
