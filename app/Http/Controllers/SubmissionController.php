<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;

class SubmissionController extends Controller
{
  public function index()
  {
    $cacheKey = 'submissions';
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, fn() => SubmissionResource::collection(Submission::all()));
  }

  public function store(StoreSubmissionRequest $request): SubmissionResource
  {
    $submission = Submission::create($request->all());
    return new SubmissionResource($submission);
  }

  public function show(Submission $submission)
  {
    $cacheKey = 'submission_' . $submission->id;
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, function () use ($submission) {
      return new SubmissionResource($submission);
    });
  }

  public function update(UpdateSubmissionRequest $request, Submission $submission): SubmissionResource
  {
    $submission->update($request->all());
    return new SubmissionResource($submission);
  }

  public function destroy(Submission $submission)
  {
    $submission->delete();
    return response(null, 204);
  }
}
