<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use Illuminate\Support\Facades\Cache;

class AssignmentController extends Controller
{
  public function index()
  {
    $cacheKey = 'assignments';
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, fn() => AssignmentResource::collection(Assignment::all()));
  }

  public function store(StoreAssignmentRequest $request): AssignmentResource
  {
    $assignment = Assignment::create($request->all());
    return new AssignmentResource($assignment);
  }

  public function show(Assignment $assignment)
  {
    $cacheKey = 'assignment_' . $assignment->id;
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, function () use ($assignment) {
      return new AssignmentResource($assignment);
    });
  }

  public function update(UpdateAssignmentRequest $request, Assignment $assignment): AssignmentResource
  {
    $assignment->update($request->all());
    return new AssignmentResource($assignment);
  }

  public function destroy(Assignment $assignment)
  {
    $assignment->delete();
    return response(null, 204);
  }
}
