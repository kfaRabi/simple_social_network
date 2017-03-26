<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active pull-left" href="http://127.0.0.1:8000/">
        <span class="glyphicon glyphicon-home"></span>
        <span>Home</span>
      </a>
      @if (auth()->check())
        <div class="pull-right nav-link">
          <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
          <span class="" style="position: relative;padding: 1rem 0;font-weight: 500;color: #cdddeb;">|</span>
          <a class="nav-link" href="/logout">Logout</a>
        </div>
      @else
        <div class="pull-right nav-link">
    		    <a class="nav-link" href="/login">Login</a>      	
            <span class="" style="position: relative;padding: 1rem 0;font-weight: 500;color: #cdddeb;">|</span>
            <a class="nav-link" href="/register">Register</a>
        </div>
      @endif
    </nav>
  </div>
</div>