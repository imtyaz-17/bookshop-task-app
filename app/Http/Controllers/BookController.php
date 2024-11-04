<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = new Book();
        $book->title = 'Sample Book';
        $book->cover_url = 'covers/sample.jpg';
        $book->price = 19.99;
        $book->confirmed = true;
        $book->description ="test book";
        $book->authors = 'Author One, Author Two';
        $book->genres = 'Genre One, Genre Two';
        $book->save();

        $books= Book::where('confirmed',true)->paginate();
        return BookResource::collection($books);
    }
    public function show($id)
    {
        $book = Book::where('confirmed', true)->findOrFail($id);
        return new BookResource($book);
    }
}
