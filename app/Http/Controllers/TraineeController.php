<?php

namespace App\Http\Controllers;

use App\Http\Resources\TraineeResource;
use App\Models\Trainee;
use App\Http\Requests\StoreTraineeRequest;
use App\Http\Requests\UpdateTraineeRequest;
use Illuminate\Support\Facades\Cache;

class TraineeController extends Controller
{
  public function index()
  {
    $cacheKey = 'trainees';
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, fn() => TraineeResource::collection(Trainee::all()));
  }

  public function store(StoreTraineeRequest $request): TraineeResource
  {
    $trainee = Trainee::create($request->all());
    return new TraineeResource($trainee);
  }

  public function show(Trainee $trainee)
  {
    $cacheKey = 'trainee_' . $trainee->id;
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, function () use ($trainee) {
      return new TraineeResource($trainee);
    });
  }

  public function update(UpdateTraineeRequest $request, Trainee $trainee): TraineeResource
  {
    $trainee->update($request->all());
    return new TraineeResource($trainee);
  }

  public function destroy(Trainee $trainee)
  {
    $trainee->delete();
    return response(null, 204);
  }
}
