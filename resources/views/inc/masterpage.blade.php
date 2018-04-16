<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Library Management System">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>COEP Library</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
  </head>

  <body>

  	@include('inc.navbar')

    <main role="main">
    	@yield('content')
    </main>.

    @include('inc.footer')

  </body>
</html>
