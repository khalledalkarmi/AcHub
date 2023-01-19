@extends('master')
{{--{{dd($trainers)}}--}}
@section('content')
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Trainers</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                @foreach($trainers as $t)
                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <img src="storage/{{$t['profile_img']}}" class="img-fluid" alt="">
                                <div class="member-content">
                                    <h4>{{$t['name']}}</h4>
                                    <span>{{$t['job']}}</span>
                                    <p>
                                        {{$t['about']}}
                                    </p>

                                    <div class="social">
                                            @php
                                                $address = \App\Models\Address::where('user_id', $t['id'])->get()->first();
                                            @endphp
                                        @if(!empty($address['tw']))
                                            <a href="{{$address['tw']}}" class="twitter"><i class="bi bi-twitter"></i></a>
                                        @endif
                                        @if(!empty($address['fb']))
                                            <a href="{{$address['fb']}}" class="facebook"><i class="bi bi-facebook"></i></a>
                                        @endif
                                        @if(!empty($address['in']))
                                            <a href="{{$address['in']}}" class="instagram"><i class="bi bi-instagram"></i></a>
                                        @endif
                                        @if(!empty($address['ln']))
                                            <a href="{{$address['ln']}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>
        </section><!-- End Trainers Section -->

    </main><!-- End #main -->

@endsection
