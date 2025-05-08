<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'J.K. Rowling',
                'bio' => 'British author best known for the Harry Potter series.',
                'email' => 'jk@author.com',
            ],
            [
                'name' => 'Stephen King',
                'bio' => 'American author of horror, supernatural fiction, suspense, and fantasy novels.',
                'email' => 'stephen@author.com',
            ],
            [
                'name' => 'Jane Austen',
                'bio' => 'English novelist known primarily for her six major novels.',
                'email' => 'jane@author.com',
            ],
            [
                'name' => 'Gabriel García Márquez',
                'bio' => 'Colombian novelist, short-story writer known for magical realism.',
                'email' => 'gabriel@author.com',
            ],
            [
                'name' => 'Haruki Murakami',
                'bio' => 'Japanese writer whose works are characterized by elements of surrealism and nihilism.',
                'email' => 'haruki@author.com',
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
