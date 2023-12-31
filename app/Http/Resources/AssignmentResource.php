<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
        'id' => (string) $this->id,
        'name' => $this->name,
        'deadline' => $this->deadline,
        'description' => $this->description,
        'is_presentable' => $this->is_presentable,
        'training' => new TrainingResource($this->training)
      ];
    }
}
