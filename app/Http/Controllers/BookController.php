<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);
        return view('book.list', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function view($id)
    {
        $book = Book::findOrFail($id);
        return view('book.view', compact('book'));
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->descriptron = $request->input('descriptron');
        $book->content = $request->input('content');
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->image;

                $clientName = $image->getClientOriginalName();
                $path = $image->move(public_path('upload/images/'), $clientName);
                $book->image = $clientName;
            }
        }
        $book->save();

        Session::flash('success', 'Tao moi thanh cong');
        return redirect(route('book.index'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->descriptron = $request->input('descriptron');
        $book->content = $request->input('content');
        if ($request->hasFile('image')) {
            $currentImg = $book->image;
            if ($currentImg) {
                Storage::delete('upload/images/', $currentImg);
            }
            $image = $request->image;
            $clientName = $image->getClientOriginalName();
            $path = $image->move(public_path('upload/images', $clientName));
            $book->image = $clientName;
        }
        $book->save();

        Session::flash('success', 'Cap nhat thanh cong');
        return redirect(route('book.index'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect(route('book.index'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect(route('book.index'));
        }
        $books = Book::where('title', 'LIKE', '%' . $keyword . '%')->paginate(5);

        return view('book.list', compact('books'));
    }
}
