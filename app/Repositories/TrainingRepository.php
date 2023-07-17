<?php

namespace App\Repositories;

use App\Models\Training;

class TrainingRepository
{
  public function create(array $data)
  {
    return Training::create($data);
  }

  public function findAll()
  {
    return Training::all();
  }

  public function findById(int $id)
  {
    return Training::find($id);
  }

  public function update(int $id, array $data)
  {
    $training = Training::find($id);

    if (!$training) {
      // Handle training not found error
      return false;
    }

    $training->update($data);

    return $training;
  }

  public function delete(int $id)
  {
    $training = Training::find($id);

    if (!$training) {
      // Handle training not found error
      return false;
    }

    return $training->delete();
  }
}