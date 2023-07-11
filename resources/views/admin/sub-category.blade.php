@include('admin.header')
  @include('admin.sidebar')
    
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Sub Categories </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">  
                     <a type="button" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#myModal" > Add Sub Category </a> 
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
                      <div class="alert alert-success"> {{ Session::get('success_msg')}}</div>
                    @endif  
                    
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th> S.No. # </th>
                          <th> Country </th>
                          <th> Category Name </th>
                          <th> Sub Category Name </th>
                          <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody>
                    @php $i=1 ; @endphp    
                    
                     @if(!empty($subcategoryList) && count($subcategoryList)>0 )
                     
                      @foreach($subcategoryList as $content)
 
                        <tr>
                          <td> {{$i}} </td>
                          <td>  {{ (!empty($content->country->name) ) ? $content->country->name: "Not Available" }}</td>
                          <td>  {{ (!empty($content->category->name) ) ? $content->category->name: "Not Available" }}</td>
                          <td> {{$content->name}} </td>
                          <td>
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal{{$content->id}}" > Edit </button>
                           
                            <button class="btn btn-outline-danger callDelete" current-id="{{$content->id}}" tableId="2" > Delete </button> 

                          </td>
                        </tr>

                        <!-- Edit Modal -->

          <div class="modal" data-backdrop="static" data-keyboard="false" id="myModal{{$content->id}}">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title"> Edit Data Category </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <form action="{{ url('sub-category-update') }}" method="post" class="form-sample" enctype="multipart/form-data" >
                 
                 @csrf
                  <!-- Modal body -->
                  <div class="modal-body">

                    <input type="hidden" name="id" value="{{$content->id}}" >
                    <div class="form-group row"> 
                    <div class="col-lg-3"> 
                      <label class="col-form-label"> Select Country  </label> 
                    </div> 
                    <div class="col-lg-8"> 
                        <select type="text" class="form-control" name="country_id" id="countryedit"  required >  
                          <option> Select Country </option> 
                            @if(!empty($countries)) 
                              @foreach($countries as $country)
                               @if($content->country_id == $country->id)
                              {{ $categoriess = App\Models\Category::where('country_id',$country->id)->get();}} 
                              @endif
                               <option value="{{$country->id}}" @if($content->country_id == $country->id){{'selected'}} @endif > {{$country->name}} </option> 
                              @endforeach 
                            @endif  
                        </select> 
                      </div>  
                    </div>
                    
                    <div class="form-group row"> 
                       <div class="col-lg-3"> 
                        <label class="col-form-label"> Select Category  </label> 
                       </div> 
                       <div class="col-lg-8"> 
                        <select type="text" class="form-control" name="sub_category_id" id="categoryedit" required >  
                         <option> Select Category </option> 
                           @if(!empty($categoriess)) 
                              @foreach($categoriess as $category) 
                               <option value="{{$category->id}}" @if($category->id == $content->category_id ) {{'selected'}} @endif > {{$category->name}} </option> 
                              @endforeach 
                            @endif   
                        </select> 
                       </div>  
                     </div>
                    
                      <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label"> Name </label>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Name" name="name" required value="{{$content->name}}" >
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
    <div class="modal" data-backdrop="static" data-keyboard="false" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"> Add Sub Category </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

            <form action="{{url('sub-category-save')}}" method="post" class="form-sample" enctype="multipart/form-data" >
              
              @csrf
              <!-- Modal body -->
              <div class="modal-body">

              <div class="form-group row"> 
                <div class="col-lg-3"> 
                <label class="col-form-label"> Select Country </label> 
                </div> 
                <div class="col-lg-8"> 
                  <select type="text" class="form-control" name="country_id" id="country" required >  
                    <option> Select Country </option> 
                      @if(!empty($countries)) 
                        @foreach($countries as $country) 
                        <option value="{{$country->id}}" > {{$country->name}} </option> 
                        @endforeach 
                      @endif  
                  </select> 
                </div>  
              </div>

              <div class="form-group row"> 
               <div class="col-lg-3"> 
                <label class="col-form-label"> Select Category </label> 
               </div> 
               <div class="col-lg-8"> 
                <select type="text" class="form-control" name="sub_category_id" id="category" required >  
                 <option> Select Category </option> 
                   <!--  @if(!empty($categories)) 
                      @foreach($categories as $category) 
                       <option value="{{$category->id}}" > {{$category->name}} </option> 
                      @endforeach 
                    @endif   -->
                </select> 
               </div>  
              </div>
            
              <div class="form-group row">
                <div class="col-lg-3">
                <label class="col-form-label"> Name </label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Name" name="name" required >
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