<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Code;
use App\Student;

class CodesController extends Controller
{
    public function index(Request $request)
    {
      $code = Code::latest()->first();
      $code->update($request->only('code'));

      // Change the active status of all the students to 0
      $students = Student::all();
      foreach($students as $student) {
        $student->active = 0;
        $student->update();
      }

      // Now change the maching student's active status to 1
      $student = Student::where('ibutton_no', '=', $request->code)->first();
      if($student) {
        $student->active = 1;
        $student->update();
      }

      return Code::all();
    }
}
