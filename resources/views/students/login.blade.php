@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">
  	{{ session('message') }}

  	<div class="row">

  		<div class="col-md-6">
		  	<h2>Student Sign In</h2>

	      	<form method="POST" action="/students/login">

	      		{{ csrf_field() }}

	      		<!-- Email -->
	      		<div class="form-group">
					    <label for="mis_no">MIS NO. </label>
					    <input type="text" class="form-control" name="mis_no" placeholder="Enter MIS NO." autofocus>
					  </div>

					  <!-- Password -->
	      		<!--div class="form-group">
					    <label for="password">Password</label>
					    <input type="text" class="form-control" name="password"  placeholder="Enter Password" autofocus>
					  </div>
		        <div class="checkbox">
		          <label>
		            <input type="checkbox" value="remember-me"> Remember me
		          </label>
		        </div-->
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		      </form>

		    </div>
	  	</div>

  	</div>
  </div>
</div>
@endsection
