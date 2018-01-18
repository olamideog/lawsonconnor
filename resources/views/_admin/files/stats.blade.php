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
          <i class="fa fa-file"></i> {{ucfirst($dir)}}
          </a>
        </div>
        <div class="card-body">
            <h5>File Name: {{$rows['file_name']}}</h5>
            <h5>Administrator : {{$rows->Admin['admin_firstname']}} {{$rows->Admin['admin_lastname']}}</h5>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Viewed On</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Viewed On</th>
                </tr>
              </tfoot>
              <tbody>

                @if(count($rows->ViewedFiles) > 0)
                  @foreach($rows->ViewedFiles as $view)
                  <tr>
                    <td>{{$view->UserViewed['user_firstname']}} {{$view->UserViewed['user_lastname']}}</td>
                    <td>@if($view['status'] == 0)
                      <span class="badge badge-danger">Not Viewed</span>
                      @else
                      <span class="badge badge-success">Viewed</span>
                      @endif                      
                    </td>
                    <td>@if($view['status'] == 1)
                      {{date('h:iA, dS F, Y', strtotime($view['viewed_on']))}}
                    @endif</td>
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
          <a href="{{url('_admin/files')}}" class="btn btn-sm btn-danger pull-left">Back</a>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    @include('_admin.footer')