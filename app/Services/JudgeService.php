<?php

namespace App\Services;
use App\Repositories\AssignmentRepository;

final class AssignmentService
{
  public function __construct(private AssignmentRepository $assignmentRepository) {}

  public function clearAssignmentFromPresentations() {}
  public function disbandJudges() {}
  public function assignJudge() {}
  public function assessPresentation() {}
}
