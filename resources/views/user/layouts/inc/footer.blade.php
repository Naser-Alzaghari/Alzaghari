<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- About Column -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <a href="{{route('landing_page')}}">
                        <img src="{{asset('user_assets/img/logo/logo-white.png')}}" alt="Logo">
                    </a>
                    <p>Welcome to our store! We pride ourselves on offering a wide range of high-quality products to meet all your needs.</p>
                    <ul class="social">
                        <li><a href="https://twitter.com" class="social__link"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://facebook.com" class="social__link"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://instagram.com" class="social__link"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Company Column -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Company</h3>
                    <ul class="widget-menu">
                        <li><a href="{{route('about-us')}}">About Us</a></li>
                        <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <!-- Shopping Column -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Shopping</h3>
                    <ul class="widget-menu">
                        <li><a href="{{route('shop-sidebar')}}">Shop Sidebar</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Column -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title">Contact Info</h3>
                    <ul class="contact-info">
                        <li class="contact-info__item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:+962786907594" class="contact-info__link">+962 78690 7594</a>
                        </li>
                        <li class="contact-info__item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:naseralzaghari88@gmail.com" class="contact-info__link">naseralzaghari88@gmail.com</a>
                        </li>
                        <li class="contact-info__item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Amman / Jordan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="copyright-text">&copy; 2024 All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>