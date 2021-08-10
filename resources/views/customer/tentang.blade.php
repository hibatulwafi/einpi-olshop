@extends('customer.layouts.master')

@section('content')
  
        <!-- ***** Breadcrumb Area Start ***** -->
        <section class="breadcrumb-area overlay-dark d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content text-center">
                            <h2 class="m-0" style="color:white;">Tentang</h2>
                            <ol class="breadcrumb d-flex justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('ui.home')}}">Home</a></li>
                                <li class="breadcrumb-item active">Tentang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Breadcrumb Area End ***** -->

            <!-- ***** FAQ Area Start ***** -->
        <section class="faq-area pt-0" style="margin-top:50px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-7">
                        <!-- Intro -->
                        <div class="intro text-center">
                            <h3 class="mt-3 mb-0">Tentang {{ config('app.name', 'Laravel') }} Online Shop</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <!-- FAQ Content -->
                        <div class="faq-content">
                            <!-- Netstorm Accordion -->
                            <div class="accordion" id="netstorm-accordion">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-10">
                                        <!-- Single Accordion Item -->
                                        <div class="single-accordion-item p-3">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="m-0">
                                                    <button class="btn d-block text-left w-100 py-4" type="button" data-toggle="collapse" data-target="#collapseOne">
                                                        Apa itu  {{ config('app.name', 'Laravel') }} Online Shop?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#netstorm-accordion">
                                                <!-- Card Body -->
                                                <div class="card-body py-3">
                                                    The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Accordion Item -->
                                        <div class="single-accordion-item p-3">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="m-0">
                                                    <button class="btn d-block text-left w-100 collapsed py-4" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                                        Bagaimana membuat akun  {{ config('app.name', 'Laravel') }}?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#netstorm-accordion">
                                                <!-- Card Body -->
                                                <div class="card-body py-3">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Accordion Item -->
                                        <div class="single-accordion-item p-3">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="m-0">
                                                    <button class="btn d-block text-left w-100 collapsed py-4" type="button" data-toggle="collapse" data-target="#collapseThree">
                                                        Bagaimana melakukan transaksi disini?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#netstorm-accordion">
                                                <!-- Card Body -->
                                                <div class="card-body py-3">
                                                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Accordion Item -->
                                        <div class="single-accordion-item p-3">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="m-0">
                                                    <button class="btn d-block text-left w-100 collapsed py-4" type="button" data-toggle="collapse" data-target="#collapseFour">
                                                        Apakah bertransaksi disini aman?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseFour" class="collapse" data-parent="#netstorm-accordion">
                                                <!-- Card Body -->
                                                <div class="card-body py-3">
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Accordion Item -->
                                        <div class="single-accordion-item p-3">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="m-0">
                                                    <button class="btn d-block text-left w-100 collapsed py-4" type="button" data-toggle="collapse" data-target="#collapseFive">
                                                        Bagaimana cara mengajukan complain?
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseFive" class="collapse" data-parent="#netstorm-accordion">
                                                <!-- Card Body -->
                                                <div class="card-body py-3">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** FAQ Area End ***** -->
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
