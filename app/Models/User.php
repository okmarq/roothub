<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'firstname',
    'lastname',
    'username',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'pivot'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public function roles(): BelongsToMany
  {
    return $this->belongsToMany(Role::class);
  }

  public function training(): BelongsTo
  {
    return $this->belongsTo(Training::class);
  }

  public function attachRole(string $role)
  {
    $user_role = Role::where('name', $role)->get();
    $this->roles()->attach($user_role);
  }

  public function hasRole(string|array|int $role): bool
  {
    if (is_string($role)) {
      return $this->roles->contains('name', $role);
    }

    if (is_array($role)) {
      return $this->roles->pluck('name')->intersect($role)->count() > 0;
    }

    if (is_int($role)) {
      return $this->roles->where('id', $role)->exists();
    }

    return false;
  }

  public function isAdmin(): bool
  {
    return $this->hasRole('admin');
  }

  public function isTrainer(): bool
  {
    return $this->hasRole('trainer');
  }

  public function isTrainee(): bool
  {
    return $this->hasRole('trainee');
  }
}