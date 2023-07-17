<?php

namespace App\Services;
use App\Repositories\AssignmentRepository;

final class AssignmentService
{
  public function __construct(private AssignmentRepository $assignmentRepository) {}

  public function updateAssignment() {}
  public function deleteAssignment() {}

  public function giveAssignment() {}
  public function getAssignment() {}
  public function submitAssignment() {}
  public function markAsPresentation() {}
  public function assessAssignment() {}

}
