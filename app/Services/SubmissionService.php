<?php

namespace App\Services;
use App\Repositories\SubmissionRepository;

final class SubmissionService
{
  public function __construct(private SubmissionRepository $submissionRepository) {}

  public function createSubmission() {}
  public function getSubmission() {}
  public function updateSubmission() {}
  public function deleteSubmission() {}
  public function assessSubmission() {}

  public function uploadForPresentation() {}
}
