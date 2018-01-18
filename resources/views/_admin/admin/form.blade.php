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
          <h2>@if(count($rows) > 0){{'Edit'}} @else {{'Add'}} @endif Administrator</h2>
          <form class="form-horizontal" action="@if(count($rows) > 0){{url('/_admin/admin/edit')}} @else {{url('/_admin/admin/add')}} @endif" id="adminForm" method="post">
            {{ csrf_field() }}
            @if(count($rows) > 0)
            <input type="hidden" name="admin_id" value="{{$rows['admin_id']}}" />
            @endif
            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('admin_firstname')){{' has-error'}}@endif">
                <label for="admin_firstname">First Name</label>                
                <input class="form-control" id="admin_firstname" name="admin_firstname" type="text" placeholder="Enter first name" value="<?= !empty($rows['admin_firstname']) ? $rows['admin_firstname'] : old('admin_firstname') ?>">
                <small class="text-danger">{{ $errors->first('admin_firstname') }}</small>
              </div>

              <div class="form-group col-sm-6 @if($errors->has('admin_lastname')){{' has-error'}}@endif">
                <label for="admin_lastname">Last Name</label>                
                <input class="form-control" id="admin_lastname" name="admin_lastname" type="text" placeholder="Enter last name" value="<?= !empty($rows['admin_lastname']) ? $rows['admin_lastname'] : old('admin_lastname') ?>">
                <small class="text-danger">{{ $errors->first('admin_lastname') }}</small>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('admin_email')){{' has-error'}}@endif">
                <label for="admin_email">Email Address</label>
                <input class="form-control" id="admin_email" name="admin_email" type="email" placeholder="Enter email address" value="<?= !empty($rows['admin_email']) ? $rows['admin_email'] : old('admin_email') ?>">
                <small class="text-danger">{{ $errors->first('admin_email') }}</small>
              </div>

              <div class="form-group col-sm-6 @if($errors->has('admin_username')){{' has-error'}}@endif">
                <label for="admin_username">Username</label>
                <input class="form-control" id="admin_username" name="admin_username" type="text" placeholder="Enter username" value="<?= !empty($rows['admin_username']) ? $rows['admin_username'] : old('admin_username') ?>">
                <small class="text-danger">{{ $errors->first('admin_username') }}</small>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('admin_password')){{' has-error'}}@endif">
                <label for="admin_password">Password</label>
                <input class="form-control" id="admin_password" name="admin_password" type="password" placeholder="Enter password">
                <small class="text-danger">{{ $errors->first('admin_password') }}</small>
              </div>
            </div>
            <a href="{{url('_admin/admin')}}" class="btn btn-sm btn-danger pull-left">Cancel</a>
            <button type="submit" value="true" class="btn btn-sm btn-primary pull-right">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    @include('_admin.footer')