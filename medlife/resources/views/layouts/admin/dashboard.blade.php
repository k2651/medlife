<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('sb_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('sb_admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/medlife-dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Medlife</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-2">

 

      <!-- Heading -->
      <div class="sidebar-heading">
        Content
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-limbi" aria-expanded="true"
            aria-controls="#collapse-limbi">
            <span>Limbi</span>
        </a>
        <div id="collapse-limbi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach ($langs as $lang)
                <div class="collapse-item d-flex">
                    <span class="lang">{{$lang->language}}</span>
                    <button data-url="{{route('lang.destroy', ['id'=>$lang->id])}}" style="color:black;"
                        class="ml-auto btn btn-sm p-0 delete-lang-btn"><i class="fas fa-trash"></i></button>
                </div>
                @endforeach
                <div>
                    <a href="#" class="collapse-item text-center lang_btn" data-toggle="0"><i class="fas fa-plus"></i></a>

                    <div class="input-group p-2 lang_input d-none" >
                        <input type="text" class="form-control" id="add-lang" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button data-url="{{route('lang.store')}}" class="btn btn-outline-primary mb-3" type="button"
                                id="add-lang-btn">Add</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      {{-- <li class="nav-item">
       <a class="nav-link" id="page-show" href="{{route('page.index')}}">
              <span>Pagini</span>
            </a> --}}
            {{-- <div id="pageCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <div>
                    @foreach ($pages as $page)
                        <div class="collapse-item d-flex ">
                            <span class="">{{$page->route_name}}</span>
                            <button data-url="{{route('page.destroy', ['id'=>$page->id])}}" style="color:black;"
                                class="ml-auto btn btn-sm p-0 delete-lang-btn"><i class="fas fa-trash"></i></button>
                        </div>
                    @endforeach
                    
                    <a class="collapse-item text-center" data-target="#pageCreateModal" data-toggle="modal"><i class="fas fa-plus" ></i></a>
                
                  </div>
                  
                </div>
              </div> --}}
  
                    
                {{-- <div class="modal fade" id="pageCreateModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">Crearea paginii</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form data-url="{{route("page.store")}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="modal-body">

                                <input type="text" class="form-control mt-4" placeholder="Denumirea paginii" id="title">
                                <textarea class="form-control mt-4" placeholder="Descriptia" rows="3" id="description"></textarea>
                                <input type="file" class="mt-4" name='image'>

                                <select class="custom-select mt-4 add-page-lang">
                                    @foreach ($langs as $lang)
                                        <option value="{{$lang->id}}">{{$lang->language}}</option>
                                    @endforeach

                                  </select>

                            </div>
                            <div class="modal-footer container">
                            <button  class="btn btn-outline-primary  type="submit">Save</button>
                            </div>
                          </form>
                        </div>
                    </div> --}}

      {{-- </li> --}}
      
            <!-- Nav Item - Utilities Collapse Menu -->
   


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



          <ul class="navbar-nav ml-auto">

          <form action="{{route('logout')}}" method="POST" class="d-flex p-3">
            @csrf
                <button type='submit' class="btn btn-primary">Logout</button>
          </form>

          </ul>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')

        </div>
    <!-- End of Content Wrapper -->

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('sb_admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('sb_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('sb_admin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('sb_admin/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('sb_admin/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('sb_admin/js/demo/chart-pie-demo.js')}}"></script>
  <script src='https://unpkg.com/axios/dist/axios.min.js'></script>
  <script src="{{asset('sb_admin/js/scripts.js')}}"></script>
</body>

</html>
