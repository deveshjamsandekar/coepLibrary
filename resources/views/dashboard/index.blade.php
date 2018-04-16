@extends('inc.masterpage')

@section('content')
<div class="album text-muted">
  <div class="container">

  	<h3>Students</h3>

  	<div class="row">

  		<div class="card">
        <a href="/students/register">Register Student</a>
      </div>

  		<div class="card">
        <a href="/students">List of Students</a>
      </div>

  	</div>
    <div class="row">

  		<div class="card">
        <a href="/books/register">Add Book</a>
      </div>

  		<div class="card">
        <a href="/books">List of Books</a>
      </div>

  	</div>
    <div class="row">

  		<div class="card">
        <a href="/books/issue">Issue Books</a>
      </div>

  		<div class="card">
        <a href="/books/return">Return Books</a>
      </div>

  	</div>

  </div>
</div>
@endsection
