<?php

namespace App\Services;
use App\Repositories\TrainerRepository;

final class TrainerService
{
  public function __construct(private TrainerRepository $trainerRepository) {}

  public function giveAssignment() {}
  public function markAssignmentAsPresentation() {}
  public function assessPresentation() {}
  public function assessTrainee() {}
}
