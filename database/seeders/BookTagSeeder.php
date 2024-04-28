<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('book_tag')->truncate();
        $book_ids = \App\Models\Book::pluck('id')->toArray();
        $tag_ids = \App\Models\Tag::pluck('id')->toArray();

        foreach ($book_ids as $book_id) {
            $numberOfElementsToPick = rand(2, 5);
            $tags = array_slice($tag_ids, 0, $numberOfElementsToPick);

            foreach ($tags as $tag_id) {
                \App\Models\BookTag::updateOrCreate([
                    'book_id' => $book_id,
                    'tag_id' => $tag_id,
                ]);
            }
        }

    }
}
