@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">
  	<div class="row">

  		<div class="col-md-6">
		  	<h2>Students</h2>

	      	<form method="POST" action="/students" enctype="multipart/form-data">

	      		{{ csrf_field() }}

	      		<!-- Name -->
	      		<div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
					  </div>
					  <!-- MIS no -->
	      		<div class="form-group">
					    <label for="mis_no">MIS NO.</label>
					    <input type="text" class="form-control" name="mis_no" placeholder="Enter MIS NO." required>
					  </div>
					  <!-- Gender -->
	      		<div class="form-group">
					    <label for="gender">Gender</label>
              <input type="radio" name="gender" value="Male" size="10">Male
              <input type="radio" name="gender" value="Female" size="10" placeholder="Enter Gender" required>Female</td>
            </div>
					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" class="form-control" name="email"  placeholder="Enter Email" required>
					  </div>
					  <div class="form-group">
					    <label for="mobile_no">Mobile No.</label>
					    <input type="phone" class="form-control" name="mobile_no"  placeholder="Enter Mobile No" required>
					  </div>
            <div class="form-group">
					    <label for="ibutton_no">IButton No.</label>
					    <input type="text" class="form-control" name="ibutton_no"  placeholder="Enter IButton No" >
					  </div>
            <div class="form-group">
					    <label for="profile_img">Profile Image</label>
					    <input type="file" class="form-control" name="profile_img"  placeholder="Upload an Image" required>
					  </div>
            <div class="form-group">
					    <label for="amount_left">Deposit Amount</label>
					    <input type="amount_left" class="form-control" name="amount_left" value="500"  placeholder="Enter Deposit Amount" required>
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
