
    </div>
    <!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{ asset('assets/images/resources/logo-1.png') }}" width="135"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@gmail.com">info@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:123456789">123456789</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->


    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyright 2023 by <a href="#">Hello Visa</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa-solid fa-arrow-up-long"></i></a>


    <!-- country modal S -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/vendors/jquery/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/vendors/circleType/jquery.lettering.min.js') }}"></script>




    <!-- template js -->
    <script src="{{ asset('assets/js/treck.js') }}"></script>
    <script>
        $(document).ready(function () {
            // $(".ct_cata_btn").click(function(){
            //     $(this).toggleClass("active1")
            //     $(".ct_dropdown_menu").toggleClass("active1")
            // })

            // $(".ct_sub_menu").click(function(){
            //     $(this).toggleClass("active1")
            //     $(".ct_ct_sub_cata_drop").toggleClass("active12")
            // })


            jQuery('.ct_cata_btn').click(function () {

                jQuery(this).parent('.ct_select_category').children('.ct_dropdown_menu').toggleClass('active1');
            });
            jQuery('.ct_sub_menu').click(function () {
                jQuery(this).parent('.ct_dropdown_menu ul li').children('.ct_ct_sub_cata_drop').toggleClass('active12');
            });
        })


    </script>
</body>

</html>