<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Student;

use Carbon\Carbon;


class ReturnController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }
  public function create()
  {
    return view('return.index');
  }

  // Link student and book
  public function store(Request $request)
  {
    // Fetch Book
    $book = Book::where('book_id', '=', $request->book_id)->first();

    $student = '';
    $students = $book->students;
    if($students->count() != 0)
      $student = $students[0];
    else
      {
      session()->flash('message','Book not Issued');
      return redirect()->back();
     }
    // Fetch Student
    // $student = Student::where('mis_no', '=', $request->mis_no)->first();

    // Delink student and book
    $student->books()->withTimestamps()->detach($book);
    // Updating  status of book
    $book->book_status="Not Issued";
    $book->update();

    return redirect('/books');
  }
  public function returning($request)
  {
    $current=Carbon::now();
    //Fetch Book
    $book = Book::where('book_id','=',$request)->first();
    $student = '';
    //Fetch Student
    $student = $book->students[0];
    // Deducting the fine amount from the deposit
    $returndate=$book->students[0]->pivot["created_at"]->addDays(10);
    $student = $book->students->first();
    if($current>$returndate)
    {
      $late=$current->diffInDays($returndate);
      $student->amount_left = $student->amount_left - (2*$late);
      $student->update();
    }
    //Delinking student and book
    $student->books()->withTimestamps()->detach($book);
    // Updating  status of book
    $book->book_status="Not Issued";
    $book->update();
    return redirect('/books');
  }
}
