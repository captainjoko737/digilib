@extends('layouts.app')

@section('content')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            @foreach ($slider as $key => $value)
                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url({{ url($value['C_DASHBOARD_IMAGE'])}}); ">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h4 data-animation="fadeInUp" data-delay="100ms" style="color:#000000;">{{ $value['C_DASHBOARD_SUBTITLE'] }}</h4>
                                    <h2 data-animation="fadeInUp" data-delay="400ms" style="color:black;">{{ $value['C_DASHBOARD_TITLE'] }}</h2>
                                    <!-- <a href="#" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-agenda-1"></i>
                                    <h5>@lang("menu.news")</h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### -->

    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                @foreach ($news as $key => $value)
                    <!-- Single Top Popular Course -->
                    <div class="col-12 col-lg-4">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                            <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                <div class="blog-post-thumb mb-50">
                                    <img src="{{ asset($value->C_NEWS_IMAGE) }}" alt="">
                                </div>
                                <a href="#" class="post-title">{{ $value->C_NEWS_TITLE }}</a>
                                <div class="post-meta">
                                    <p>{{ $value->C_NEWS_SUBTITLE }}</p>
                                </div>
                                <p class="text-elipsis-home">{{ $value->C_NEWS_DESCRIPTION }}</p>
                                <button type="button" class="btn academy-btn btn-sm mt-15" data-toggle="modal" data-target="#{{ $value->C_NEWS_ID }}">Read More</button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="{{ $value->C_NEWS_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $value->C_NEWS_TITLE }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="blog-post-thumb mb-50">
                                    <img src="{{ asset($value->C_NEWS_IMAGE) }}" alt="">
                                </div>
                                <div class="post-meta">
                                    <p>By <a href="#">{{ $value->C_NEWS_SUBTITLE }}</a></p>
                                </div>
                                <p>{{ $value->C_NEWS_DESCRIPTION }}</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="800ms">
                        <a href="{{ route('news') }}" class="btn academy-btn">See More</a>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(/img/dashboard-img/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                        
                        <h3>@lang("menu.agenda")</h3>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Testimonials Area -->
                @foreach ($agenda as $key => $value)
                    <div class="col-12 col-md-6">
                        <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                            
                            <div class="testimonial-content">
                                <h5>{{ $value['C_AGENDA_TITLE'] }}</h5>
                                <p class="text">{{ $value['C_AGENDA_DESCRIPTION'] }}</p>
                                <h6><span>{{ $value['C_AGENDA_SUBTITLE'] }}</span></h6>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="800ms">
                        <a href="{{ route('agenda') }}" class="btn academy-btn">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Testimonials Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span></span>
                        <h3>@lang("menu.job_vacancy")</h3>
                    </div>
                </div>
            </div>
            <div class="row">
               
                <!-- Single Top Popular Course -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="single-blog-post">
                            <div class="mb-50"><center><img src="img/clients-img/partner-2.png" alt=""></center></div>
                            <h5>Business for begginers</h5>
                            <div class="post-meta">
                                <p>By Simon Smith   |  March 18, 2018</p>
                            </div>
                            <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod.</p>
                            <a href="#" class="btn academy-btn btn-sm">See More</a>
                        </div>
                    </div>
                </div>

                <!-- Single Top Popular Course -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="single-blog-post">
                            <div class="mb-50"><center><img src="img/clients-img/partner-1.png" alt=""></center></div>
                            <h5>Business for begginers</h5>
                            <div class="post-meta">
                                <p>By Simon Smith   |  March 18, 2018</p>
                            </div>
                            <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod.</p>
                            <a href="#" class="btn academy-btn btn-sm">See More</a>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- ##### Top Popular Courses Area End ##### -->

    <!-- ##### Partner Area Start ##### -->
    <div class="partner-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                        <a href="#"><img src="img/clients-img/partner-1.png" alt=""></a>
                        <a href="#"><img src="img/clients-img/partner-2.png" alt=""></a>
                        <a href="#"><img src="img/clients-img/partner-3.png" alt=""></a>
                        <a href="#"><img src="img/clients-img/partner-4.png" alt=""></a>
                        <a href="#"><img src="img/clients-img/partner-5.png" alt=""></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Partner Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <!-- <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>Do you want to enrole at our Academy? Get in touch!</h3>
                        <a href="#" class="btn academy-btn">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ##### CTA Area End ##### -->
@endsection
    