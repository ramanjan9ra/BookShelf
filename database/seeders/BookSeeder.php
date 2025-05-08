<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksByAuthor = [
            'J.K. Rowling' => [
                [
                    'title' => 'Harry Potter and the Philosopher\'s Stone',
                    'description' => 'The first novel in the Harry Potter series.',
                    'published_year' => 1997,
                    'isbn' => '9780747532699',
                ],
                [
                    'title' => 'Harry Potter and the Chamber of Secrets',
                    'description' => 'The second novel in the Harry Potter series.',
                    'published_year' => 1998,
                    'isbn' => '9780747538486',
                ],
                [
                    'title' => 'Harry Potter and the Prisoner of Azkaban',
                    'description' => 'The third novel in the Harry Potter series.',
                    'published_year' => 1999,
                    'isbn' => '9780747542155',
                ]
            ],
            'Stephen King' => [
                [
                    'title' => 'The Shining',
                    'description' => 'Horror novel about a family staying at an isolated hotel.',
                    'published_year' => 1977,
                    'isbn' => '9780307743657',
                ],
                [
                    'title' => 'It',
                    'description' => 'Horror novel about an evil entity that preys on children.',
                    'published_year' => 1986,
                    'isbn' => '9781501142970',
                ],
                [
                    'title' => 'The Stand',
                    'description' => 'Post-apocalyptic horror/fantasy novel.',
                    'published_year' => 1978,
                    'isbn' => '9780307743688',
                ]
            ],
            'Jane Austen' => [
                [
                    'title' => 'Pride and Prejudice',
                    'description' => 'A romantic novel of manners.',
                    'published_year' => 1813,
                    'isbn' => '9780141439518',
                ],
                [
                    'title' => 'Sense and Sensibility',
                    'description' => 'A novel about two sisters with contrasting temperaments.',
                    'published_year' => 1811,
                    'isbn' => '9780141439662',
                ],
                [
                    'title' => 'Emma',
                    'description' => 'A novel about youthful hubris and romantic misunderstandings.',
                    'published_year' => 1815,
                    'isbn' => '9780141439587',
                ]
            ],
            'Gabriel García Márquez' => [
                [
                    'title' => 'One Hundred Years of Solitude',
                    'description' => 'The multi-generational story of the Buendía family.',
                    'published_year' => 1967,
                    'isbn' => '9780060883287',
                ],
                [
                    'title' => 'Love in the Time of Cholera',
                    'description' => 'A romance that spans 50 years.',
                    'published_year' => 1985,
                    'isbn' => '9780307389732',
                ],
                [
                    'title' => 'Chronicle of a Death Foretold',
                    'description' => 'A non-linear narrative about a murder in a small town.',
                    'published_year' => 1981,
                    'isbn' => '9781400034710',
                ]
            ],
            'Haruki Murakami' => [
                [
                    'title' => 'Norwegian Wood',
                    'description' => 'A nostalgic story of loss and sexuality.',
                    'published_year' => 1987,
                    'isbn' => '9780375704024',
                ],
                [
                    'title' => 'Kafka on the Shore',
                    'description' => 'A tale of two interrelated plots, with magical realism elements.',
                    'published_year' => 2002,
                    'isbn' => '9781400079278',
                ],
                [
                    'title' => '1Q84',
                    'description' => 'A story about a woman who enters a parallel existence.',
                    'published_year' => 2009,
                    'isbn' => '9780307476463',
                ]
            ]
        ];

        foreach ($booksByAuthor as $authorName => $books) {
            $author = Author::where('name', $authorName)->first();
            
            if ($author) {
                foreach ($books as $bookData) {
                    $book = new Book($bookData);
                    $book->author_id = $author->id;
                    $book->save();
                }
            }
        }
    }
}
