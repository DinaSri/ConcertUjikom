@extends('layouts.front')
@section('scripts')
<script>
    $.get(apiUrl+'event', function (data) {
        $.each(data.data, function (index, value) {
            $('#content').append(
                '<div class="next-event-slider-wrap">'+
                '<div class="swiper-container next-event-slider">'+
                '<div class="swiper-wrapper">'+

                '<div class="swiper-slide">'+
                '<div class="next-event-content">'+
                    '<figure class="featured-image">'+
                                  '<img src="'+imageUrl+'event/'+''+value.image+'" alt="" height="230" width="100%" style="border-radius: 3% 3% 0px 0px">'+
                                 '<a href="{{ url('/detail') }}" class="entry-content flex flex-column justify-content-center align-items-center">'+
                                 '<h3>'+value.title+'</h3>'+
                                   '<p>'+value.desc+'</p>'+
                            '</a>'+
                            '</figure>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="swiper-button-next">'+
                            '<img src="front/images/button.png" alt="" >'+
                            '</div>'+
                            '</div>'
            );
        })
    });
</script>
<script>
    $.get(apiUrl+'event', function (data) {
        $.each(data.data, function (index, value) {
            $('#event').append(
                '<div class="home-page-last-news-wrap">'+
                '<div class="row">'+
                '<div class="col-12 col-md-6">'+
                    '<figure class="featured-image">'+
                                 '<a href="{{ url('/detail') }}">'+
                                   '<img src="'+imageUrl+'event/'+''+value.image+'" alt="" height="230" width="100%" style="border-radius: 3% 3% 0px 0px">'+
                            '</a>'+
                            '</figure>'+

                              '<div class="content-wrapper">'+
                                '<div class="entry-content">'+
                                    '<div class="entry-header">'+
                                        '<h2>'+value.title+'</h2>'+
                                    '</div>'+

                                     '<div class="entry-description">'+
                                         '<p>'+value.desc+'</p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                '</div>'+
                '</div>'
                         
            );
        })
    });
</script>
<script>
    $.get(apiUrl+'event', function (data) {
        $.each(data.data, function (index, value) {
            $('#conto').append(
                '<div class="col-md-4">'+
                '<div class="causes">'+
                    '<div class="causes-img">'+
                        '<a href="'+support+'detail/'+value.id+'">'+
                                 '<img src="'+imageUrl+'event/'+''+value.image+'" alt="" height="230" width="100%" style="border-radius: 3% 3% 0px 0px">'+
                            '</a>'+
                    '</div>'+
                   
                    '<div class="causes-content">'+
                        '<h3><a href="'+support+'detail/'+value.id+'">'+value.title+'</a></h3>'+
                        '<p>'+value.desc+'</p>'+
                       
                    '</div>'+
                '</div>'+
            '</div>'
            );
        })
    });
</script>
@endsection
@section('content')

