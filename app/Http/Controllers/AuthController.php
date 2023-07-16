<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function registerAdmin(StoreUserRequest $request)
  {
    $request->merge(['password' => Hash::make($request['password'])]);
    $user = (new UserRepository)->create($request->all());
    $user->attachRole('admin');
    $token = $user->createToken('Register')->plainTextToken;

    return response([
      'user' => $user,
      'token' => $token
    ], 201);
  }

  public function registerTrainer(StoreUserRequest $request)
  {
    $request->merge(['password' => Hash::make($request['password'])]);
    $user = (new UserRepository)->create($request->all());
    $user->attachRole('trainer');
    $token = $user->createToken('Register')->plainTextToken;

    return response([
      'user' => $user,
      'token' => $token
    ], 201);
  }

  public function registerTrainee(StoreUserRequest $request)
  {
    $request->merge(['password' => Hash::make($request['password'])]);
    $user = (new UserRepository)->create($request->all());
    $user->attachRole('trainee');
    $token = $user->createToken('Register')->plainTextToken;

    return response([
      'user' => $user,
      'token' => $token
    ], 201);
  }

  public function login(UpdateUserRequest $request)
  {
    if (Auth::attempt(['username' => $request->username_or_email, 'password' => $request->password]) || Auth::attempt(['email' => $request->username_or_email, 'password' => $request->password])) {
      $user = User::find(auth()->id());
      $token = $user->createToken('Login')->plainTextToken;
      return response(['user' => $user, 'token' => $token], 200);
    }
    throw new AuthenticationException('Your credentials does not match our record.');
  }

  public function logout()
  {
    auth()->user()->tokens()->delete();
    return response(['message' => 'Logged out'], 200);
  }
}