@include('admin.header')
@include('admin.sidebar')
 
    <div class="content-wrapper">
       
        <div class="page-header">
          <h3 class="page-title"> Edit Category </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">  <a class="nav-link" href="{{url('categories')}}" > <button class="btn btn-info"> Back to List </button> </a> </li>
            </ol>
          </nav>
        </div>
        
        <div class="row" >
    
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

              @if(Session::has('error_msg'))
                <div class="alert alert-danger"> {{ Session::get('error_msg') }} </div>
              @endif   
              
              @if (Session::has('success_msg'))
                <div class="alert alert-success"> {{ Session::get('success_msg') }} </div>
              @endif 
                  
               <form action="{{url('update-category')}}" method="post" class="form-sample" enctype="multipart/form-data" >

                 @csrf
                   
                    <input type="hidden" name="cat_id" value="{{$mainCategories->id}}" >
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label"> Category Name (EN) </label>
                      </div>
                      <div class="col-lg-8">
                         <input type="text" class="form-control" placeholder="Category Name" name="category_name_en" required value="{{$mainCategories->category_name_en}}" >
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label"> Category Name (IT) </label>
                      </div>
                      <div class="col-lg-8">
                         <input type="text" class="form-control" placeholder="Category Name" name="category_name_it" required value="{{$mainCategories->category_name_it}}" >
                      </div>
                    </div>
                  
                  <div class="template-demo">
                     <button type="submit" class="btn btn-primary btn-icon-text">
                      <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                  </div>
           
            </form>
                            
        </div>
      
    </div>
     
  </div>
            
@include('admin.footer')