<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
      <a href="/" class="navbar-brand">COEP Library</a>
        @if(Auth::user())
        <ul class="nav navbar-nav navbar-right">
          <li>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="caret">{{ Auth::user()->name }} </span>
        <form method="POST" action="/logout">
          {{ csrf_field() }}
          <button class="btn" type="submit" name="button">Logout</button>
        </form>
        <li>
      </ul>
      @endif
  </span>
      </button>
    </div>
  </div>
</header>
