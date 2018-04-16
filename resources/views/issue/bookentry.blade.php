@extends('inc.masterpage')

@section('content')

<div class="album text-muted">
  <div class="container">

    {{ session('message') }}

    <div class="row">
  		<div class="col-md-6">
		  	<h2>Book Issue</h2>
        <form method="POST" action="/booksissuer/{{$student->id}}">

          {{ csrf_field() }}

        <div class="form-group">
          <label for="book_id">Book Id</label>
          <input type="text" class="form-control" name="book_id" placeholder="Enter Book Id" required>
        </div>
  <!--      <div class="form-group">
          <label for="mis_no">Mis No.</label>
          <input type="text" class="form-control" name="mis_no" placeholder="Enter MIS No" required>
        </div>
-->
      <button type="submit" class="btn btn-primary">Issue</button>
      <button class="btn btn-primary" type="button"onclick="window.location.href='/books/issue'">Cancel</button>
         </form>
       </div>
    </div>
  </div>
</div>

@endsection
