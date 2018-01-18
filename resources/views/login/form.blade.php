@include('header');
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">User Login</div>
      <div class="card-body">
        <form method="post" action="{{url('/login')}}" id="loginForm">
          {{ csrf_field() }}
          <div class="form-group @if($errors->has('user_name')){{' has-error'}}@endif">
            <label for="user_name">Username</label>
            <input class="form-control" id="user_name" name="user_name" type="text" placeholder="Enter username">
            <small class="text-danger">{{ $errors->first('user_name') }}</small>
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
  @include('footer');