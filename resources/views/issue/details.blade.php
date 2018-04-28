@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">

  	<div class="row">
  		<h2>Issue Details</h2>
  	</div>

    <div class="row">
    	<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Title of Book</th>
		        <th>Book Author/Publication</th>
            <th>Book Id</th>
            <th>Name of Student</th>
		        <th>MIS No</th>
            <th>Profile Image</th>
            <th>Issue Date</th>
            <th>Return Date</th>
            <th>Late</th>
		      </tr>
		    </thead>
		    <tbody>
			    	<tr>
			    		<td>{{ $book->book_name }}</td>
              <td>{{ $book->book_author }}</td>
			    		<td>{{ $book->book_id }}</td>
              <td>{{ $book->students[0]["name"]}}</td>
              <td>{{ $book->students[0]["mis_no"]}}</td>
              <td><img class="img-upload" src="/storage/uploads/{{ $book->students[0]["profile_img"]}}" width=100 height=100></td>
              <td>{{ $issuedate->format('l, jS F Y')}}</td>
              <td>{{ $returndate->format('l, jS F Y')}}</td>
              @if($current>returndate)
              <td>{{ $late}} Days</td>
              @else<td></td>
              @endif
              <form method="POST" action="/books/return/{{ $request=$book->book_id }}">

                {{ csrf_field() }}

              <td><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to return this book')">Return Book</button></td>
              </form>
			    	</tr>
		    </tbody>
		  </table>
    </div>
<a href="/books">Back</a>
  </div>

</div>
@endsection
