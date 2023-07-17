<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('trainers', function (Blueprint $table) {
      $table->id();
      $table->foreignId('training_id')
        ->constrained()
        ->cascadeOnUpdate()
        ->cascadeOnDelete();
      $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnUpdate()
        ->cascadeOnDelete();
      $table->unique(['training_id', 'user_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('trainers');
  }
};