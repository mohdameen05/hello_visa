      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
        <div class="footer-inner-wraper">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a href="#" target="_blank"> Hello Visa </a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </div>
      </footer>
      <!-- partial -->
     </div>
    </div>

    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
    <!-- plugins:js -->
    <script src="{{url('public/adm-assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{url('public/adm-assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('public/adm-assets/vendors/jquery-circle-progress/js/circle-progress.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('public/adm-assets/js/off-canvas.js')}}"></script>
    <script src="{{url('public/adm-assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('public/adm-assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{url('public/adm-assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    
    <!-- Plugin js for this page -->
    <script src="{{url('public/adm-assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{url('public/adm-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('public/adm-assets/js/data-table.js')}}"></script>
    <!-- End plugin js for this page -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $('#country').on('change', function(){
    var countryId = $(this).val();
    // alert(countryId);
    if(countryId){ 
       $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type : 'POST',
        url:"{{ route('contentcity')}}",
        data: {
                "_token": "{{ csrf_token() }}",
                "country_id": countryId
              },
        dataType : 'html',
        success : function(result){
             $('#category').html(result);
             $('#sub_category').html('<option value="">Select Sub Category</option>');
        }
    });
        }else{
      $('#state').html('<option value="">Select country first</option>');
      $('#city').html('<option value="">Select state first</option>'); 
         }
  });


    $('#category').on('change', function(){
        var countryIdVal = $('#country').val();
        var categoryId = $(this).val();
        if(categoryId){
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : 'POST',
                url:"{{ route('contentcategory')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "country_id": countryIdVal,
                    "category_id": categoryId
                 },
               dataType : 'html',
                success:function(html){
                    $('#sub_category').html(html);
                }
            }); 
        }else{
            $('#sub_category').html('<option value="">Select Sub Category </option>'); 
        }
    });


     $('#countryedit').on('change', function(){
    var countryId = $(this).val();
    alert(countryId);
    if(countryId){ 
       $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type : 'POST',
        url:"{{ route('contentcity')}}",
        data: {
                "_token": "{{ csrf_token() }}",
                "country_id": countryId
              },
        dataType : 'html',
        success : function(result){
             $('#categoryedit').html(result);
        }
    });
        }else{
      $('#categoryedit').html('<option value="">Select categoryedit first</option>');
         }
  });


});

</script>
  <script>
    function successToaster(message) {
    toastr.remove();
    toastr.options.closeButton = true;
    toastr.success(message, '', {timeOut: 5000});
}
function errorToaster(message) {
    toastr.remove();
    toastr.options.closeButton = true;
    toastr.error(message, '', {timeOut: 5000});
}
function showButtonLoader(id, text, action) {
  if (action === 'disable') {
      $('#' + id).prop('disabled', true);
  } else {
      $('#' + id).html(text);
      $('#' + id).prop('disabled', false);
  }
}
 //only number
 function onlyNumberKey(evt) {
    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;
  }
 
    function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        var password = $('#exampleInputPassword4').val().trim();
        if (password.length < 6) {
          $('#password-strength-status').removeClass();
          $('#password-strength-status').addClass('weak-password');
          $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
          $('.submitBtn').attr('disabled', 'disabled');
        } else {
          if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('strong-password');
            $('#password-strength-status').html("Strong");
            $('.submitBtn').prop("disabled", false);
          }
          else {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('medium-password');
            $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                  $('.submitBtn').attr('disabled', 'disabled');
          }
        }
    }
 
// ================

    const previewImage = e => {
      const preview = document.getElementById('preview-image');
      preview.src = URL.createObjectURL(e.target.files[0]);
      preview.onload = () => URL.revokeObjectURL(preview.src);
    };

    $('body').on('click','.categoryType',function()
      {  
         var getVal = $(this).val() ;
         if(getVal == 0)
         {
            $('.selectCategory').hide() ;
         } else {
            $('.selectCategory').show() ;
         }  

    }) ;
    
    $('body').on('click','.callDelete',function(){  
        
      var id = $(this).attr('current-id') ;     
      
      var tableId = $(this).attr('tableId') ; 
      
       // alert(id) ;
       // alert(tableId) ;
      
      url = "{{url('/globalDelete/')}}" ;
      
      swal({
          title: "Are you sure ?" ,
          text: "You want to remove this Data !" ,
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true ,
        }).then(function(isConfirm) {
           if (isConfirm) {
             
              //=== Action for delete 
              
               $.ajax({
                url: url,
                type: "POST",
                dataType: "html",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "id" : id , "tableId" : tableId
                },
                success: function (getdata) {
                    swal("Done!", 'It was succesfully deleted!' ,"success") ;
                    setTimeout(location.reload(), 5000) ;                   
                }

              //=======
            });
          } else {
            swal("Cancelled", "Data is safe :)", "error");
          }
        });
    });

    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
       $(".alert").slideUp(500) ;
    });

  </script>
    
 </body>
</html>