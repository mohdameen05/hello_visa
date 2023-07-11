@include('admin.header')
  @include('admin.sidebar')
    
    <div class="content-wrapper">
      
      <div class="page-header">
        <h3 class="page-title"> Countries </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"> 
              <a type="button" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#myModal" > Add Country </a> 
            </li>
          </ol>
        </nav>
      </div>

      <div class="card">
        <div class="card-body">
          
            <div class="row">
            <div class="col-12">
                
              @if(Session::has('error_msg'))
                <div class="alert alert-danger">{{ Session::get('error_msg')}}</div>
              @endif   
              
              @if (Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg')}}</div>
              @endif  
              
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th>S.No. #</th>
                    <th> Name </th>
                    <th> Country Flag </th>
                    <th>Actions </th>
                  </tr>
                </thead>
                <tbody>
              @php $i=1 ; @endphp    
              
                @if(!empty($countries) && count($countries)>0 )
                
                @foreach($countries as $content)

                  <tr>
                    <td> {{$i}} </td>
                    <td> {{$content->name}} </td>
                    <td> <img src="{{url('/storage/app/country/').'/'.$content->image}}"  height="100" width="150" > </td>
                    <td>
                       <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal{{$content->id}}" > Edit </button> 
                      
                       <button class="btn btn-outline-danger callDelete" current-id="{{$content->id}}" tableId="3" > Delete </button>  
                    </td>
                  </tr>

                   <!-- The Modal -->
                  <div class="modal" data-backdrop="static" data-keyboard="false" id="myModal{{$content->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title"> Edit Country </h4>
                          <button type="button" class="close" data-dismiss="modal">&times; </button>
                        </div>

                          <form action="{{url('country-update')}}" method="post" class="form-sample" enctype="multipart/form-data" >
                            
                            @csrf
                            <!-- Modal body -->
                            <div class="modal-body">

                            <input type="hidden" name="id" value="{{$content->id}}" >
                            <div class="form-group row">
                              <div class="col-lg-3">
                              <label class="col-form-label"> Country Name  </label>
                              </div>
                              <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Country Name " name="name" required value="{{$content->name}}" >
                              </div>
                              </div>
                                <div class="form-group row">
                                  <div class="col-lg-3">
                                  <label class="col-form-label"> Country Image  </label>
                                  </div>
                                    <div class="col-lg-8">
                                       <input type="file"  name="image" class="form-control" id="image" placeholder="Select Image"  >
                                    </div>
                                 </div>
                                
                                <div class="form-group row">
                                  <div class="col-lg-3"></div>
                                  <div class="col-lg-8">
                                    <img src="{{url('/storage/app/country/').'/'.$content->image}}"  height="100" width="150" >
                                  </div>
                                </div>
                          
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary btn-icon-text"> <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </form>  

                      </div>
                    </div>
                  </div>
 
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

  <!-- The Modal -->
  <div class="modal" data-backdrop="static" data-keyboard="false" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Add Country </h4>
          <button type="button" class="close" data-dismiss="modal">&times; </button>
        </div>

          <form action="{{url('country-save')}}" method="post" class="form-sample" enctype="multipart/form-data" >
            
            @csrf
            <!-- Modal body -->
            <div class="modal-body">

            <div class="form-group row">
              <div class="col-lg-3">
              <label class="col-form-label"> Country Name  </label>
              </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Country Name " name="name" required >
                </div>
              </div>

              <div class="form-group row">
              <div class="col-lg-3">
              <label class="col-form-label"> Country Image  </label>
              </div>
                <div class="col-lg-8">
                   <input type="file"  name="image" class="form-control" id="image" placeholder="Select Image"  >
                </div>
              </div>
          
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-icon-text"> <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </form>  

      </div>
    </div>
  </div>

@include('admin.footer')