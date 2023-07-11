@include('admin.header')
  @include('admin.sidebar')
    
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Content  </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">  
                     <a href="{{ url()->previous() }}" class="btn btn-primary btn-rounded btn-fw"  > Back  </a>
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
                    
                      <form action="{{route('content-management.update',$alldata->id);}}" method="post" class="form-sample" enctype="multipart/form-data" >
                 
                  @csrf
                  @method('PUT')
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
                               @if($country->id == $alldata->country_id)
                              {{ $categoriess = App\Models\Category::where('country_id',$alldata->country_id)->get();}} 
                              @endif
                               <option value="{{$country->id}}" @if($country->id == $alldata->country_id){{'selected'}} @endif > {{$country->name}} </option> 
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
                <select type="text" class="form-control" name="category_id" id="category" required >  
                 <option> Select Category </option> 
                       
                        @if(!empty($categoriess)) 
                              @foreach($categoriess as $category) 
                               <option value="{{$category->id}}" @if($category->id == $alldata->cat_id){{'selected'}} @endif > {{$category->name}} </option> 
                              @endforeach 
                            @endif  

                </select> 
               </div>  
              </div>

                <div class="form-group row"> 
               <div class="col-lg-3"> 
                <label class="col-form-label"> Select Sub Category </label> 
               </div> 
               <div class="col-lg-8"> 
                <select type="text" class="form-control" name="sub_category_id" id="sub_category" required >  
                 <option> Select Sub Category </option> 
                    @if(!empty($subcategory)) 
                              @foreach($subcategory as $subcategory) 
                               <option value="{{$subcategory->id}}" @if($subcategory->id == $alldata->sub_cat_id){{'selected'}} @endif > {{$subcategory->name}} </option> 
                              @endforeach 
                            @endif   
                </select> 
               </div>  
              </div>

               <div class="form-group row">
              <div class="col-lg-3">
                <label class="col-form-label"> Content Image Upload </label>
              </div>
              <div class="col-lg-8">
                <input type="file"  name="image" class="form-control" id="image" accept="image/*" > <br>
                 <img src="{{url('/storage/app/content_image/').'/'.$alldata->image}}"  height="100" width="150" >
              </div>
            </div>

             <div class="form-group row">
              <div class="col-lg-3">
                <label class="col-form-label"> Content Video Upload </label>
              </div>
              <div class="col-lg-8">
                <input type="file"  name="video" class="form-control" id="video"  accept="video/*" > <br>
                 <video width="50%" controls>
                      <source src="{{url('/storage/app/content_video/').'/'.$alldata->video}}" type="video/mp4">
                    </video>
              </div>
            </div>

            
              <div class="form-group row">
                <div class="col-lg-3">
                <label class="col-form-label"> Content </label>
                </div>
                <div class="col-lg-8">
                  <textarea type="description"  name="content" rows="10" cols="50" class="form-control" id="content" placeholder="Enter Content"> {!! $alldata->content !!} </textarea>
                  <!-- <textarea type="description"  name="content"  class="form-control ckeditor" id="content" placeholder="Enter Content"> {!! $alldata->content !!} </textarea> -->
                </div>
                </div>
            

                <button type="submit" class="btn btn-primary btn-icon-text"> <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>

            </form>  
                  
              </div>
            </div>
          </div>
        </div>
      </div>


   

@include('admin.footer')