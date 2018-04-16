@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">
  	<div class="row">

  		<div class="col-md-6">
		  	<h2>Books</h2>

	      	<form method="POST" action="/books/{{ $book->id }}">

	      		{{ csrf_field() }}

	      		<!-- Name of book -->
	      		<div class="form-group">
					    <label for="book_name">Title</label>
					    <input type="text" class="form-control" name="book_name" value="{{ $book->book_name }}" placeholder="Enter Book title">
					  </div>
					  <!-- Book id -->
	      		<div class="form-group">
					    <label for="book_id">Book Id</label>
					    <input type="text" class="form-control" name="book_id" value="{{ $book->book_id }}" placeholder="Enter Book Id">
					  </div>
            <!-- Book Author/Publication -->
            <div class="form-group">
					    <label for="book_author">Author/Publication</label>
					    <input type="text" class="form-control" name="book_author" value="{{ $book->book_author }}" placeholder="Enter Book Author/Publication">
					  </div>

					  <button type="submit" class="btn btn-primary">Submit</button>

					</form>

		    </div>
	  	</div>

  	</div>
  </div>

@endsection
