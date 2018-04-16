@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">

  	{{ session('message') }}

  	<div class="row">
  		<h2>Books</h2>
  	</div>
    <form action="/books/search" method="GET">

      <div class="form-group">
        <input class="form-control" type="text" name="search" placeholder="Enter books credentials to search" autofocus>
      </div>
      <button class="btn btn-primary" type="submit">Search</button><br></br>
    </form>
    <div class="form-group">
      <button class="btn btn-primary" type="button"onclick="window.location.href='/books/register'">Add a Book</button>
      <button class="btn btn-primary" type="button"onclick="window.location.href='/dashboard'">Main menu</button>
    </div>

    <div class="row">
    	<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Title of Book</th>
		        <th>Book Author/Publication</th>
            <th>Book Id</th>
            <th>Book Status</th>
		        <th>Operations</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($books as $book)
			    	<tr>
			    		<td>{{ $book->book_name }}</td>
              <td>{{ $book->book_author }}</td>
			    		<td>{{ $book->book_id }}</td>
              @if($book->book_status=="Issued")
              <td><a href="/books/{{$book->id}}/details">Issued</a></td>
              @else
              <td>{{ $book->book_status}}</td>
              @endif
			    		<td>
			    			<a href="/books/{{$book->id}}/edit">edit</a>  /
			    			<a href="/books/{{$book->id}}/delete" onclick="return confirm('Are you sure you want to delete this book')">delete</a>
			    	</tr>
			    @endforeach
		    </tbody>
		  </table>
{{$books->links()}}
    </div>
<a href="/dashboard">Back to Dashboard</a>
  </div>

</div>
@endsection
