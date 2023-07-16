<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('levels')->insert([
      'name' => 'basic'
    ]);
    DB::table('levels')->insert([
      'name' => 'intermediate'
    ]);
    DB::table('levels')->insert([
      'name' => 'advance'
    ]);
    DB::table('levels')->insert([
      'name' => 'intern'
    ]);
  }
}