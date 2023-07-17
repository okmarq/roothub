<?php

namespace App\Repositories;

use App\Models\Judge;

class JudgeRepository
{
  public function create(array $data)
  {
    return Judge::create($data);
  }

  public function findAll()
  {
    return Judge::all();
  }

  public function findById(int $id)
  {
    return Judge::find($id);
  }

  public function update(int $id, array $data)
  {
    $judge = Judge::find($id);

    if (!$judge) {
      // Handle judge not found error
      return false;
    }

    $judge->update($data);

    return $judge;
  }

  public function delete(int $id)
  {
    $judge = Judge::find($id);

    if (!$judge) {
      // Handle judge not found error
      return false;
    }

    return $judge->delete();
  }
}