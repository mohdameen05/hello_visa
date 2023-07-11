@extends('website.include.agent_index')
@section('agent_main-section')
                            

     <section class="ct_ptb">
            <div class="container">
                <div class="row">
                  
                    <div class="col-md-12 mb-4">
                       <div class="ct_box_shadow11">
                        <div class="ct_category_detail_main">
                            <div class="ct_detail_img">
                                <img src="{{url('/storage/app/content_image/').'/'.$content->image}}"  height="100" width="150" >
                            </div>
                            <div class="ct_detail_cnt">
                                <p>{{ $content->content }}</p>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>

            </div>
        </section>



@endsection
