<div class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4">About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
            </div>
            <div class="col-md-3 ml-auto">
                <h3 class="footer-heading mb-4">Quick Menu</h3>
                <ul class="list-unstyled float-left mr-5">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Subscribes</a></li>
                </ul>
                <ul class="list-unstyled float-left">
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Nature</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="mb-5">
                    <h3 class="footer-heading mb-4">Subscribe</h3>
                    <form action="{{ route('subscribe-us') }}" method="post" class="form-footer-subscribe" id="form-subscribe-us">
                        {!! csrf_field() !!}
                        <div class="d-flex">
                            <input type="email" name="email" id="subscribe-us-email" placeholder="Enter email id" class="form-control">
                            <input type="button" id="btn-subscribe-us" class="btn btn-primary text-white" value="Subscribe">                            
                        </div>
                        <div class="d-flex">
                            <span style="color: #fff" id="subscribe-us-msg"></span>
                        </div>
                    </form>                    
                </div>

                <div>
                    <h3 class="footer-heading mb-4">Connect With Us</h3>
                    <p>
                        <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        <a href="#"><span class="icon-twitter p-2"></span></a>
                        <a href="#"><span class="icon-instagram p-2"></span></a>
                        <a href="#"><span class="icon-rss p-2"></span></a>
                        <a href="#"><span class="icon-envelope p-2"></span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</div>