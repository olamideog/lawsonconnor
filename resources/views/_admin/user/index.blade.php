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
          <i class="fa fa-table"></i> {{ucfirst($dir)}}
          <a class="btn btn-sm btn-success pull-right" href="{{url('_admin/user/add')}}"><i class="fa fa-plus"></i> Add User</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created On</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>Created On</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @if($rows->count() > 0)
                  @foreach($rows as $row)
                  <tr>
                    <td>{{$row['user_firstname']}} {{$row['user_lastname']}}</td>
                    <td>{{$row['user_email']}}</td>
                    <td>{{$row['created_at']->format('h:iA, dS F, Y')}}</td>
                    <td><a href="{{url('_admin/user/edit/'.$row['user_id'])}}" class="btn btn-sm btn-primary">Edit</a> <a href="{{url('_admin/user/delete/'.$row['user_id'])}}" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="4" class="text-center"><strong>No Records</strong></td>
                </tr>
                @endif                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    @include('_admin.footer')