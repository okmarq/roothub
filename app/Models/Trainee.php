<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainee extends Model
{
    use HasFactory;
    protected $fillable = ['training_id', 'user_id'];
    protected $hidden = ['pivot'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function training(): BelongsTo
    {
      return $this->belongsTo(Training::class);
    }

    public function assignments(): HasMany
    {
      return $this->hasMany(Assignment::class);
    }
    public function submissions(): HasMany
    {
      return $this->hasMany(Submission::class);
    }
}
