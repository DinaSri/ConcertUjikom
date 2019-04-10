@extends('layouts.front')
@section('scripts')


<script>
    $.get(apiUrl+'event', function (data) {
        $.each(data.data, function (index, value) {
            $('#conto').append(
                '<div class="col-md-4">'+

                   '<div class="next-event-slider-wrap">'+
                '<div class="swiper-container next-event-slider">'+
                '<div class="swiper-wrapper">'+

                '<div class="swiper-slide">'+

                    '<div class="next-event-content">'+
                   '<figure class="featured-image">'+
                                  '<img src="'+imageUrl+'event/'+''+value.image+'" alt="" height="230" width="100%" style="border-radius: 3% 3% 0px 0px">'+
                                 '<a href="'+support+'detail/'+value.id+'" class="entry-content flex flex-column justify-content-center align-items-center">'+
                                 '<h3>'+value.title+'</h3>'+
                                   '<p>'+value.desc+'</p>'+
                            '</a>'+
                            '</figure>'+
                            
                   
                   
                        
              
                       
                       
                   
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

@endsection
@section('content')

<div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-10">
                    <div class="entry-header">
                       
                        <h2>Best Event!</h2>
                    </div><!-- .entry-header -->

               
                </div><!-- .col-12 -->
            </div><!-- row -->

        </div><!-- .container -->
    </div><!-- .hero-content -->

    <div class="content-section">
           

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