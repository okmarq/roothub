<?php

namespace App\Repositories;

use App\Models\Trainer;

class TrainerRepository
{
  public function create(array $data)
  {
    return Trainer::create($data);
  }

  public function findAll()
  {
    return Trainer::all();
  }

  public function findById(int $id)
  {
    return Trainer::find($id);
  }

  public function update(int $id, array $data)
  {
    $trainer = Trainer::find($id);

    if (!$trainer) {
      // Handle trainer not found error
      return false;
    }

    $trainer->update($data);

    return $trainer;
  }

  public function delete(int $id)
  {
    $trainer = Trainer::find($id);

    if (!$trainer) {
      // Handle trainer not found error
      return false;
    }

    return $trainer->delete();
  }
}