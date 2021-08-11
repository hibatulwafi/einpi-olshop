 <!--====== Footer Area Start ======-->
        <footer class="footer-area">
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3 res-margin">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Logo -->
                                <a class="navbar-brand" href="#">
                                    <img src="{{ asset('/img/'.\Setting::getSetting()->logo)}}" width="70px" alt="">
                                </a>
                                <p>{{ config('app.name', 'Laravel') }} Web Official Shop</p>
                                <!-- Social Icons -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 res-margin">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h4 class="footer-title">Bantuan</h4>
                                <ul>
                                     <li><a href="{{route('ui.tentang')}}">Cara Belanja</a></li>
                                    <li><a href="{{route('ui.tentang')}}">Pengiriman</a></li>
                                    <li><a href="{{route('ui.tentang')}}">Pembayaran</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 res-margin">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h4 class="footer-title">Kontak Kami</h4>
                                <ul>
                                    <li><a href="#">+62858 6304 6869</a></li>
                                    <li><a href="#">hiwapiputra@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 res-margin">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                   <div class="social-icons d-flex">
                                    <a class="facebook" href="#">
                                        <i class="fab fa-facebook-f"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="google-plus" href="#">
                                        <i class="fab fa-google-plus-g"></i>
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                    <a class="github" href="#">
                                        <i class="fab fa-github"></i>
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Copyright Area -->
                            <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                                <!-- Copyright Left -->
                                <div class="copyright-left">&copy;2021 Einpi.</div>
                                <!-- Copyright Right -->
                                <div class="copyright-right">Made with <i class="fas fa-heart"></i> By <a href="#">Hibatul Wafi</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== Footer Area End ======-->
