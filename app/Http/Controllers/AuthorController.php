<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Enums\AuthorGenderEnum;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $authors = Author::all();
        $authors = Author::orderBy('id', 'desc')->paginate(15);
        return  view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrGender = AuthorGenderEnum::class;
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'bio' => 'required',
        // ]);
        // Author::create($request->all());

        $author = new Author();
        $author->name = $request->name;
        $author->bio = $request->bio; // Giới thiệu bản thân
        $file = $request->file('avatar');
        //dd($file); // Dùng để test xem các thuộc tính
        $file->move('images', $file->getClientOriginalName());
        $author->avatar = $file->getClientOriginalName();
        $author->birth_day = date('Y-m-d', strtotime($request->birth_day)); //date('Y-m-d H:i:s', strtotime($request->date));
        $author->gender = $request->gender;
        $author->save();

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
        ]);

        // $validatedData = $request->validate([
        //     'username' => 'required|alpha|min:6|max:10',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        //     'password_confirmation' => 'required|same:password',
        // ]);

        $author->update($request->all());
        return redirect()->route('authors.index')
                            ->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $books = Book::all();
        foreach($books as $book){
            if($book->author_id == $author->id){
                $book->delete();
            }
        }
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
