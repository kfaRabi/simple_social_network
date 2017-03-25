<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="http://127.0.0.1:8000/">Home</a>
      <a class="nav-link" href="http://127.0.0.1:8000/posts/create">New Post</a>
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="#">New hires</a>
      <a class="nav-link" href="#">About</a>
      
      @if (auth()->check())
      
      	<a class="nav-link ml-auto" href="#">{{ auth()->user()->name }}</a>
        <span style="position: relative;padding: 1rem 0;font-weight: 500;color: #cdddeb;">|</span>
      	<a class="nav-link" href="/logout">Logout</a>

      @else

		    <a class="nav-link ml-auto" href="/login">Login</a>      	
        <span style="position: relative;padding: 1rem 0;font-weight: 500;color: #cdddeb;">|</span>
        <a class="nav-link" href="/register">Register</a>
      @endif

    </nav>
  </div>
</div>