@include('header');

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  @include('menu')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        
        @if($rows->count() > 0)
          @foreach($rows as $row)
            @foreach($row->ViewedFiles as $viewedFiles)
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white @if($viewedFiles['status'] == 0) {{'bg-danger'}}@else {{'bg-success'}} @endif o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fa fa-fw fa-file-o"></i>
                    </div>
                    <div class="mr-5">{{$viewedFiles->FileViewed['file_name']}}</div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('/viewfile/'.$viewedFiles->FileViewed['file_id'])}}">
                      <span class="float-left">Download</span>
                      <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          @endforeach
        @endif       
      </div>
    </div>
    <!-- /.container-fluid-->
    @include('footer')