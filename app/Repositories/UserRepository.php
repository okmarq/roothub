<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
  public function create(array $data)
  {
    return User::create($data);
  }

  public function findAll()
  {
    return User::all();
  }

  public function findById(int $id)
  {
    return User::find($id);
  }

  public function update(int $id, array $data)
  {
    $user = User::find($id);

    if (!$user) {
      // Handle user not found error
      return false;
    }

    $user->update($data);

    return $user;
  }

  public function delete(int $id)
  {
    $user = User::find($id);

    if (!$user) {
      // Handle user not found error
      return false;
    }

    return $user->delete();
  }
}