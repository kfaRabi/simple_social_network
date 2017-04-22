<div class="col-md-3 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
  </div>
  <div class="">
    {{-- <h3 class="label label-primary custom-heading-sm">Post Groups</h3> --}}
    <ul class="list-group">
      <h3 class="list-group-item active">Post Groups</h3>
      @foreach ($postsGroup as $group)
        <li class="list-group-item">
          <a href="/?userid={{  $group->user_id }}">
            <i style="font-size: 12px" >{{  App\User::find($group->user_id)->name }}</i>
          </a>
          <span class="badge">  {{$group->count}} </span>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->