<div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-10">
                    <div class="entry-header">
                        <h3><font color="#00FFFF" style="animation-direction: 48">We Have the Best Events </font></h3>
                        <h2>Get Your Ticket Now!</h2>
                    </div><!-- .entry-header -->

                    <div class="countdown flex flex-wrap justify-content-between" data-date="2018/06/06">
                        <div class="countdown-holder">
                            <div class="dday"></div>
                            <label>Days</label>
                        </div><!-- .countdown-holder -->

                        <div class="countdown-holder">
                            <div class="dhour"></div>
                            <label>Hours</label>
                        </div><!-- .countdown-holder -->

                        <div class="countdown-holder">
                            <div class="dmin"></div>
                            <label>Minutes</label>
                        </div><!-- .countdown-holder -->

                        <div class="countdown-holder">
                            <div class="dsec"></div>
                            <label>Seconds</label>
                        </div><!-- .countdown-holder -->
                    </div><!-- .countdown -->
                </div><!-- .col-12 -->
            </div><!-- row -->

            <div class="row">
                <div class="col-12 ">
                    <div class="entry-footer">
                        <a href="#" class="btn">Detail Tickets</a>
                        <a href="#" class="btn current">See Lineup</a>
                    </div>
                </div>
            </div>
        </div><!-- .container -->
    </div><!-- .hero-content -->

    <!-- <div class="content-section"> -->
        <!-- <div class="container">
            <div class="row">
                <div class="col-12"> -->
                    <!-- <div class="lineup-artists-headline">
                        <div class="entry-title">
                            <p>JUST THE BEST</p>
                            <h2>The Lineup Artists-Headliners</h2> -->
                        <!-- </div> --><!-- entry-title -->

                        <!-- <div class="lineup-artists">
                            <div class="lineup-artists-wrap flex flex-wrap">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/black-chick.jpg" alt=""> </a> -->
                                <!-- </figure> --><!-- featured-image -->

                                <!-- <div class="lineup-artists-description">
                                    <div class="lineup-artists-description-container">
                                        <div class="entry-title">
                                            Jamila Williams -->
                                       <!--  </div> --><!-- entry-title -->

                                        <!-- <div class="entry-content">
                                            <p>Quisque at erat eu libero consequat tempus. Quisque mole stie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum. </p>
                                        </div> --><!-- entry-content -->

                                       <!--  <div class="box-link">
                                            <a href=""><img src="front/images/box.jpg" alt=""></a>
                                        </div> --><!-- box-link -->
                                    <!-- </div> --><!-- lineup-artists-description-container -->
                                <!-- </div> --><!-- lineup-artists-description -->
                            <!-- </div> --><!-- lineup-artists-wrap -->

                           <!--  <div class="lineup-artists-wrap flex flex-wrap">
                                <div class="lineup-artists-description">
                                    <figure class="featured-image d-md-none">
                                        <a href="#"> <img src="front/images/mathew-kane.jpg" alt=""> </a>
                                    </figure -->><!-- featured-image -->

                                  <!--   <div class="lineup-artists-description-container">
                                        <div class="entry-title">
                                            Sandra Superstar
                                        </div> --><!-- entry-title -->

                                       <!--  <div class="entry-content">
                                            <p>Quisque at erat eu libero consequat tempus. Quisque mole stie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum. </p>
                                        </div> --><!-- entry-content -->

                                       <!--  <div class="box-link">
                                            <a href="#"><img src="front/images/box.jpg" alt=""></a>
                                        </div> --><!-- box-link -->
                                    <!-- </div> --><!-- lineup-artists-description-container -->
                                <!-- </div> --><!-- lineup-artists-description -->

                               <!--  <figure class="featured-image d-none d-md-block">
                                    <a href="#"> <img src="front/images/mathew-kane.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->
                            <!-- </div> --><!-- lineup-artists-wrap -->

                           <!--  <div class="lineup-artists-wrap flex flex-wrap">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/eric-ward.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                               <!--  <div class="lineup-artists-description">
                                    <div class="lineup-artists-description-container">
                                        <div class="entry-title">
                                            DJ Crazyhead
                                        </div> --><!-- entry-title -->

                                       <!--  <div class="entry-content">
                                            <p>Quisque at erat eu libero consequat tempus. Quisque mole stie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum. </p>
                                        </div> --><!-- entry-content -->

                                        <!-- <div class="box-link">
                                            <a href="#"> <img src="front/images/box.jpg" alt=""></a>
                                        </div> box-link -->
                                    <!-- </div> --><!-- lineup-artists-description-container -->
                                <!-- </div> --><!-- lineup-artists-description -->
                            <!-- </div> --><!-- lineup-artists-wrap -->
                        <!-- </div> --><!-- lineup-artists -->
                    <!-- </div> --><!-- lineup-artists-headline -->
                <!-- </div> --><!-- col-12 -->
            <!-- </div> --><!-- row --> 

           <!--  <div class="row">
                <div class="col-12">
                    <div class="the-complete-lineup">
                        <div class="entry-title">
                            <p>JUST THE BEST</p>
                            <h2>The Complete Lineup</h2>
                        </div> --><!-- entry-title -->

                       <!--  <div class="row the-complete-lineup-artists">
                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-1.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                                <!-- <h2>Miska Smith</h2>
                            </div> --><!-- artist-single -->

                            <!-- <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-2.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                               <!--  <h2>Hayley Down</h2>
                            </div> --><!-- artist-single -->

                            <!-- <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-3.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                                <!-- <h2>The Band Song</h2>
                            </div> --><!-- artist-single -->

                            <!-- <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-4.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

<!--                                 <h2>Pink Machine</h2>
                            </div> --><!-- artist-single -->

                            <!-- <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-5.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                                <!-- <h2>Brasil Band</h2>
                            </div> --><!-- artist-single -->

                            <!-- <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-6.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                                <!-- <h2>Mickey</h2>
                            </div> --><!-- artist-single -->

                           <!--  <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-7.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                                <!-- <h2>DJ Girl</h2>
                            </div> --><!-- artist-single -->

                           <!--  <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="front/images/image-8.jpg" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="front/images/box.jpg" alt=""> </a>
                                </figure> --><!-- featured-image -->

                                <!-- <h2>Stan Smith</h2>
                            </div> --><!-- artist-single -->
                        <!-- </div> --><!-- the-complete-lineup-artists -->

                      <!--   <div class="row justify-content-center">
                            <div class="see-complete-lineup">
                                <div class="entry-footer">
                                    <a href="#" class="btn">See all lineup</a>
                                </div>
                            </div>
                        </div>
                    </div> --><!-- the-complete-lineup -->
               <!--  </div> --><!-- col-12 -->
            <!-- </div> --><!-- row -->
        </div><!-- container -->


    

        <div class="home-page-last-news">
            <div class="container">
                <div class="header">
                    <div class="entry-title">
                        <p>JUST THE BEST</p>
                        <h2>Our Last Events</h2>
                    </div><!-- entry-title -->
                </div><!-- header -->

              <div id="conto">
               </div>
            </div><!-- container -->
        </div><!-- home-page-last-news -->
    </div>

@endsection