<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'is_presentable'];
    protected $hidden = ['pivot'];
    protected $guarded = ['id'];

    public function assignment(): BelongsTo
    {
      return $this->belongsTo(Assignment::class);
    }
}
