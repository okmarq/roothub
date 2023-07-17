<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Judge extends Model
{
    use HasFactory;
    protected $fillable = ['submission_id', 'user_id', 'score', 'remark'];
    protected $hidden = ['pivot'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function submissions(): HasMany
    {
      return $this->hasMany(Submission::class);
    }

    public function trainers(): HasMany
    {
      return $this->hasMany(Trainer::class);
    }
}
