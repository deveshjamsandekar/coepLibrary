@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">

  	<div class="row">
  		<h2>Profile Details</h2>
  	</div>


    <div class="row">
    	<table class="table table-striped">
		    <thead>
		      <tr>
            <th>MIS No</th>
            <th>Name of Student</th>
            <th>Profile Image</th>
            <th>No.of Books issued</th>
            <th>Deposit left</th>
          </tr>
              <tr>
  			    		<td>{{ $student->mis_no }}</td>
                <td>{{ $student->name }}</td>
                <td><img class="img-upload" src="/storage/uploads/{{ $student->profile_img}}" width=130 height=130></td>
                <td>{{$count}}</td>
                <td>{{$student->amount_left}}</td>
                </tr>
                </thead>

            <tbody>
            <tr>
		        <th>Title of Book</th>
		        <th>Book Author/Publication</th>
            <th>Book Id</th>
            <th>Issue Date</th>
            <th>Exp.returning Date</th>
		      </tr>
		    </tbody>
		    <tbody>
          @for($i=0;$i<$count;$i++)
			    	<tr>
			    		<td>{{ $student->books[$i]["book_name"] }}</td>
              <td>{{ $student->books[$i]["book_author"] }}</td>
              <td>{{ $student->books[$i]["book_id"]}}
              <td>{{ $student->books[$i]->pivot["created_at"]->format('l, jS F Y')}}</td>
              <td>{{ $student->books[$i]->pivot["created_at"]->addDays(10)->format('l, jS F Y')}}</td>
			    	</tr>
            @endfor
		    </tbody>
		  </table>
    </div>
  <!--  <form method="GET" action="/books/{{$student->id}}/issue">
      {{ session('message') }}
    <div class="form-group">
      <label for="book_id">Book Id</label>
      <input type="text" class="form-control" name="book_id" placeholder="Enter Book Id" required>
    </div> -->
<button class="btn btn-primary" type="button"onclick="window.location.href='/books/{{$student->id}}/issue'">Proceed</button>
<button class="btn btn-primary" type="button"onclick="window.location.href='/books/issue'">Cancel</button>
</div>
</form>
  </div>

</div>
@endsection
