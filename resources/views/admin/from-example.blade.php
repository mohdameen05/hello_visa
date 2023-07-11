@include('admin.header')
  @include('admin.sidebar')

  <style type="text/css">
    input[type=file]::file-selector-button {
      margin-right: 20px;
      border: none;
      background: #084cdf;
      padding: 10px 20px;
      border-radius: 10px;
      color: #fff;
      cursor: pointer;
      transition: background .2s ease-in-out;

    }

    input[type=file]{
      border-color: #b4b2c9;
      border-radius: 13px;
      border-style: solid;
      border-width: 1px;
    }

    input[type=file]::file-selector-button:hover {
      background: #0d45a5;
    }

  </style>
 
    <div class="content-wrapper">
       
        <div class="page-header">
          <h3 class="page-title"> Admin Profile </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"> Admin </a></li>
              <li class="breadcrumb-item active" aria-current="page"> Admin Profile </li>
            </ol>
          </nav>
        </div>
        
        <div class="row">
    
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
             
                @if(Session::has('error_msg'))
                  <div class="alert alert-danger">{{ Session::get('error_msg')}}</div>
                @endif   
                
                @if (Session::has('success_msg'))
                  <div class="alert alert-success">{{ Session::get('success_msg')}}</div>
                @endif     
                 
                <form class="forms-sample" method="post" action="{{url('profile-update')}}" enctype="multipart/form-data" >
                  @csrf    
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{$admin->name}}" name="name" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="{{$admin->email}}" name="email" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" value="{{$admin->show_password}}" name="password" onkeyup="checkPasswordStrength();" >
                    <div id="password-strength-status" > </div>
                  </div>
                   
                  <div class="form-group">
                    <label>File upload</label>
                    
                    <div class="input-group row col-xs-4 col-sm-4" >
                      <input name="file" type="file" placeholder="Upload Image" onchange="previewImage(event)" aria-describedby="image-error" >
                     <!--  <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                      </span> -->
                    </div>
                    
                    <div class="input-group row col-xs-4 col-sm-4" >
                      <img src="{{url('/public/uploads/profile-image/').'/'.$admin->profile_image}}" width="200px" height="200px" style="object-fit:contain" class="img-circle" id="preview-image">
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary mr-2 submitBtn"> Submit </button> 
                  
                  <a href = "{{url('admin_dashboard')}}" > <button  type="button" class="btn btn-light" > Cancel </button> </a>
                   
                </form>
                
              </div>
            </div>
          </div>
    
        </div>
    
    </div>
            
@include('admin.footer')