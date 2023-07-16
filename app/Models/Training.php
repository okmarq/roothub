<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'duration'];
    protected $hidden = ['pivot'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function trainer(): HasOne
    {
      return $this->hasOne(User::class);
    }

    public function trainees(): HasMany
    {
      return $this->hasMany(User::class);
    }

    public function courses(): HasMany
    {
      return $this->hasMany(Course::class);
    }
}
