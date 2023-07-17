<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
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
      'trainer' => new TrainerResource($this->trainer),
      'trainees' => TraineeResource::collection($this->trainees),
      'assignments' => TraineeResource::collection($this->assignments),
      'submissions' => TraineeResource::collection($this->submissions)
    ];
  }
}