@extends('inc.masterpage')

@section('content')

<div class="album text-muted">
  <div class="container">

    {{ session('message') }}

  	<div class="row">
  		<div class="col-md-6">
		  	<h2>Book Return</h2>
        <form method="POST" action="/books/return">

           {{ csrf_field() }}

        <div class="form-group">
          <label for="book_id">Book Id</label>
          <input type="text" class="form-control" name="book_id" placeholder="Enter Book Id" required>
        </div>
        <!-- <div class="form-group">
          <label for="mis_no">Mis No.</label>
          <input type="text" class="form-control" name="mis_no" placeholder="Enter MIS No">
        </div> -->

             <button type="submit" class="btn btn-primary">Return Book</button>
           </form>
        </div>
     </div>
  </div>
</div>


@endsection
