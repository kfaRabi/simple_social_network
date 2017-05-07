<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <div class=" nav-link pull-left">
      <a class="nav-link" href="{{url('/')}}">
        <span class="glyphicon glyphicon-home"></span>
        <span>Home</span>
      </a>
      <a style="cursor: pointer;" class="nav-link" v-if="showform == false" @click="showform = true">
        <span class="glyphicon glyphicon-share"></span>
        <span>Let me tell you something...</span>
      </a>
      </div>
      @if (auth()->check())
        <div class="pull-right nav-link">
          <a data-toggle="tooltip" title="See all of your posts" class="nav-link" href="/?userid={{auth()->user()->id}}"><span class="glyphicon glyphicon-user"></span> {{ auth()->user()->name }} </a>
          <span class="" style="position: relative;padding: 1rem 0;font-weight: 500;color: #cdddeb;">|</span>
          <a class="nav-link" href="/logout"> <span class="glyphicon glyphicon-log-out"> </span> Logout</a>
        </div>
      @else
        <div class="pull-right nav-link">
    		    <a class="nav-link" href="/login">
              <span class="glyphicon glyphicon-log-in"></span>
              Login
            </a>      	
            <span class="" style="position: relative;padding: 1rem 0;font-weight: 500;color: #cdddeb;">|</span>
            <a class="nav-link" href="/register">
              <span style="color: #5cb85c" class="glyphicon glyphicon-user"></span>
              Register
            </a>
        </div>
      @endif
    </nav>
  </div>
</div>