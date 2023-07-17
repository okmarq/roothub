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
    Schema::create('judges', function (Blueprint $table) {
      $table->id();
      $table->foreignId('submission_id')
        ->constrained()
        ->cascadeOnUpdate()
        ->cascadeOnDelete();
      $table->foreignId('user_id')
        ->comment('judge')
        ->constrained()
        ->cascadeOnUpdate()
        ->cascadeOnDelete();
      $table->smallInteger('score');
      $table->text('remark');
      $table->unique(['submission_id', 'user_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('judges');
  }
};