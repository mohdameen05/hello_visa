@include('admin.header')
  @include('admin.sidebar')
    
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Agent </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">  
                     <a type="button" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#myModal" > Add Agent </a> 
                  </li>
                </ol>
              </nav>
            </div>
            <div class="card">
              <div class="card-body">
               
                 <div class="row">
                  <div class="col-12">
                      
                    @if(Session::has('error_msg'))
                      <div class="alert alert-danger"> {{ Session::get('error_msg')}}</div>
                    @endif   
                    
                    @if (Session::has('success_msg'))
                       <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{session('success_msg')}}
                       </div>
                    @endif  
                    
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>S.No. #</th>
                          <th>Name </th>
                          <th>Email </th>
                          <th>Phone Number </th>
                          <th>Actions </th>
                        </tr>
                      </thead>
                      <tbody>
                    @php $i=1 ; @endphp    
                    
                     @if(!empty($alldata) && count($alldata)>0 )
                     
                      @foreach($alldata as $content)
 
                        <tr>
                          <td> {{$i}} </td>
                          <td> {{$content->name}} </td>
                          <td> {{$content->email}} </td>
                          <td> {{$content->phone_number}} </td>
                          <td>
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal{{$content->id}}" > Edit </button>
                             <!--<a href="{{ route('agent.destroy', ['id' => $content->id]) }}"  onclick='return confirm("Confirm Delete?")'> <button class="btn btn-outline-danger" > Delete </button></a>-->
                           
                             <button class="btn btn-outline-danger callDelete" current-id="{{$content->id}}" tableId="5" > Delete </button> 

                          </td>
                        </tr>

                        <!-- Edit Modal -->

          <div class="modal" id="myModal{{$content->id}}" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title"> Update Page Agent </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

                <form action="{{route('agent-management.update',$content->id);}}" method="post" class="form-sample" enctype="multipart/form-data" >
                 
                  @csrf
                  @method('PUT')
                  <!-- Modal body -->
                         <div class="modal-body">
                     
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Name  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="Name" name="name" required value="{{$content->name}}" >
                     <span class="text-danger">@error('name') {{$message}} @enderror</span>
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Email  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="email" class="updt_email form-control" placeholder="E-mail" name="email" id="email" required value="{{$content->email}}" >
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Phone Number  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="number" class="form-control" placeholder="Phone Number" name="phone_number" required value="{{$content->phone_number}}" >
                    <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
                  </div>
                </div>
                  <div class="form-group row gen_username1">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Username  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="username form-control" placeholder="Username" name="username" id="username"  >
                    <span class="text-danger">@error('username') {{$message}} @enderror</span>
                  </div>
                </div>
                 <div class="form-group row gen_password11">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Password  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="password form-control" placeholder="Password" name="password" id="password"   >
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                  </div>
                </div>

                 <div class="form-group row new_gen_password1">
                  <div class="col-lg-3">
                  </div>
                  <div class="col-lg-8">

                   <button type="button" class="btn btn-primary new_gen_password" onclick="gen_password()"> Generate New Username & Passowrd</button>
                  </div>
                </div>
            
              </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-icon-text submit1"> <i class="mdi mdi-file-check btn-icon-prepend"></i> Send Mail & Submit </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                      </form>  

                  </div>
                </div>
              </div>

                <!-- Edit Modal End -->

                    @php $i++; @endphp  
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Modals -->

    <!-- The Modal -->
    <div class="modal" id="myModal" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"> Add Agent </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

            <form action="{{route('agent-management.store');}}" method="post" class="form-sample" enctype="multipart/form-data" >
              
              @csrf
              <!-- Modal body -->
              <div class="modal-body">
                     
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Name  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="Name" name="name" required >
                     <span class="text-danger">@error('name') {{$message}} @enderror</span>
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Email  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="email" class="email form-control" placeholder="E-mail" name="email" id="email" required >
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Phone Number  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="number" class="form-control" placeholder="Phone Number" name="phone_number" required >
                    <span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
                  </div>
                </div>
                  <div class="form-group row gen_username">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Username  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="username form-control" placeholder="Username" name="username" id="username" required >
                    <span class="text-danger">@error('username') {{$message}} @enderror</span>
                  </div>
                </div>
                 <div class="form-group row gen_password">
                  <div class="col-lg-3">
                    <label class="col-form-label"> Password  </label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="password form-control" placeholder="Password" name="password" id="password" required >
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                  </div>
                </div>

                 <div class="form-group row gen_password1">
                  <div class="col-lg-3">
                  </div>
                  <div class="col-lg-8">

                   <button type="button" class="btn btn-primary gen_password1" onclick="gen_password()"> Generate Username & Passowrd</button>
                  </div>
                </div>
            
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-icon-text submit">Send Mail & Submit </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </form>  

        </div>
      </div>
    </div>
<script>
$(document).ready(function(){
  // Add functionality start//
  $('.gen_username').hide();
  $('.gen_password').hide();
  $('.gen_username1').hide();
  $('.gen_password11').hide();
  $('.submit').hide();
  
$(".gen_password1").click(function() {

   var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var passwordLength = 12;
    var password = "";
 for (var i = 0; i <= passwordLength; i++) {
   var randomNumber = Math.floor(Math.random() * chars.length);
   password += chars.substring(randomNumber, randomNumber +1);
  }

  email = $('.email').val();
var gen_username = email.split('@')[0].substring(0,5);
var num = Math.floor(100 + Math.random() * 9000);
  if ($('.email').val() == '') {
   alert("Please Fill All Field Before Generate Username & Password...!" ); 
   return false;
    }

  

  $('.username').val(gen_username+num);
  $('.password').val(password);
  $('.gen_username').show();
  $('.gen_password').show();
  $('.submit').show();
  $('.gen_password1').hide();

  });

// Add functionality end //
// Edit functionality start//
  
  $(".new_gen_password").click(function() {

   var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var passwordLength = 12;
    var password = "";
 for (var i = 0; i <= passwordLength; i++) {
   var randomNumber = Math.floor(Math.random() * chars.length);
   password += chars.substring(randomNumber, randomNumber +1);
  }

  email = $('.updt_email').val();
var gen_username = email.split('@')[0].substring(0,5);
var num = Math.floor(100 + Math.random() * 9000);
if ($('.updt_email').val() == '') {
   alert("Please Fill All Field Before Generate Username & Password...!" ); 
   return false;
    }
  

  $('.username').val(gen_username+num);
  $('.password').val(password);
  $('.gen_username1').show();
  $('.gen_password11').show();
  $('.new_gen_password1').hide();
  


  });

// Edit functionality end//

});
</script>
@include('admin.footer')