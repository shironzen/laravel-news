<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Читатель'],
            ['id' => 2, 'name' => 'Журналист'],
            ['id' => 3, 'name' => 'Администратор'],
        ]);
    }
}