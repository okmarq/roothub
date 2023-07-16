<?php

namespace App\Services;
use App\Repositories\TrainingRepository;

final class TrainingService
{
  public function __construct(private TrainingRepository $trainingRepository) {}

  public function admitTraineeToClass(int $trainee_id, int $class_id) {}
  public function assignTrainerToClass(int $trainer_id, int $class_id) {}
  public function offerTrainingCourse() {}
  public function extendTraining() {}
  public function stopTraining() {}
  public function certifyTrainee() {}
}
