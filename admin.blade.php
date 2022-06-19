



<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dashboard | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.ico')}}">
<!-- Plugin css -->
<link rel="stylesheet" href="assets2/libs/@fullcalendar/core/main.min.css" type="text/css">
        <link rel="stylesheet" href="assets2/libs/@fullcalendar/daygrid/main.min.css" type="text/css">
        <link rel="stylesheet" href="assets2/libs/@fullcalendar/bootstrap/main.min.css" type="text/css">
        <link rel="stylesheet" href="assets2/libs/@fullcalendar/timegrid/main.min.css" type="text/css">
    
        <!-- jquery.vectormap css -->
        <link href="{{ asset('assets2/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
       
        <!-- DataTables -->
        <link href="{{ asset('uploads/ijaboCropTool.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets2/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets2/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets2/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets2/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets2/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css"/>
         <!-- Plugins css -->
         <link href="assets2/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
         @yield('css')
    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                      
                        <div class="navbar-brand-box">
                            <a href="/home" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets2/images/logo-sm.png')}}" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets2/images/logo-dark.png')}}" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="/home" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets2/images/logo-sm.png')}}" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets2/images/logo-light.png')}}" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                     
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="ri-search-line"></span>
                            </div>
                        </form>

                       
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                       

                      
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-notification-3-line"></i>
                                <span class="noti-dot"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                            
                                        </div>
                                        
                                        <div class="col-auto">
                                            <a href="#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;display:flex;">
                               
                                
                               
                                <div >
                                    @php
                                        $total=  number_format(\App\Models\invoices::where('Value_Status', 1)->sum('Total'), 2);
                                        $i =intval($total);

                                        if( $i<=5){
                                             $type='good';
                                             $color='green';
                                         } 
                                         else if($i<=10){
                                           $type='Average';
                                           $color='blue';
                                         }   
                                         else if($i<=18){
                                           $type='notice';
                                           $color='orange ';
                                         }   
                                         else{
                                           $type='problem';
                                           $color='red';
                                         }      
                                        
                                    @endphp
                                    <p>your total sublie {{ $total }} <span style="color: {{$color}};">{{$type}}</span></p>
                                    
                                <!-- {{ number_format(\App\Models\invoices::sum('Total'), 2) }} -->   
                            </div>
                       
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user admin_picture" src="{{ Auth::user()->vector }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                             
                                <a class="dropdown-item" href="{{ url('/' . $page='parameter') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                               
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-danger"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                                    
                                </form>
                               
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="ri-settings-2-line"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header> 
          
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img  src="{{ Auth::user()->vector }}" alt="User profile picture" class="avatar-md rounded-circle admin_picture">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                            <span class="text-muted"> {{Auth::user()->email}}</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ url('/' . $page='home') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/' . $page='clients') }}" class=" waves-effect">
                                <i class="ri-account-circle-line"></i>
                                    <span>Clients</span>
                                </a>
                            </li>
                
                           
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Invoices</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                <li><a class="slide-item" href="{{ url('/' . $page='fatoura') }}">list Invoices</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_Paid') }}">Invoices paid</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_UnPaid') }}">Invoices unpaid </a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_Partial') }}">Invoices  partrier</a></li>
							<li><a class="slide-item" href="{{ url('/' . ($page = 'Archive')) }}">archive Invoices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>reports</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                         
							<li><a class="slide-item" href="{{ url('/' . $page='invoices_report') }}">invoices reports </a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='customers_report') }}">client reports</a></li>
							
                                </ul>
                            </li>
                          
                            <li>
                                <a href="{{ url('/' . $page='timesheet') }}" class=" waves-effect">
                                    <i class="ri-calendar-2-line"></i>
                                    <span>timesheet</span>
                                </a>
                            </li>
                       
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            
            
            <div class="main-content">
                @yield('contente')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Upcube.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                </div>
       
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{ asset('assets2/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{ asset('assets2/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets2/css/bootstrap-dark.min.css" data-appStyle="assets2/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{ asset('assets2/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets2/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets2/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/node-waves/waves.min.js')}}"></script>

        
        <!-- apexcharts -->
        <script src="{{ asset('assets2/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('assets2/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('assets2/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        
        <!-- Responsive examples -->
        <script src="{{ asset('assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{ asset('assets2/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets2/js/app.js')}}"></script>
              <!-- twitter-bootstrap-wizard js -->
              <script src="assets2/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<script src="assets2/libs/twitter-bootstrap-wizard/prettify.js"></script>

<!-- form wizard init -->
<script src="assets2/js/pages/form-wizard.init.js"></script>
      
        <!-- Buttons examples -->
        <script src="assets2/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets2/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets2/libs/jszip/jszip.min.js"></script>
        <script src="assets2/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets2/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets2/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets2/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets2/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <script src="assets2/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets2/libs/datatables.net-select/js/dataTables.select.min.js"></script>
   
        <script src="assets2/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Range slider init js-->
<script src="assets2/js/pages/range-sliders.init.js"></script>
        <!-- Datatable init js -->
        <script src="assets2/js/pages/datatables.init.js"></script>

        <script src="uploads/ijaboCropTool.min.js"></script>

        <script src="assets2/libs/moment/min/moment.min.js"></script>
        <script src="assets2/libs/jquery-ui-dist/jquery-ui.min.js"></script>
        <script src="assets2/libs/@fullcalendar/core/main.min.js"></script>
        <script src="assets2/libs/@fullcalendar/bootstrap/main.min.js"></script>
        <script src="assets2/libs/@fullcalendar/daygrid/main.min.js"></script>
        <script src="assets2/libs/@fullcalendar/timegrid/main.min.js"></script>
        <script src="assets2/libs/@fullcalendar/interaction/main.min.js"></script>
        <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
@yield('js')
        <!-- Calendar init -->
        <script src="assets2/js/pages/calendar.init.js"></script>
<!-- Plugins js -->
<script src="assets2/libs/dropzone/min/dropzone.min.js"></script>
<script>
  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  $(function(){
    /* UPDATE ADMIN PERSONAL INFO */
    $('#add_client').on('submit', function(e){
        e.preventDefault();
        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#add_client').find( $('input[name="name"]') ).val() );
                  });
                  window.location.href = '/clients';
                }
           }
        });
    });
});
  $(function(){
    /* UPDATE ADMIN PERSONAL INFO */
    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });
});
    $(document).on('click','#change_picture_btn', function(){
      $('#admin_image').click();
    });
    $('#admin_image').ijaboCropTool({
          preview : '.admin_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("adminPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            
          },
          onError:function(message, element, status){
            alert(message);
          }
       });
    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();
         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });
    
  
</script>

    </body>

</html>