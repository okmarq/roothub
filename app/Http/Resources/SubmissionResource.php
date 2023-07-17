<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionResource extends JsonResource
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
        'url' => $this->url,
        'is_presentable' => $this->is_presentable,
        'assignment' => new AssignmentResource($this->assignment)
      ];
    }
}
