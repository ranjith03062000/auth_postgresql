<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Digital Cloudies</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo URL::to('/'); ?>/assets/images/favicon.ico" />
      <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/assets/vendor/remixicon/fonts/remixicon.css"> 
	  <link href="<?php echo URL::to('/'); ?>/assets/css/font-awesome.css" rel="stylesheet">
	  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
		  
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
     
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="" class="header-logo">
                  <h6 class="logo-title light-logo ml-3"> Cloudies</h6>
              </a>
              <div class="iq-menu-bt-sidebar ml-0">
                  <i class="las la-bars wrapper-menu" style="margin-left:50px;"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
               @include('layout.sidebar')
              <!--<div id="sidebar-bottom" class="position-relative sidebar-bottom">
                  <div class="card border-none">
                      <div class="card-body p-0">
                          <div class="sidebarbottom-content">
                              <div class="image"><img src="assets/images/layouts/side-bkg.png" class="img-fluid" alt="side-bkg"></div>
                              <h6 class="mt-4 px-4 body-title">Get More Feature by Upgrading</h6>
                              <button type="button" class="btn sidebar-bottom-btn mt-4">Go Premium</button>
                          </div>
                      </div>
                  </div>
              </div>--->
              <div class="p-3"></div>
          </div>
          </div>  
                 
		  <div class="iq-top-navbar" style="margin-top: 5px;">
          	@include('layout.topsidebar')
      </div>
      <div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="popup text-left">
                          <h4 class="mb-3">New Order</h4>
                          <div class="content create-workform bg-body">
                              <div class="pb-3">
                                  <label class="mb-2">Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Name or Email">
                              </div>
                              <div class="col-lg-12 mt-4">
                                  <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                      <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                      <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>      <div class="content-page">
     <div class="container-fluid add-form-list">
		 @yield('content')
     </div>
      </div>
    </div>
    <!-- Wrapper End-->
    @include('layout.footer')
    <!-- Backend Bundle JavaScript -->
    <script src="<?php echo URL::to('/'); ?>/assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="<?php echo URL::to('/'); ?>/assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="<?php echo URL::to('/'); ?>/assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="<?php echo URL::to('/'); ?>/assets/js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="<?php echo URL::to('/'); ?>/assets/js/app.js"></script>
  </body>
  <style>
      div.dataTables_scrollHead table.table-bordered, table.table-bordered.dataTable tbody td, table.table-bordered.dataTable tbody th {
    border-bottom-width: 0;
    overflow: auto !important;
} 
.dropdown-menu{margin-left:70px !important;}
 ul {border:none !important;}
  </style>
</html>
<?php 

 function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

// For checking activated route
function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

// For add 'show' class for activated route collapse
function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}
?>