<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">{{ config('app.name') }}, <i>A SIMPLE, YET VERY POWERFUL MARKET, </i> is the best choice for for both
                  startup entrepreneurs and experienced sellers. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna aliqua. </p>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>


            <div class="col-xs-6 offset-md-3 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ url('/terms-and-conditions') }}">Terms and Conditions</a></li>
                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; {{ Carbon\Carbon::now()->year }} All Rights Reserved by
                    <a href="#">{{ config('app.name') }}</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
