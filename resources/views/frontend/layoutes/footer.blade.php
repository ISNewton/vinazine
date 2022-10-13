<!-- footer social list start-->
<section class="ts-footer-social-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-logo">
                    <a href="#">
                        <img src="{{ asset('frontend/images/logo/footer_logo.png') }}" alt="">
                    </a>
                </div>
                <!-- footer logo end-->
            </div>
            <!-- col end-->

            <div class="col-lg-8 align-self-center">
                <ul class="footer-social">
                    <li class="ts-facebook">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                    </li>
                    <li class="ts-google-plus">
                        <a href="#">
                            <i class="fa fa-google-plus"></i>
                            <span>Google Plus</span>
                        </a>
                    </li>
                    <li class="ts-twitter">
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                            <span>Twitter</span>
                        </a>
                    </li>
                    <li class="ts-pinterest">
                        <a href="#">
                            <i class="fa fa-pinterest-p"></i>
                            <span>pinterest</span>
                        </a>
                    </li>
                    <li class="ts-linkedin">
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                            <span>Linkedin</span>
                        </a>

                    </li>
                </ul>
            </div>
            <!-- col end-->

        </div>
    </div>
</section>
<!-- footer social list end-->

<!-- newslater start -->
{{-- <section class="ts-newslatter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ts-newslatter-content">
                    <h2>
                        Sign up for the Newsletter
                    </h2>
                    <p>
                        Join our newsletter and get updates in your inbox. We won’t spam you and we respect your
                        privacy.
                    </p>
                </div>
            </div>
            <!-- col end-->

            <div class="col-lg-6 align-self-center">
                <div class="newsletter-form">
                    <form action="#" method="post" class="media align-items-end" name="email">
                        <div class="email-form-group media-body">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <input type="email" name="email" id="newsletter-form-email" class="form-control"
                                placeholder="Enter Your Email" autocomplete="off" >
                        </div>
                        <div class="d-flex ts-submit-btn">
                            <button class="btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- newslater end -->

<!-- footer start -->
<footer class="ts-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-menu text-center">
                    <ul>
                        <li>
                            <a href="#">Support</a>
                        </li>
                        <li>
                            <a href="#">Suggestion</a>
                        </li>
                        <li>
                            <a href="#">Privacy</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Our Ads </a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-text text-center">
                    <p>&copy; 2018, Vinazine. All rights reserved</p>
                </div>
            </div><!-- col end -->
        </div><!-- row end -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-primary" title="Back to Top">
                <i class="fa fa-angle-up"></i>
            </button>
        </div><!-- Back to top end -->
    </div><!-- Container end-->
</footer>
<!-- footer end -->




<!-- javaScript Files
 =============================================================================-->

<!-- initialize jQuery Library -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<!-- navigation JS -->
<script src="{{ asset('frontend/js/navigation.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>

<!-- magnific popup JS -->
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>



<!-- Bootstrap jQuery -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('frontend/js/owl-carousel.2.3.0.min.js') }}"></script>
<!-- slick -->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>

<!-- smooth scroling -->
<script src="{{ asset('frontend/js/smoothscroll.js') }}"></script>


<!-- Toastr -->
<script src="{{ asset('dashboard/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('frontend/js/main.js') }}"></script>
@if (Session::has('message'))
    <script>
        toastr.{{ session()->get('message')['type'] }}("{{ session()->get('message')['message'] }}")
    </script>
@endif
</body>

</html>
