@include('_admin.header')

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  @include('_admin.menu') 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">{{ucfirst($dir)}}</a>
        </li>
        <li class="breadcrumb-item active">Table</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> {{ucfirst($dir)}}</div>
        <div class="card-body">
          <h2>@if(count($rows) > 0){{'Edit'}} @else {{'Add'}} @endif User</h2>
          <form class="form-horizontal" action="@if(count($rows) > 0){{url('/_admin/user/edit')}} @else {{url('/_admin/user/add')}} @endif" id="userForm" method="post">
            {{ csrf_field() }}
            @if(count($rows) > 0)
            <input type="hidden" name="user_id" value="{{$session('user_id')}}" />
            @endif
            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('user_firstname')){{' has-error'}}@endif">
                <label for="user_firstname">First Name</label>                
                <input class="form-control" id="user_firstname" name="user_firstname" type="text" placeholder="Enter first name" value="<?= !empty($rows['user_firstname']) ? $rows['user_firstname'] : old('user_firstname') ?>">
                <small class="text-danger">{{ $errors->first('user_firstname') }}</small>
              </div>

              <div class="form-group col-sm-6 @if($errors->has('user_lastname')){{' has-error'}}@endif">
                <label for="user_lastname">Last Name</label>                
                <input class="form-control" id="user_lastname" name="user_lastname" type="text" placeholder="Enter last name" value="<?= !empty($rows['user_lastname']) ? $rows['user_lastname'] : old('user_lastname') ?>">
                <small class="text-danger">{{ $errors->first('user_lastname') }}</small>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('user_email')){{' has-error'}}@endif">
                <label for="user_email">Email Address</label>
                <input class="form-control" id="user_email" name="user_email" type="email" placeholder="Enter email address" value="<?= !empty($rows['user_email']) ? $rows['user_email'] : old('user_email') ?>">
                <small class="text-danger">{{ $errors->first('user_email') }}</small>
              </div>

              <div class="form-group col-sm-6 @if($errors->has('user_name')){{' has-error'}}@endif">
                <label for="user_name">Username</label>
                <input class="form-control" id="user_name" name="user_name" type="text" placeholder="Enter username" value="<?= !empty($rows['user_name']) ? $rows['user_name'] : old('user_name') ?>">
                <small class="text-danger">{{ $errors->first('user_name') }}</small>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('user_password')){{' has-error'}}@endif">
                <label for="user_password">Password</label>
                <input class="form-control" id="user_password" name="user_password" type="password" placeholder="Enter password">
                <small class="text-danger">{{ $errors->first('user_password') }}</small>
              </div>
            </div>
            <a href="{{url('_admin/user')}}" class="btn btn-sm btn-danger pull-left">Cancel</a>
            <button type="submit" value="true" class="btn btn-sm btn-primary pull-right">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    @include('_admin.footer')