<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingResource;
use App\Models\Training;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use Illuminate\Support\Facades\Cache;

class TrainingController extends Controller
{
  public function index()
  {
    $cacheKey = 'trainings';
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, fn() => TrainingResource::collection(Training::all()));
  }

  public function store(StoreTrainingRequest $request): TrainingResource
  {
    $training = Training::create($request->all());
    return new TrainingResource($training);
  }

  public function show(Training $training)
  {
    $cacheKey = 'training_' . $training->id;
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, function () use ($training) {
      return new TrainingResource($training);
    });
  }

  public function update(UpdateTrainingRequest $request, Training $training): TrainingResource
  {
    $training->update($request->all());
    return new TrainingResource($training);
  }

  public function destroy(Training $training)
  {
    $training->delete();
    return response(null, 204);
  }
}
