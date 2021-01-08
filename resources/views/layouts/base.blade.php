<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Test UCA - {{ $title }}</title>

  <!-- Custom fonts for this template-->
  <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="/admin/css/pers.css" rel="stylesheet">
  @if(!empty($css_adicionales))
    @foreach($css_adicionales as $file_css)
  <link href="/admin/css/{{ $file_css }}.css" rel="stylesheet">
    @endforeach
  @endif
</head>
<script src="/admin/vendor/jquery/jquery.min.js"></script>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<div class="sidebar-brand-icon" style="margin-top:19px;text-align:center">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminX">  <img src="/admin/img/logo_uca.png" style="width:142px" vspace="6">
        
      <!-- Sidebar - Brand -->
      
        
        Test
        
      </a>
    </div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/adminX">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
              <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-cursos" aria-expanded="false" aria-controls="opciones-cursos">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>  <span>Cursos</span>
              </a>
              <div class="collapse" id="opciones-cursos"  aria-labelledby="headingCursos" data-parent="#accordionSidebar">
                <div class="bg-celeste py-2 collapse-inner rounded">
                  <a class="collapse-item" href="/adminX/cursos/create" title="Cargar nuevo curso">Nuevo</a>
                  <a class="collapse-item" href="/adminX/cursos" title="Listado de cursos cargados">Listado</a>
              </div>
              </div>
            </li>
            <li class="nav-item">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-alumnos" aria-expanded="false" aria-controls="opciones-alumnos">
                         <i class="fas fa-fw fa-id-card"></i><span class="menu-title">Alumnos</span>

                     </a>
       	 <div class="collapse" id="opciones-alumnos" aria-labelledby="headingAlumnos" data-parent="#accordionSidebar">
                     <div class="bg-celeste py-2 collapse-inner rounded">

                        <a title="Cargar nuevo alumno" class="collapse-item" href="/adminX/alumnos/create">Nuevo</a>
                        <a title="Listado de alumnos" class="collapse-item" href="/adminX/alumnos">Listado</a>
                        
                     </div>
                     </div>

           </li>
            
          <li class="nav-item">
                    <a class="nav-link collapsed"  href="/adminX/inscripciones/create" >
                        <i class="fas fa-fw fa-calendar-plus" style="font-size:1.21em !important"></i><span class="menu-title">Nueva inscripción</span>
                    </a>
           </li>                    
           <li class="nav-item">
                      <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-api" aria-expanded="false" aria-controls="opciones-api">
                        <i class="fas fa-fw fa-database"></i><span class="menu-title">API Rest</span>
                      </a>
         <div class="collapse" id="opciones-api" aria-labelledby="headingAlumnos" data-parent="#accordionSidebar">
                    <div class="bg-celeste py-2 collapse-inner rounded">

                       <a title="API Rest Alumnos totales" class="collapse-item" href="/api/alumnos_inscriptos/0" target="_blank">Alumnos (totales)</a>
                       <a title="API Rest Alumnos inscriptos" class="collapse-item" href="/api/alumnos_inscriptos/1" target="_blank">Alumnos (solo inscriptos)</a>
                       <a title="API Rest Cursos - Detalle" class="collapse-item" href="/api/cursos" target="_blank">Cursos</a>
                    </div>
                    </div>

          </li>
          <li class="nav-item">
          
                    <a class="nav-link collapsed"  href="javascript:logout()" data-toggle="modal" data-target="#logoutModal" >
                        <i class="fas fa-fw fa-sign-out-alt" style="font-size:1.21em !important"></i><span class="menu-title">Salir</span>
                    </a>
           </li>           
                   {{-- FIN MENÚ --}}
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
      
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-top:20px; !important">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
          </div>
@if(Session::has('message'))
            <div id="mensaje" class="alert alert-{{ session('alert')}}"><i class="fa fa-{{session('alert')}}"></i> &nbsp; {!! session('message') !!}</div>
          @endif 
          <!-- Content Row -->

          <!-- Content Row -->
   <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
  </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div style="font-size: 0.93em;margin-top:28px;text-align:right !important;color:#bbf;font-style:oblique !important">
           
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Confirmás cierre de la sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="javascript:logout()">Confirmar</a>
        </div>
      </div>
    </div>
  </div>


<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Confirmás cierre de la sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="javascript:logout()">Confirmar</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="/admin/js/funcs-pers.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="/admin/js/funcs-pers.js"></script>
  
  <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/admin/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="/admin/js/demo/datatables-demo.js"></script>
 @if(!empty($js_adicionales))
    @foreach($js_adicionales as $file_js)
  <script src="/admin/js/{{ $file_js }}.js"></script>
    @endforeach
  @endif
</body>

</html>
