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
          <a class="btn btn-sm btn-success pull-right" href="{{url('_admin/files/add')}}"><i class="fa fa-plus"></i> Add File</a>
        </div>
        <div class="card-body">
            
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Uploaded By</th>
                  <th>Uploaded On</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Uploaded By</th>
                  <th>Uploaded On</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @if($rows->count() > 0)
                  @foreach($rows as $row)
                  <tr>
                    <td>{{$row['file_name']}}</td>
                    <td>{{$row['file_type']}}</td>
                    <td>{{$row->Admin['admin_firstname']}} {{$row->Admin['admin_lastname']}}</td>
                    <td>{{$row['created_at']->format('h:iA, dS F, Y')}}</td>
                    <td>
                      <a href="{{url('_admin/files/stats/'.$row['file_id'])}}" class="btn btn-sm btn-primary" title="List of Users linked to the file">Statistics</a> 
                      <a href="{{url('_admin/files/edit/'.$row['file_id'])}}" class="btn btn-sm btn-primary">Edit</a> 
                      <a href="{{url('_admin/files/delete/'.$row['file_id'])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
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