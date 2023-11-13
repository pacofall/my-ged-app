<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Document::factory(10)->create()
                              ->each(function ($document) {
                                  $tags = Tag::query()
                                     ->inRandomOrder()
                                     ->take(5)
                                     ->get();

                                  $document->tags()->attach($tags);
                                  $document->tags()->saveMany($tags);
         });
    }
}
