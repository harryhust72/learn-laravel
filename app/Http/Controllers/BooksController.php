<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\UpsertBookValidation;

class BooksController extends Controller
{
    public function list(Request $request)
    {
        $keyword = $request->input('keyword', '');
        $books = $keyword ? Book::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->get()
            : Book::all();
        return view('books.list', [
            "books" => $books
        ]);
    }

    public function detail(Request $request, $id)
    {
        $book = Book::where("id", $id)->first();
        $notFound = empty($book);
        $wantJson = request()->ajax();

        if ($wantJson) {
            if ($notFound) {
                return response()->json(['error' => 'Book not found'], 404);
            }
            return response()->json($book);
        }

        if ($notFound) {
            abort(404);
        }
        return view('books.detail', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(UpsertBookValidation $request)
    {
        $newbook = Book::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return response()->json($newbook);
    }

    public function update(UpsertBookValidation $request, $id)
    {
        $book = Book::where('id', $id)->first();
        if (empty($book)) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        Book::where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $book = Book::where('id', $id)->first();

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
        }
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
