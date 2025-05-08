<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * Process chatbot queries and return responses.
     */
    public function processQuery(Request $request): JsonResponse
    {
        $query = strtolower($request->input('query'));
        
        if (str_contains($query, 'how many authors')) {
            $count = Author::count();
            return response()->json([
                'answer' => "There are {$count} authors in the database."
            ]);
        } elseif (str_contains($query, 'how many books')) {
            $count = Book::count();
            return response()->json([
                'answer' => "There are {$count} books available in the database."
            ]);
        } elseif (str_contains($query, 'top 5 authors') || str_contains($query, 'list top 5 authors')) {
            $topAuthors = Author::withCount('books')
                ->orderByDesc('books_count')
                ->limit(5)
                ->get(['id', 'name', 'books_count']);
                
            $response = "Top 5 authors:\n";
            foreach ($topAuthors as $index => $author) {
                $response .= ($index + 1) . ". {$author->name} ({$author->books_count} books)\n";
            }
            
            return response()->json(['answer' => $response]);
        } else {
            return response()->json([
                'answer' => "I can answer these questions: 'How many authors are there?', 'How many books are available?', or 'List top 5 authors.'."
            ]);
        }
    }
}
