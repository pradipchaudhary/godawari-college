@section('title', 'Home | Godawari College, Ithari, Sunsari, Nepal')
@section('home', 'active')
@include('inc.header')
@include('inc.nav')

{{-- content start --}}
<!-- ============ hero  =========== -->
{{-- banner --}}

<div id="banner">
    <div class="owl-carousel banner owl-theme">
        @foreach ($banner as $item)
            <div class="item"
                style="background-image:linear-gradient(to right, rgb(23 61 98), rgb(23 61 98 / 70%)), url('{{ asset('uploads/banner/' . $item->image) }}');">

                <div class="container">
                    <div class="row">
                        <div class="col-md-5 banner_text">
                            <h1 class=""> {{ $item->title }}</h1>
                            <div class="bannder_des">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio inventore, labore impedit
                                facilis est fugiat! Lorem ipsum dolor sit.
                            </div>
                            <div class="banner_link">
                                <a href="#"> View More </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

{{-- Services --}}
<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="service">
                    <div class="service_icon">
                        {{  }}
                    </div>
                    <h4 class="service_title">
                        Why Study our College
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>



@include('inc.footer')
