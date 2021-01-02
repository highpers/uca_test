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

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminX">
        <div class="sidebar-brand-icon rotate-n-15">
        <img src="/admin/img/abir-logo-borromeo.png" style="width:32px">
        </div>
        <div class="sidebar-brand-text mx-3">Abir - Admin</div>
      </a>

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
              <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-sesiones" aria-expanded="false" aria-controls="opciones-sesiones">
                <i class="fas fa-fw fa-user-clock"></i>  <span>Sesiones</span>
              </a>
              <div class="collapse" id="opciones-sesiones"  aria-labelledby="headingSesiones" data-parent="#accordionSidebar">
                <div class="bg-celeste py-2 collapse-inner rounded">
                  <a class="collapse-item" href="/adminX/sesiones/create" title="Cargar nueva sesión">Nueva</a>
                  <a class="collapse-item" href="/adminX/sesiones" title="Listado de sesiones cargadas">Listado</a>
                  <a class="collapse-item" href="/adminX/agenda"  title="Muestra agenda para hoy y calendario para consultar otro día">Agenda diaria</a>
                  {{-- <a class="collapse-item" href="/adminX/agenda_semanal"  title="Muestra agenda de esta semana">Agenda semanal</a> --}}
                  

              </div>
              </div>
            </li>
            <li class="nav-item">
                       <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-pacientes" aria-expanded="false" aria-controls="opciones-pacientes">
                         <i class="fas fa-fw fa-id-card"></i><span class="menu-title">Pacientes</span>

                     </a>
       	 <div class="collapse" id="opciones-pacientes" aria-labelledby="headingPacientes" data-parent="#accordionSidebar">
                     <div class="bg-celeste py-2 collapse-inner rounded">

                        <a title="Cargar nuevo paciente" class="collapse-item" href="/adminX/pacientes/create">Nuevo</a>
                        <a title="Listado de pacientes activos" class="collapse-item" href="/adminX/pacientes">Listado (Activos)</a>
                        <a title="Listado de pacientes borrados" class="collapse-item" href="/adminX/1/pacientes">Listado (Inactivos)</a>
                        
                        <a title="Pacientes con deuda" class="collapse-item" href="/adminX/pacientes_deuda">Pacientes con deuda</a>
                     </div>
                     </div>

           </li>
            <li class="nav-item">
                      <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-autorizaciones" aria-expanded="false" aria-controls="opciones-autorizaciones">
                        <i class="fas fa-fw fa-credit-card"></i><span class="menu-title">Autorizaciones</span>

                    </a>
         <div class="collapse" id="opciones-autorizaciones" aria-labelledby="headingPacientes" data-parent="#accordionSidebar">
                    <div class="bg-celeste py-2 collapse-inner rounded">

                       <a title="Cargar nueva Autorización" class="collapse-item" href="/adminX/orden/create">Nueva</a>
                       <a title="Listado de autorizaciones - Detalle" class="collapse-item" href="/adminX/orden">Listado</a>
                    </div>        </div>

          </li>
          <li class="nav-item">
                    <a class="nav-link collapsed"  href="/adminX/eventos/create" >
                        <i class="fas fa-fw fa-calendar-plus" style="font-size:1.21em !important"></i><span class="menu-title">Agendar evento</span>
                    </a>
           </li>                    
           <li class="nav-item">
                      <a class="nav-link collapsed" data-toggle="collapse" href="#opciones-obras_sociales" aria-expanded="false" aria-controls="opciones-obras_sociales">
                        <i class="fas fa-fw fa-credit-card"></i><span class="menu-title">Obras Sociales</span>
                      </a>
         <div class="collapse" id="opciones-obras_sociales" aria-labelledby="headingPacientes" data-parent="#accordionSidebar">
                    <div class="bg-celeste py-2 collapse-inner rounded">

                       <a title="Cargar nueva Obra Social" class="collapse-item" href="/adminX/obras_sociales/create">Nueva</a>
                       <a title="Listado de Obras sociales - Detalle" class="collapse-item" href="/adminX/obras_sociales">Listado</a>
                    </div>
                    </div>

          </li>
                   <li class="nav-item">
                                  <a class="nav-link collapsed" data-toggle="collapse" href="#facturas" aria-expanded="false" aria-controls="facturas">
                                    <i class="fas fa-fw fa-receipt"></i><span class="menu-title">Facturas</span>
                                </a>
                             <div class="collapse" id="facturas" aria-labelledby="headingFacturas" data-parent="#accordionSidebar">
                                <div class="bg-celeste py-2 collapse-inner rounded">
                                    <a title="Cargar nueva factura" class="collapse-item" href="/adminX/facturas/create">Nueva</a>
                                    <a title="Listado de facturas" class="collapse-item" href="/adminX/facturas">Listado</a>

                                </div>
                                </div>
                    </li>
                    <li class="nav-item">
                                   <a class="nav-link collapsed" data-toggle="collapse" href="#pagos" aria-expanded="false" aria-controls="pagos"><i class="fas fa-fw fa-money-bill"></i>
                                   <span class="menu-title">Pagos</span>
                                 </a>
                              <div class="collapse" id="pagos" aria-labelledby="headingPagos" data-parent="#accordionSidebar">
                                 <div class="bg-celeste py-2 collapse-inner rounded">
                                     <a title="Cargar nuevo pago (Paciente)" class="collapse-item" href="/adminX/pago/create/paciente">Nuevo (Paciente)</a>
                                     <a title="Cargar nuevo pago (Obra Social)" class="collapse-item" href="/adminX/pago/create/obra_social">Nuevo (Obra social)</a>
                                     <a title="Listado de pagos" class="collapse-item" href="/adminX/pagos">Listado</a>

                                 </div>
                                 </div>
                     </li>

                     <li class="nav-item">
                                    <a class="nav-link collapsed" data-toggle="collapse" href="#cuentas" aria-expanded="false" aria-controls="cuentas"><i class="fas fa-fw fa-calculator"></i>
                                    <span class="menu-title">Resúmenes de cuenta</span>
                                  </a>
                               <div class="collapse" id="cuentas" aria-labelledby="headingCuentas" data-parent="#accordionSidebar">
                                  <div class="bg-celeste py-2 collapse-inner rounded">
                                      <a title="Resumen de cuentas de Pacientes" class="collapse-item" href="/adminX/cuentas_pacientes">Pacientes</a>
                                      <a title="Resumen de cuentas de Obras sociales" class="collapse-item" href="/adminX/pagos">Obra social</a>
                                      <a title="Resumen de cuentas General" class="collapse-item" href="/adminX/pagos">General</a>

                                  </div>
                                  </div>
                      </li>
                      <hr class="sidebar-divider my-0">

                      <!-- Nav Item - Dashboard -->
                      <li class="nav-item">
                        <a class="nav-link" href="/adminX/config">
                          <i class="fas fa-fw fa-cog"></i>
                          <span>Configuración</span></a>
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
            <span>Copyright &copy; ABIR 2020</span>
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
