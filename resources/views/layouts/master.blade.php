<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="/css/bulma.css"> --}}

  </head>

  <body>
    <div id="root" style="position: relative;">
    
        @include('layouts.nav')

        @yield('status_form')

        <div class="container" >
         
          <div class="row">

              <div class="col-md-9 blog-main">

                @yield('content')
              
              </div>

              {{-- @yield('sidebar') --}}

                @include('layouts.sidebar')

          </div>

        </div>
            @include('layouts.footer');
    </div>
      <script src="/js/moment.js"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <script src = "https://unpkg.com/vue"></script>
      <script src = "/js/app.js"></script>
      <script>
        // alert(moment());
      </script>
  </body>
</html>
