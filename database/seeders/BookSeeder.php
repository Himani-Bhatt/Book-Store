<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('books')->truncate();

        \App\Models\Book::insert(
            [
                [
                    "title" => "To Kill a Mockingbird",
                    "writer" => "Harper Lee",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),
                ],
                [
                    "title" => "1984",
                    "writer" => "George Orwell",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Great Gatsby",
                    "writer" => "F. Scott Fitzgerald",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Pride and Prejudice",
                    "writer" => "Jane Austen",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "To the Lighthouse",
                    "writer" => "Virginia Woolf",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Moby-Dick",
                    "writer" => "Herman Melville",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Catcher in the Rye",
                    "writer" => "J.D. Salinger",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Beloved",
                    "writer" => "Toni Morrison",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Brave New World",
                    "writer" => "Aldous Huxley",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Picture of Dorian Gray",
                    "writer" => "Oscar Wilde",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Jane Eyre",
                    "writer" => "Charlotte Brontë",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Wuthering Heights",
                    "writer" => "Emily Brontë",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "War and Peace",
                    "writer" => "Leo Tolstoy",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Anna Karenina",
                    "writer" => "Leo Tolstoy",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Crime and Punishment",
                    "writer" => "Fyodor Dostoevsky",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "One Hundred Years of Solitude",
                    "writer" => "Gabriel García Márquez",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Brothers Karamazov",
                    "writer" => "Fyodor Dostoevsky",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Odyssey",
                    "writer" => "Homer",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Iliad",
                    "writer" => "Homer",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Lord of the Rings",
                    "writer" => "J.R.R. Tolkien",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Harry Potter and the Sorcerer's Stone",
                    "writer" => "J.K. Rowling",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Hobbit",
                    "writer" => "J.R.R. Tolkien",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Hitchhiker's Guide to the Galaxy",
                    "writer" => "Douglas Adams",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "A Song of Ice and Fire",
                    "writer" => "George R.R. Martin",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Road",
                    "writer" => "Cormac McCarthy",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Handmaid's Tale",
                    "writer" => "Margaret Atwood",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Martian",
                    "writer" => "Andy Weir",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Slaughterhouse-Five",
                    "writer" => "Kurt Vonnegut",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Book Thief",
                    "writer" => "Markus Zusak",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Kite Runner",
                    "writer" => "Khaled Hosseini",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Girl with the Dragon Tattoo",
                    "writer" => "Stieg Larsson",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Help",
                    "writer" => "Kathryn Stockett",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Life of Pi",
                    "writer" => "Yann Martel",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Fault in Our Stars",
                    "writer" => "John Green",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Gone Girl",
                    "writer" => "Gillian Flynn",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "A Brief History of Time",
                    "writer" => "Stephen Hawking",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Alchemist",
                    "writer" => "Paulo Coelho",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Eat, Pray, Love",
                    "writer" => "Elizabeth Gilbert",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Secret Life of Bees",
                    "writer" => "Sue Monk Kidd",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Hunger Games",
                    "writer" => "Suzanne Collins",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Educated",
                    "writer" => "Tara Westover",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Goldfinch",
                    "writer" => "Donna Tartt",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Night Circus",
                    "writer" => "Erin Morgenstern",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Girl on the Train",
                    "writer" => "Paula Hawkins",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Where the Crawdads Sing",
                    "writer" => "Delia Owens",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "The Silent Patient",
                    "writer" => "Alex Michaelides",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],
                [
                    "title" => "Becoming",
                    "writer" => "Michelle Obama",
                    "cover_image" => "https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg",
                    'points' => rand(1, 100),
                    'stock' => rand(5, 20),

                ],

            ]
        );

    }
}
