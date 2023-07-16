<?php

namespace App\Services;
use App\Repositories\UserRepository;

final class UserService
{
  public function __construct(private UserRepository $userRepository) {}

  public function admitTraineeToClass() {}
  public function assignTrainee() {}
}
