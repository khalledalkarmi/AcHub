@extends('master')

@section('content')

    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach($courses as $c)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                <img src="storage/{{$c['img']}}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{$c['category']}}</h4>
                                        <p class="price">${{$c['price']}}</p>
                                    </div>

                                    <h3><a href="/course-details/{{$c['id']}}">{{$c['title']}}</a></h3>
                                    <p>{{$c['desc']}}</p>
                                    @php
                                        $trainer = \App\Models\User::find($c['user_id'])
                                    @endphp
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="storage/{{$trainer['profile_img']}}" class="img-fluid" alt="">
                                            <span>{{$trainer['name']}}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bx bx-user"></i>&nbsp;{{$c['seats']}}&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Course Item-->
                    @endforeach

                </div>

            </div>
        </section><!-- End Courses Section -->

    </main><!-- End #main -->
@endsection
