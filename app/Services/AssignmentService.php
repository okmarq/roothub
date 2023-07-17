<?php

namespace App\Services;
use App\Repositories\AssignmentRepository;

final class AssignmentService
{
  public function __construct(private AssignmentRepository $assignmentRepository) {}

  public function createAssignment() {}
  public function getAssignment() {}
  public function updateAssignment() {}
  public function deleteAssignment() {}
  public function assessAssignment() {}
}
