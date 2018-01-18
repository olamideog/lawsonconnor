@include('_admin.header');
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Area Login</div>
      <div class="card-body">
        <form method="post" action="{{url('/_admin')}}" id="loginForm">
          {{ csrf_field() }}
          <div class="form-group @if($errors->has('admin_username')){{' has-error'}}@endif">
            <label for="admin_username">Username</label>
            <input class="form-control" id="admin_username" name="admin_username" type="text" placeholder="Enter username">
            <small class="text-danger">{{ $errors->first('admin_username') }}</small>
          </div>
          <div class="form-group @if($errors->has('password')){{' has-error'}}@endif">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
            <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
  @include('_admin.footer');