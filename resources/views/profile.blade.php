@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">
    {{ session('message') }}
  	<div class="row">
  		<div class="col-md-6">
		  	<h2>Delete User</h2>

	      	<form method="POST" action="/profile/delete">

	      		{{ csrf_field() }}

	      		<!-- Name -->
	      		<div class="form-group">
					    <label for="email">Email</label>
					    <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
					  </div>
					  <!-- MIS no -->
	      		<div class="form-group">
					    <label for="pass_key">Pass Key</label>
					    <input type="password" class="form-control" name="pass_key" placeholder="Enter Pass Key" required>
					  </div>
					  <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this User')">Submit</button>

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
