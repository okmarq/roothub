<?php

namespace App\Services;
use App\Repositories\TraineeRepository;

final class TraineeService
{
  public function __construct(private TraineeRepository $traineeRepository) {}

  public function assessTrainee() {}
}
