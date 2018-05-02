<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*Models*/
use App\Student;
use App\Book;

class StudentsController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
	/*
	 * TO get the list of students
	 */
  public function index()
  {
  	$students = Student::all();
    $students= Student::orderBy('mis_no','asc')->paginate(15);
  	return view('students.index', compact('students'));
  }

  /*
   * To register a new student
   */

  public function create()
	{
		return view('students.register');
	}

	/*
	 * Store a new student's data
	 */
	public function store(Request $request)
	{

      //HANDLING IMAGES
      if($request->hasFile('profile_img')){
        //Get File name with ext
        $filenameWithExt=$request->file('profile_img')->getClientOriginalName();
        //Get just file name
        $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just file ext
        $ext=$request->file('profile_img')->getClientOriginalExtension();
        //File name to Store as per MIS No
        $fileNameToStore=$request->mis_no.'_'.time().'.'.$ext;
        //upload image
        $path=$request->file('profile_img')->storeAs('public\uploads',$fileNameToStore);

      }
		$student = new Student($request->all());
     //Assign the name of image to students->profile_img
    $student->profile_img=$fileNameToStore;
     //Save whole thing to data base
	  $student->save();

	  session()->flash('message', 'Student Created Successfully');

	  return redirect('/students');
	}

	/*
	 * TO get the edit page of a student
	 */
	public function edit(Student $student)
	{
		return view('students.edit', compact('student'));
	}

	/*``
	 * TO update the edit page of a student
	 */
	public function update(Request $request, Student $student)
	{   // $this->validate($request, [
    //'profile_img'=>'image|nullable'
    //]);
    //dd($request->all());
    $img=$request->file('profile_img');

    if($request->profile_img)
    {
      //$img=$request->hasFile('profile_img');
      $filenameWithExt=$request->file('profile_img')->getClientOriginalName();
      //Get File name with ext
      $filenameWithExt=$request->file('profile_img')->getClientOriginalName();
      //Get just file name
      $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
      //Get just file ext
      $ext=$request->file('profile_img')->getClientOriginalExtension();
      //File name to Store as per MIS No
      $fileNameToStore=$request->mis_no.'_'.time().'.'.$ext;
      //old file name
      $oldFilename=$student->profile_img;
      //upload image
      $request->file('profile_img')->storeAs('public\uploads',$fileNameToStore);
      //Deleting old file
      unlink(public_path('/storage/uploads/') . $oldFilename);
      //updating new file name
      $student->update($request->all());
      $student->profile_img=$fileNameToStore;
      $student->update();
      //Storage::delete($oldFilename);
    }
    else
    {
      $request->profile_img=$student->profile_img;
      $student->update($request->all());
      $student->profile_img=$request->profile_img;
      $student->update();
    }
		return redirect('/students');
	}
   /*
    * To search a student
    */
    public function search(Request $request)
    {
      $students = Student::where('mis_no', '=', $request->search)->orWhere('name','LIKE','%'.$request->search.'%')->orwhere('mobile_no', '=', $request->search)->paginate(15);
      $count='1';
      return view('students.index', compact('students','count'));
    }
	/*
	 * To delete a student
	 */
	public function destroy(Student $student)
	{
    unlink(public_path('\storage\uploads\\').$student->profile_img);
		$student->delete();
		return redirect('/students');
	}
/*
 * To show detils of book issued
 */
  public function bookdetails(Student $student)
   {
     $count=$student->books->count();
     for($i=0;$i<$count;$i++)
       {
         $issuedate=$student->books[$i]->pivot["created_at"];
         $returndate=$student->books[$i]->pivot["created_at"]->addDays(10);
         return view('students.bookdetails', compact('student','issuedate','returndate','count'));
       }
       return view('students.bookdetails', compact('student','issuedate','returndate','count'));

   }

}
