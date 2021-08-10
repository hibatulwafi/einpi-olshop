       <!-- ***** Header Start ***** -->
        <header id="header">
            <!-- Navbar -->
            <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
                <div class="container header">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand" href="index.html">

                        <img class="navbar-brand-sticky" src="{{ asset('/img/'.\Setting::getSetting()->logo)}}" alt="sticky brand-logo">
                    </a>
                    <div class="ml-auto"></div>
                    <!-- Navbar -->
                    <ul class="navbar-nav items mx-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('ui.home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('ui.product')}}" class="nav-link">Produk</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Kategori <i class="fas fa-angle-down ml-1"></i></a>
                            <ul class="dropdown-menu">
                            @forelse($kategori as $row)
                                <li class="nav-item"><a href="{{route('ui.product.kategori',[$param2 = $row->nama_kategori])}}" class="nav-link">{{$row->nama_kategori }}</a></li>
                            @empty
                            @endforelse
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('ui.tentang')}}" class="nav-link">Tentang</a>
                        </li>
                       

                        @if(Auth::check())
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Profile <i class="fas fa-angle-down ml-1"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="{{route('ui.profile')}}" class="nav-link"><i class="fa fa-user"></i> <span class="count">Hi,{{ Auth::user()->name }}</span></a></li>
                                <li class="nav-item"><a href="{{route('ui.pembayaran')}}" class="nav-link"><i class="fa fa-credit-card" aria-hidden="true"></i>My Order</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="nav-icon fas fa-sign-out-alt text-cyan   "></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>

                        <?php
                            $id_user = \Auth::user()->id;
                            $total_keranjang = \DB::table('keranjang')
                            ->select(DB::raw('count(id_keranjang) as jumlah'))
                            ->where('id_user',$id_user)
                            ->first();
                        ?>

                        <li class="nav-item">
                            <a href="{{route('ui.keranjang')}}" class="nav-link">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="count">({{ $total_keranjang->jumlah }})</span>
                            </a>
                        </li>

                        @else
                         <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link">Login</a>
                        </li>
                        @endif
                    </ul>
                    <!-- Navbar Icons -->
                    <ul class="navbar-nav icons">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- Navbar Toggler -->
                    <ul class="navbar-nav toggle">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                                <i class="fas fa-bars toggle-icon m-0"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ***** Header End ***** -->