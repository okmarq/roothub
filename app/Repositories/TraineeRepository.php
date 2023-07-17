<?php

namespace App\Repositories;

use App\Models\Trainee;

class TraineeRepository
{
  public function create(array $data)
  {
    return Trainee::create($data);
  }

  public function findAll()
  {
    return Trainee::all();
  }

  public function findById(int $id)
  {
    return Trainee::find($id);
  }

  public function update(int $id, array $data)
  {
    $trainee = Trainee::find($id);

    if (!$trainee) {
      // Handle trainee not found error
      return false;
    }

    $trainee->update($data);

    return $trainee;
  }

  public function delete(int $id)
  {
    $trainee = Trainee::find($id);

    if (!$trainee) {
      // Handle trainee not found error
      return false;
    }

    return $trainee->delete();
  }
}