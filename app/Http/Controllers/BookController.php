<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("BMS.index")
            ->with("books", book::paginate(10))
            ->with("page", "All Book List");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("BMS.EnterBook")
            ->with("page", "Add New Book");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => "required|min:8|max:50|regex:/^[a-zA-Z\s]+$/",
            'book_author' => "required|min:3|max:45|regex:/^[a-zA-Z\s]+$/",
            'book_genre' => "required|min:5|max:50",
            'book_published' => "required|min:4|max:4|regex:/^[0-9]+$/",
            'book_description' => "required|min:50|max:250",
        ]);

        book::create([
            'name' => $request->book_name,
            'author' => $request->book_author,
            'image' => $request->book_img,
            'genre' => $request->book_genre,
            'published' => $request->book_published,
            'description' => $request->book_description,
        ]);

        Session()->flash("success", "New Book added successfully.");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("BMS.update")
            ->with("page", "Update Data")
            ->with("book", book::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_name' => "required|min:8|max:50|regex:/^[a-zA-Z\s]+$/",
            'book_author' => "required|min:3|max:45|regex:/^[a-zA-Z\s]+$/",
            'book_genre' => "required|min:5|max:50",
            'book_published' => "required|min:4|max:4|regex:/^[0-9]+$/",
            'book_description' => "required|min:50|max:250",
        ]);
        $book = book::find($id);
        $book->name = $request->book_name;
        $book->author = $request->book_author;
        $book->genre = $request->book_genre;
        $book->published = $request->book_published;
        $book->description = $request->book_description;

        $book->save();

        Session()->flash("success", "Your data is Updated!");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::findOrFail($id);
        $book->delete();
        Session()->flash('success', "Your Post is Deleted!");
        return redirect()->back();
    }
}
