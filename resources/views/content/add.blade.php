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

          <form action="{{route('content-management.store');}}" method="post" class="form-sample" enctype="multipart/form-data" >

            @csrf
            <!-- Modal body -->

            <div class="form-group row"> 
              <div class="col-lg-3"> 
                <label class="col-form-label"> Select Country </label> 
              </div> 
              <div class="col-lg-8"> 
                <select type="text" class="form-control" name="country_id" id="country" required >  
                  <option> Select Country </option> 

                  @if(!empty($countries)) 
                  @foreach($countries as $country) 
                  <option value="{{$country->id}}"  > {{$country->name}} </option> 
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

                 <!--  @if(!empty($categoryList)) 
                  @foreach($categoryList as $category) 
                  <option value="{{$category->id}}"  > {{$category->name}} </option> 
                  @endforeach 
                  @endif   -->

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
                  <option value="{{$subcategory->id}}"  > {{$subcategory->name}} </option> 
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
                <input type="file"  name="image" class="form-control" id="image" accept="image/*" required>
              </div>
            </div>

             <div class="form-group row">
              <div class="col-lg-3">
                <label class="col-form-label"> Content Video Upload </label>
              </div>
              <div class="col-lg-8">
                <input type="file"  name="video" class="form-control" id="video"  accept="video/*"   >
              </div>
            </div>

             <div class="form-group row">
              <div class="col-lg-3">
                <label class="col-form-label"> Content </label>
              </div>
              <div class="col-lg-8">
                <textarea type="description"  name="content" rows="10" cols="50" class="form-control " id="content" placeholder="Enter Content">  </textarea>
                <!-- <textarea type="description"  name="content"  class="form-control ckeditor" id="content" placeholder="Enter Content">  </textarea> -->
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