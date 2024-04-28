<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tags')->truncate();

        \App\Models\Tag::insert(
            [
                ['name' => 'Fiction'],
                ['name' => 'Non-fiction'],
                ['name' => 'Science'],
                ['name' => 'Essay'],
                ['name' => 'Memoir'],
                ['name' => 'Biography'],
                ['name' => 'Autobiography'],
                ['name' => 'Fantasy'],
                ['name' => 'Mystery'],
                ['name' => 'Thriller'],
            ]
        );

    }
}
