@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">

  	{{ session('message') }}

  	<div class="row">
  		<h2>Students</h2>
  	</div>
    <!-- Search Functionality -->
    <form action="/students/search" method="GET">

      <div class="form-group">
        <input class="form-control" type="text" name="search" placeholder="Enter Students credentials to search" autofocus>
      </div>
      <button class="btn btn-primary" type="submit">Search</button>
      <br></br>
      <div class="form-group">
        <button class="btn btn-primary" type="button"onclick="window.location.href='/students/register'">Add a Student</button>
    <!--    <button class="btn btn-primary" type="button"onclick="window.location.href='/books/register'">Add a Book</button>
        <button class="btn btn-primary" type="button"onclick="window.location.href='/books/issue'">Issue Books</button>
        <button class="btn btn-primary" type="button"onclick="window.location.href='/books/return'">Return Books</button> -->
        <button class="btn btn-primary" type="button"onclick="window.location.href='/dashboard'">Main menu</button>
     </div>
   </form>
    <div class="row">
    	<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>MIS NO.</th>
		        <th>Gender</th>
		        <th>Email</th>
		        <th>MobileNo</th>
            <th>Profile Image</th>
            <th>Books Issued</th>
            <th>Deposit Remaining</th>
		        <th>Operations</th>

		      </tr>
		    </thead>
		    <tbody>
			    @foreach($students as $student)
			    	<tr>
			    		<td>{{ $student->name }}</td>
			    		<td>{{ $student->mis_no }}</td>
			    		<td>{{ $student->gender }}</td>
			    		<td>{{ $student->email }}</td>
			    		<td>{{ $student->mobile_no }}</td>
              <td><img class="img-upload" src="/storage/uploads/{{ $student->profile_img }}" width=100 height=100></td>
              <td><a href="/students/{{$student->id}}/bookdetails">{{$student->books->count()}}</a></td>
              <td> {{ $student->amount_left }}</td>
			    		<td>
			    			<a href="/students/{{$student->id}}/edit">Edit</a>  /
			    			<a href="/students/{{$student->id}}/delete" onclick="return confirm('Are you sure you want to delete this student')">Delete</a>
             </td>
          	</tr>
			    @endforeach
		    </tbody>
		  </table>
{{$students->links()}}
    </div>
<a href="/dashboard">Back to Dashboard</a>
  </div>
</div>

@endsection
