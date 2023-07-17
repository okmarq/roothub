<?php

namespace App\Repositories;

use App\Models\Assignment;

class AssignmentRepository
{
  public function create(array $data)
  {
    return Assignment::create($data);
  }

  public function findAll()
  {
    return Assignment::all();
  }

  public function findById(int $id)
  {
    return Assignment::find($id);
  }

  public function update(int $id, array $data)
  {
    $assignment = Assignment::find($id);

    if (!$assignment) {
      // Handle assignment not found error
      return false;
    }

    $assignment->update($data);

    return $assignment;
  }

  public function delete(int $id)
  {
    $assignment = Assignment::find($id);

    if (!$assignment) {
      // Handle assignment not found error
      return false;
    }

    return $assignment->delete();
  }
}