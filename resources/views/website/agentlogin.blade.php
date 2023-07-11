<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hello Visa</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }} " />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }} " />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }} " />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }} " />
    <meta name="description" content=" " />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }} " />

    <link rel="stylesheet" href="{{ asset('assets/vendors/treck-icons/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }} " />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/treck.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/css/treck-responsive.css') }} " />
</head>
<body>

    <section class="ct_login_main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="ct_form_bg">
                        <div class="ct_login_logo">
                            <img src="{{ asset('assets/images/resources/logo-1.png') }} " width="250px">
                           
                        </div>
                      <div class="ct_inner_form">
                        <div class="ct_title">
                            <h4>Welcome To Hello Visa!</h4>
                        </div>
                        <form action="{{route('agent.store');}}" method="post" class="pt-3" enctype="multipart/form-data" >
                              @csrf

                              @if (Session::has('error_msg'))
                                <div class="alert alert-danger">{{ Session::get('error_msg')}}</div>
                              @endif 
                            <div class="ct_label_float mb-3">
                                <input type="text" placeholder=" Enter Username " name="username" required/>
                                <label>Username</label>
                              </div>
                              <div class="ct_label_float mb-3">
                                <input type="password" placeholder=" Enter Password" name="password" required/>
                                <label>Password</label>
                              </div>
                              <div class="ct_forget_pass">
                                <a href="#">Forgot Password?</a>
                              </div>

                            
                                <button type="submit" class="ct_login_btn" >
                                    Login
                                </button>
                            
                        </form>
                      </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</body>

</html>