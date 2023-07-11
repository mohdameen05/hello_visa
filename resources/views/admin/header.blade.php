<!DOCTYPE html>
 <html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{env('APP_NAME')}} </title>
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/css/vendor.bundle.base.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('public/adm-assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{url('public/adm-assets/images/favicon.png')}}" />
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    
    <style>
        div.dataTables_wrapper div.dataTables_length select {
            width: 58px;
            display: inline-block;
        }
        .ct_input_field {
          position: relative;
           max-width: 300px;
           margin-bottom: 30px;
        }
        .ct_input_field input:first-child{
          border-radius: 100px;
        }

       
         .ct_input_field input + input{
          position: absolute;
          top: 50%;
          right: 0px;
          transform: translate(0%,-50%);
         }
    </style>
  </head>
  
    <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <h3> Hello Visa ! </h3>
          <!-- <a class="navbar-brand brand-logo" href="{{url('/')}}"> <img src="{{url('public/logo/logo.png')}}" alt="logo" /> </a> -->
          
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
       
          <ul class="navbar-nav navbar-nav-right">         
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                   
                  @php 
                 
                   if(Session::get('admin_info')['profile_image']!="")
                   { 
                      $url = url('public/uploads/profile-image/').'/'.Session::get('admin_info')['profile_image'] ;
                   } else {
                      $url = url('public/adm-assets/images/faces/face3.jpg') ;
                   }
                  @endphp 
                  <img src="{{$url}}" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><b>Welcome! &nbsp; {{ (Session::get('admin_info'))?ucfirst(Session::get('admin_info')['name']):'User'}} </b> </p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">                
                <div class="p-2">
                    <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="{{url('adm-profile')}}">
                    <span> Update Profile </span>
                    <i class="mdi mdi-account-outline ml-1"></i>
                    </a>
                  
                    <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="{{url('adm_logout')}}">
                    <span>Log Out</span>
                    <i class="mdi mdi-logout ml-1"></i>
                  </a>
                </div>
              </div>
            </li>
            
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"> </span>
          </button>
        </div>
      </nav>