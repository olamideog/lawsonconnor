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
          <h2>@if(count($rows) > 0){{'Edit'}} @else {{'Add'}} @endif File</h2>
          <form class="form-horizontal" action="@if(count($rows) > 0){{url('/_admin/files/edit')}} @else {{url('/_admin/files/add')}} @endif" id="fileForm" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(count($rows) > 0)
            <input type="hidden" name="file_id" value="{{$rows['file_id']}}" />
            @endif
            <div class="row">
              <div class="form-group col-sm-6 @if($errors->has('file_name')){{' has-error'}}@endif">
                <label for="file_name">Upload File</label>                
                <input class="form-control" id="file_name" name="file_name" type="file" placeholder="Upload File" value="<?= !empty($rows['file_name']) ? $rows['file_name'] : old('file_name') ?>">
                <small class="text-danger">{{ $errors->first('file_name') }}</small>
              </div>
            </div>
            <br>
            <hr>
            <br>
            <div class="row">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Email Address</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if($users->count() > 0)
                      @foreach($users as $user)
                      <tr>
                        <td><input type="checkbox" name="user[]" value="{{$user['user_id']}}" @if(in_array($user['user_id'], $viewed)) {{'checked'}} @endif></td>
                        <td>{{$user['user_firstname']}} {{$user['user_lastname']}}</td>
                        <td>{{$user['user_email']}}</td>                    
                      </tr>
                      @endforeach
                    @else
                    <tr>
                      <td colspan="3" class="text-center"><strong>No Records</strong></td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <a href="{{url('_admin/files')}}" class="btn btn-sm btn-danger pull-left">Cancel</a>
            <button type="submit" value="true" class="btn btn-sm btn-primary pull-right">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->    
    @include('_admin.footer')