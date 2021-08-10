@extends('customer.layouts.master')

@section('content')
  
        <!-- ***** Breadcrumb Area Start ***** -->
        <section class="breadcrumb-area overlay-dark d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content text-center">
                            <h2 class="m-0" style="color:white;">REGISTER</h2>
                            <ol class="breadcrumb d-flex justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('ui.home')}}">Home</a></li>
                                <li class="breadcrumb-item active">Register</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Breadcrumb Area End ***** -->

        <!-- ***** Signup Area Start ***** -->
        <section class="author-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <!-- Intro -->
                        <div class="intro text-center">
                            <span>Register</span>
                            <h3 class="mt-3 mb-0">Buat Akun Baru</h3>
                            <p>Untuk Melakukan Transaksi Anda Harus Memiliki Akun Terlebih Dahulu</p>
                        </div>
                        <!-- Item Form -->
                        <form class="item-form card no-hover" style="background:white;" method="POST" action="{{route('ui.post.register')}}">
                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="phone" placeholder="No Telepon" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <input type="email" class="form-control" name="email" placeholder="Enter your Email" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <input type="password" class="form-control" name="password" placeholder="Enter your Password" required="required">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn w-100 mt-3 mt-sm-4" type="submit">Register</button>
                                </div>
                                <div class="col-12">
                                    <span class="d-block text-center mt-4">Already have an account? <a href="{{route('login')}}">Login</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Signup Area End ***** -->
     
@endsection

@section('scripts')
   
    @if (session()->has('success'))
    <script>
        $(document).ready(function() {
            toastr["success"]('{{ session()->get('success') }}')

        });
    </script>
    @endif

    @if(session()->has('error'))
    <script>
        $(document).ready(function () {
            toastr["info"]('{{ session()->get('error') }}')
        });

    </script>
    @endif

@endsection
