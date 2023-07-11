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
           @if(Session::has('error_msg'))
                      <div class="alert alert-danger"> {{ Session::get('error_msg')}}</div>
                    @endif   
                    
                    @if (Session::has('success_msg'))
                       <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{session('success_msg')}}
                       </div>
                    @endif  
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="ct_inner_form">
                                            <div class="ct_title">
                                                <h4 class="text-center mb-5">Profile</h4>
                                            </div>
                                            <div class="ct_profile_img">
                                                <img src="{{ asset('assets/images/testimonial/dummy.jpg') }}" alt="">
                                                <div class="ct_prifle_info">
                                                    <h4 class="text-dark">John Doe</h4>
                                                </div>
                                            </div>
                                            <form action="{{route('agent.update',41);}}" method="post">
                                              @csrf
                                              @method('PUT')
                                                <div class="ct_label_float mb-3">
                                                    <input type="text" name="name" value="{{$users->name}}" placeholder="Please Enter Name "/>
                                                    <label>Name</label>
                                                  </div>
                                                
                                                  <div class="ct_label_float mb-3">
                                                    <input type="email" name="email" value="{{$users->email}}" placeholder="Please Enter Email "/>
                                                    <label>Email</label>
                                                  </div>
                                                  <div class="ct_label_float mb-3">
                                                    <input type="Password" name="oldpassword" placeholder="Please Enter Old Password "/>
                                                    <label>Old Password</label>
                                                  </div>
                                                  <div class="ct_label_float mb-3">
                                                    <input type="Password" name="newpassword" placeholder="Please Enter New Password "/>
                                                    <label>New Password</label>
                                                  </div>
                                                   <div class="ct_label_float mb-3">
                                                    <input type="Password" name="confirmpassword" placeholder="Please Enter Confirm Password "/>
                                                    <label>Confirm Password</label>
                                                  </div>
                                                 
                    
                                                
                                                   <div class="text-center">
                                                    <button type="submit" class="ct_login_btn" >
                                                        Update
                                                    </button>
                                                   </div>
                                                
                                            </form>
                                          </div>
                                    </div>

                                </div>

                            </div>
    </section>

</body>

</html>