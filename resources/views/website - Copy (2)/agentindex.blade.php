@extends('website.include.agent_index')
@section('agent_main-section')

    <section class="ct_ptb">
        <div class="container">
             @if(Session::has('error_msg'))
                      <div class="alert alert-danger"> {{ Session::get('error_msg')}}</div>
                    @endif   
                    
                    @if (Session::has('success_msg'))
                       <div class="alert alert-success alert-dismissible">
                        <button type="button" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{session('success_msg')}}
                       </div>
                    @endif 
            <div class="row ct_all_country_box">

                @if(!empty($countries)) 
                  @foreach($countries as $country) 
                  @php $categoriess = App\Models\Category::where('country_id',$country->id)->get(); @endphp
                <div class="col-md-3 mb-4">

                    <div class="ct_country_box">
                        <div class="ct_country_icon">
                            <img src="{{url('/storage/app/country/').'/'.$country->image}}" height="100" width="150" alt="">
                        </div>
                        <div class="ct_country_name">
                            <h4>{{$country->name}} </h4>
                        </div>
                        <div class="dropdown ct_country_dropdown">
                            <div class="ct_select_category">
                                <button class="ct_cata_btn dropdown-toggle">Select Category </button>
                                <div class="ct_dropdown_menu">
                                    <ul>
                                  
                                       <!--    @foreach($categoriess as $category)
                                            <li><a class="dropdown-item" >{{$category->name}}</li>
                                           @endforeach  -->
                                      
                                        <li><a class="dropdown-item ct_sub_menu" href="javascript:void(0)">Visa <i
                                            class="fa-solid fa-angle-down"></i></a>
                                            <div class="ct_ct_sub_cata_drop">
                                                <ul>
                                                    <li><a class="dropdown-item" href="category_detail.html">Visa
                                                    1</a></li>
                                                    <li><a class="dropdown-item" href="category_detail.html">Visa
                                                    2</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a class="dropdown-item" href="category_detail.html">Medical visa</a>
                                        </li>
                                        <li><a class="dropdown-item" href="category_detail.html">Study visa</a></li>
                                        <li><a class="dropdown-item" href="category_detail.html">Working visa</a>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    @endforeach 
                  @endif
            </div>

        </div>
    </section>



@endsection
