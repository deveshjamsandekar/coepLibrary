<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
class SessionsController extends Controller
{
  /*
   * To create a new session
   */
  public function create()
  {
  	return view('auth.login');
  }


  /*
   * To store a new session
   */
  public function store(Request $request)
  {
  	if($request->email == "admin" && $request->password == "admin")
  	{
  		return redirect('/dashboard');
  	}
  	else
  	{
  		session()->flash('message', 'In Correct User Name / Password');
  		return redirect()->back();
  	}
  }

  public function login()
  {
    return view('students.login');
  }

  public function val(Request $request)
  {
    $students = Student::where('mis_no', '=', $request->mis_no);
    if($students->count()==0)
    {
     session()->flash('message', 'Invalid Student');
     return redirect()->back();
   }
    $students = Student::where('mis_no', '=', $request->mis_no)->first();
    if($students->count()!=0 )
     {
       $count=$students->books->count();
       for($i=0;$i<$count;$i++)
         {
           $issuedate=$students->books[$i]->pivot["created_at"];
           $returndate=$students->books[$i]->pivot["created_at"]->addDays(10);
           return view('students.details', compact('students','issuedate','returndate','count'));
         }
         return view('students.details', compact('students','issuedate','returndate','count'));
     }
  }

public function profile()
 {
   return view('profile');
 }

 public function delete(Request $request )
  {
    $users=User::where('email', '=', $request->email);
    $pass=$request->pass_key;
    if($users->count()!=0 && $pass=='coep_library')
    {
    $user=User::where('email', '=', $request->email)->first();

      $user->delete();
      return redirect('/');
     }
   else
   {
     session()->flash('message', 'In Correct Email/Pass Key');
     return redirect()->back();
   }
  }
}
