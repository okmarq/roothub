<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $roles = [
      ['name' => 'super_admin'],
      ['name' => 'admin'],
      ['name' => 'trainer'],
      ['name' => 'trainee']
    ];
    Role::insert($roles);
  }
}