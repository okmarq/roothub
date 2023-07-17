<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'is_presentable'];
    protected $hidden = ['pivot'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function training(): BelongsTo
    {
      return $this->belongsTo(Training::class);
    }
}
