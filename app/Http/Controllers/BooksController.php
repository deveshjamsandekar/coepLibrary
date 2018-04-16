<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*Models*/
use App\Book;

class BooksController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }
  /*
 * TO get the list of books
 */

  public function index()
  {
    $books = Book::all();
    $books= Book::orderBy('book_id','asc')->paginate(15);
    return view('books.index', compact('books'));
  }
  /*
   * To add a new book
   */
  public function create()
  {
    return view('books.register');
  }

  /*
   * Store a new book's data
   */
  public function store(Request $request)
  {


    $book = new Book($request->all());
    $book->save();

    session()->flash('message', 'Book Added Successfully');

    return redirect('/books');
  }

  /*
   * TO get the edit page of a book
   */
  public function edit(Book $book)
  {
    return view('books.edit', compact('book'));
  }

  /*
   * TO update the edit page of a book
   */
  public function update(Request $request, Book $book)
  {
    $book->update($request->all());

    return redirect('/books');
  }

  /*
  * To search a book
  */
  public function search(Request $request)
  {
    $books = Book::where('book_id', '=', $request->search)->orWhere('book_name','LIKE','%'.$request->search.'%')->orwhere('book_author', 'LIKE','%'.$request->search.'%')->paginate(15);
    return view('books.index', compact('books'));
  }

  /*
   * To delete a book
   */
  public function destroy(Book $book)
  {
    $book->delete();
    return redirect('/books');
  }
}
