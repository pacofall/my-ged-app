<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Document;
use App\Models\DocumentsUsersPermission;
use App\Models\DocumentUsersPermission;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
             'name' => "Admin admin",
            'email' => "admin@abisoft.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create();

        $this->call([
            TagSeeder::class,
            CategorySeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class
        ]);

        Document::factory(10)->create()
                ->each(function ($document) {
                    $tags = Tag::query()
                               ->inRandomOrder()
                               ->take(5)
                               ->get();

                    $document->tags()->attach($tags);
                    $document->tags()->saveMany($tags);
                });


        DocumentsUsersPermission::factory(30)->create();


    }
}
