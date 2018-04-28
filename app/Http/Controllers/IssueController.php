<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Book;
use App\Student;
use Carbon\Carbon;
use Mail;
class IssueController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
  /*
   * To  Issue a book
   */
  public function create()
  {
    return view('issue.index');
  }

  public function info(Request $request)
  {
   //$student = Student::where('ibutton_no','=',$request->ibutton_no)->orWhere('mis_no','=',$request->mis_no)->first();
   $student = Student::where('mis_no', '=', $request->mis_no)->orWhere('ibutton_no','=',$request->ibutton_no)->first();

   $count=$student->books->count();
   return view('issue.studentdetails',compact('student','count'));

  }

 public function entry(Student $student)
 {
   return view('issue.bookentry',compact('student'));
 }

  // Linking student and book
  public function store(Student $student, Request $request)
  {
    $book = Book::where('book_id', '=', $request->book_id)->first();
    // Fetch Book
    if($book->book_status=="Issued")
     {
       session()->flash('message','Book already Issued');
       return redirect()->back();
     }

    else
    {
        // Link student and book
        $student->books()->withTimestamps()->attach($book);
        // Updating book status
       $book->book_status="Issued";

       $book->update();
        //Sending mail to student
        //Mail::send(['text'=>'mail'],['name','COEP'],function($message){
          //$message->to('deveshj23@gmail.com','Devesh')->subject('Book Issued');
          //$message->from('librarycoep@gmail.com','COEP Library');
        //});
        return redirect('/books');
    }
  }
  public function details(Book $book)
  {
    $current=Carbon::now();
    $issuedate=$book->students[0]->pivot["created_at"];
    $returndate=$book->students[0]->pivot["created_at"]->addDays(10);
    $student = $book->students->first();
    if($current>$returndate)
    {
      $late=$current->diffInDays($returndate);
      $student->amount_left = $student->amount_left - (2*$late);
      //$student->update();
    }
    $deposit = $student->amount_left;

    return view('issue.details', compact('book','issuedate','returndate','late'));
  }
}
