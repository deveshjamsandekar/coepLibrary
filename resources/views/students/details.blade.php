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
  			    		<td>{{ $students->mis_no }}</td>
                <td>{{ $students->name }}</td>
                <td><img class="img-upload" src="/storage/uploads/{{ $students->profile_img}}" width=130 height=130></td>
                <td>{{ $students->books->count()}}</td>
                <td>{{ $students->amount_left }}</td>
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
			    		<td>{{ $students->books[$i]["book_name"] }}</td>
              <td>{{ $students->books[$i]["book_author"] }}</td>
              <td>{{ $students->books[$i]["book_id"]}}
              <td>{{ $students->books[$i]->pivot["created_at"]->format('l, jS F Y')}}</td>
              <td>{{ $students->books[$i]->pivot["created_at"]->addDays(10)->format('l, jS F Y')}}</td>
			    	</tr>
            @endfor
		    </tbody>
		  </table>
    </div>
<a href="/">Back</a>
  </div>

</div>
@endsection
