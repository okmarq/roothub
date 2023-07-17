<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainerResource;
use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use Illuminate\Support\Facades\Cache;

class TrainerController extends Controller
{
  public function index()
  {
    $cacheKey = 'trainers';
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, fn() => TrainerResource::collection(Trainer::all()));
  }

  public function store(StoreTrainerRequest $request): TrainerResource
  {
    $trainer = Trainer::create($request->all());
    return new TrainerResource($trainer);
  }

  public function show(Trainer $trainer)
  {
    $cacheKey = 'trainer_' . $trainer->id;
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, function () use ($trainer) {
      return new TrainerResource($trainer);
    });
  }

  public function update(UpdateTrainerRequest $request, Trainer $trainer): TrainerResource
  {
    $trainer->update($request->all());
    return new TrainerResource($trainer);
  }

  public function destroy(Trainer $trainer)
  {
    $trainer->delete();
    return response(null, 204);
  }
}