<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{


    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);
    }
}
