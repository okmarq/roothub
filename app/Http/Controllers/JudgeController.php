<?php

namespace App\Http\Controllers;

use App\Http\Resources\JudgeResource;
use App\Models\Judge;
use App\Http\Requests\StoreJudgeRequest;
use App\Http\Requests\UpdateJudgeRequest;
use Illuminate\Support\Facades\Cache;

class JudgeController extends Controller
{
  public function index()
  {
    $cacheKey = 'judges';
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, fn() => JudgeResource::collection(Judge::all()));
  }

  public function store(StoreJudgeRequest $request): JudgeResource
  {
    $judge = Judge::create($request->all());
    return new JudgeResource($judge);
  }

  public function show(Judge $judge)
  {
    $cacheKey = 'judge_' . $judge->id;
    $cacheTime = 3600;
    return Cache::remember($cacheKey, $cacheTime, function () use ($judge) {
      return new JudgeResource($judge);
    });
  }

  public function update(UpdateJudgeRequest $request, Judge $judge): JudgeResource
  {
    $judge->update($request->all());
    return new JudgeResource($judge);
  }

  public function destroy(Judge $judge)
  {
    $judge->delete();
    return response(null, 204);
  }
}