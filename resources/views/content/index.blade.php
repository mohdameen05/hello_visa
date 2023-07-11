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
          <a href="{{route('content-management.create')}}" class="btn btn-primary btn-rounded btn-fw"  > Add Content  </a>
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
                <td> {{ !empty($content->country->name)?$content->country->name:"Not Available";}}  </td>
                <td> {{ !empty($content->category->name)?$content->category->name:"Not Available";}}  </td>
                <td> {{ !empty($content->subCategory->name)?$content->subCategory->name:"Not Available";}}  </td>
                <td> <?php print_r(substr($content->content,0,35)); ?>  </td>
                <td>
                  <a  href="{{route('content-management.show',$content->id);}}" > <button class="btn btn-outline-success"  > Show </button></a>
                  <a  href="{{route('content-management.edit',$content->id);}}" > <button class="btn btn-outline-primary"  > Edit </button></a>
                  <button class="btn btn-outline-danger callDelete" current-id="{{$content->id}}" tableId="4" > Delete </button>
                </td>
              </tr>

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


@include('admin.footer')