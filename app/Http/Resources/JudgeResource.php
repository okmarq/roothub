<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JudgeResource extends JsonResource
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
      'score' => (string) $this->score,
      'remark' => $this->remark,
      'trainer' => new TrainerResource($this->trainer),
      'submission' => new TraineeResource($this->submission)
    ];
  }
}