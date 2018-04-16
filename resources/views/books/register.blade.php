@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">
  	<div class="row">

  		<div class="col-md-6">
		  	<h2>Books</h2>

	      	<form method="POST" action="/books">

	      		{{ csrf_field() }}

	      		<!-- Name -->
	      		<div class="form-group">
					    <label for="book_name">Title</label>
					    <input type="text" class="form-control" name="book_name" placeholder="Enter Book Title" required>
					  </div>
					  <!-- Book Id -->
	      		<div class="form-group">
					    <label for="book_id">Book Id.</label>
					    <input type="text" class="form-control" name="book_id" placeholder="Enter Book Id" required>
					  </div>
            <!-- Book Author/Publication -->
            <div class="form-group">
					    <label for="book_author">Author/Publication</label>
					    <input type="text" class="form-control" name="book_author" placeholder="Enter Book Author/Publication" required>
					  </div>

					  <button type="submit" class="btn btn-primary">Submit</button>

					</form>

		    </div>
	  	</div>

  	</div>

  	<div class="row">
  		@foreach($errors as $error)
  			{{ $error }}
  		@endforeach
  	</div>
  </div>
</div>
@endsection
