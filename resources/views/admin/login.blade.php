<!DOCTYPE html>
<html lang="en">
   
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Hello-Visa! </title>
     
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('public/adm-assets/vendors/css/vendor.bundle.base.css')}}">    
    <link rel="stylesheet" href="{{url('public/adm-assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{url('public/adm-assets/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class=" ">
                   <img src="{{url('public/logo/Colored.png')}}" alt="logo" height="130" width="350" />   
                </div>
                <br>                        
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="{{url('/login_admin')}}" method="post">
                  @csrf

                  @if (Session::has('error_msg'))
                    <div class="alert alert-danger">{{ Session::get('error_msg')}}</div>
                  @endif    
                    
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required >
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required >
                  </div>

                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" >SIGN IN</button>
                  </div>
                  
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="{{url('forgot-password')}}" class="auth-link text-black"> Forgot password? </a>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('public/adm-assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{url('public/adm-assets/js/off-canvas.js')}}"></script>
    <script src="{{url('public/adm-assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('public/adm-assets/js/misc.js')}}"></script>
    <!-- endinject -->
  </body>
 
</html>