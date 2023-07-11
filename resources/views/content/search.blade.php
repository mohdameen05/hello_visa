@include('admin.header')
  @include('admin.sidebar')
  <style type="">
    div.dataTables_wrapper div.dataTables_filter input{
    display: none;
    }
  </style>


    
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Content  </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">  
                     <!-- <a href="{{route('content-management.create')}}" class="btn btn-primary btn-rounded btn-fw"  > Add Content  </a> -->
                      <a href="{{route('content-management.index')}}" class="btn btn-primary btn-rounded btn-fw"  > Back To List  </a>
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
                     <form action="{{ route('content.search') }}">
                     <div class="ct_input_field">
                        <input type="text" name="search"  class="form-control" placeholder="Search In Content">
                      <input type="submit" name="submit" value="Search" class="btn btn-primary btn-rounded px-4">
                     </div>
                    </form>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th> S.No. # </th>
                          <th> Country </th>
                          <th> Category </th>
                          <th> Sub Category </th>
                          <th> Content </th>
                          <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody>
                    @php $i=1 ; @endphp    
                    
                     @if(!empty($alldata) && count($alldata)>0 )
                     
                      @foreach($alldata as $content)
 
                        <tr>
                          <td> {{$i}} </td>
                          <td> {{ $content->country->name}}  </td>
                          <td> {{ $content->category->name}}  </td>
                          <td> {{ $content->subCategory->name}}  </td>
                          <td> <?php print_r(substr($content->content,0,35)); ?>  </td>
                          <td>
                            <a  href="{{route('content-management.show',$content->id);}}" > <button class="btn btn-outline-success"  > Show </button></a>
                            <a  href="{{route('content-management.edit',$content->id);}}" > <button class="btn btn-outline-primary"  > Edit </button></a>
                        <button class="btn btn-outline-danger callDelete" current-id="{{$content->id}}" tableId="4" > Delete </button>
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

                <form action="{{route('content-management.update',$content->id);}}" method="post" class="form-sample" enctype="multipart/form-data" >
                 
                  @csrf
                  @method('PUT')
                  <!-- Modal body -->
                <div class="modal-body">

              <div class="form-group row"> 
                <div class="col-lg-3"> 
                <label class="col-form-label"> Select Country </label> 
                </div> 
                <div class="col-lg-8"> 
                  <select type="text" class="form-control" name="country_id" required >  
                    <option> Select Country </option> 

                        <option value="India" @if($content->country_id == 'India'){{'selected'}} @endif > India </option> 
                        <option value="America" @if($content->country_id == 'America'){{'selected'}} @endif > America </option> 
                        <option value="USA" @if($content->country_id == 'USA'){{'selected'}} @endif > USA </option> 
                        <option value="UK" @if($content->country_id == 'UK'){{'selected'}} @endif > UK </option> 

                  </select> 
                </div>  
              </div>

              <div class="form-group row"> 
               <div class="col-lg-3"> 
                <label class="col-form-label"> Select Category </label> 
               </div> 
               <div class="col-lg-8"> 
                <select type="text" class="form-control" name="category_id" required >  
                 <option> Select Category </option> 
                       
                        <option value="demo" @if($content->cat_id == 'demo'){{'selected'}} @endif > demo </option> 
                        <option value="demo1" @if($content->cat_id == 'demo1'){{'selected'}} @endif > demo1 </option> 
                        <option value="demo3" @if($content->cat_id == 'demo3'){{'selected'}} @endif > demo3 </option> 
                        <option value="demo4" @if($content->cat_id == 'demo4'){{'selected'}} @endif > demo4 </option> 

                </select> 
               </div>  
              </div>

                <div class="form-group row"> 
               <div class="col-lg-3"> 
                <label class="col-form-label"> Select Sub Category </label> 
               </div> 
               <div class="col-lg-8"> 
                <select type="text" class="form-control" name="sub_category_id" required >  
                 <option> Select Sub Category </option> 
                    <option value="Sub_demo" @if($content->subCat_id == 'Sub_demo'){{'selected'}} @endif > Sub_demo </option> 
                        <option value="Sub_demo1" @if($content->subCat_id == 'Sub_demo1'){{'selected'}} @endif > Sub_demo1 </option> 
                        <option value="Sub_demo3" @if($content->subCat_id == 'Sub_demo3'){{'selected'}} @endif > Sub_demo3 </option> 
                        <option value="Sub_demo4" @if($content->subCat_id == 'Sub_demo4'){{'selected'}} @endif > Sub_demo4 </option> 
                </select> 
               </div>  
              </div>
            
              <div class="form-group row">
                <div class="col-lg-3">
                <label class="col-form-label"> Content </label>
                </div>
                <div class="col-lg-8">
                  <textarea type="description"  name="content"  class="form-control ckeditor" id="content" placeholder="Enter Content"> {!! $content->content !!} </textarea>
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

            <form action="{{route('content-management.store');}}" method="post" class="form-sample" enctype="multipart/form-data" >
              
              @csrf
              <!-- Modal body -->
              <div class="modal-body">

              <div class="form-group row"> 
                <div class="col-lg-3"> 
                <label class="col-form-label"> Select Country </label> 
                </div> 
                <div class="col-lg-8"> 
                  <select type="text" class="form-control" name="country_id" required >  
                    <option> Select Country </option> 

                        <option value="India" > India </option> 
                        <option value="America" > America </option> 
                        <option value="USA" > USA </option> 
                        <option value="UK" > UK </option> 

                  </select> 
                </div>  
              </div>

              <div class="form-group row"> 
               <div class="col-lg-3"> 
                <label class="col-form-label"> Select Category </label> 
               </div> 
               <div class="col-lg-8"> 
                <select type="text" class="form-control" name="category_id" required >  
                 <option> Select Category </option> 
                       
                        <option value="demo" > demo </option> 
                        <option value="demo1" > demo1 </option> 
                        <option value="demo3" > demo3 </option> 
                        <option value="demo4" > demo4 </option> 

                </select> 
               </div>  
              </div>

                <div class="form-group row"> 
               <div class="col-lg-3"> 
                <label class="col-form-label"> Select Sub Category </label> 
               </div> 
               <div class="col-lg-8"> 
                <select type="text" class="form-control" name="sub_category_id" required >  
                 <option> Select Sub Category </option> 
                    <option value="Sub_demo" > Sub_demo </option> 
                        <option value="Sub_demo1" > Sub_demo1 </option> 
                        <option value="Sub_demo3" > Sub_demo3 </option> 
                        <option value="Sub_demo4" > Sub_demo4 </option> 
                </select> 
               </div>  
              </div>
            
              <div class="form-group row">
                <div class="col-lg-3">
                <label class="col-form-label"> Content </label>
                </div>
                <div class="col-lg-8">
                  <textarea type="description"  name="content"  class="form-control ckeditor" id="content" placeholder="Enter Content"> {!! $content->content !!} </textarea>
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