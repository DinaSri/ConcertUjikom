<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Concert</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url ('front/css/bootstrap.min.css')}}">
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url ('front/css/fontawesome-all.min.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ url ('front/css/swiper.min.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url ('front/style1.css')}}">

    <!-- CSS PROFILE -->
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="{{ url ('front/css/jquery.mCustomScrollbar.css')}}">
        <link rel="stylesheet" href="{{ url ('front/css/icons.css')}}">
        <link rel="stylesheet" href="{{ url ('front/css/style.css')}}">
        <link rel="stylesheet" href="{{ url ('front/css/sidemenu.css')}}">
        <link rel="stylesheet" href="{{ url ('front/css/morris.css')}}">

</head>

<body>
        @include('partial.header')



    <!-- .hero-content -->

      @yield('content')

 @include('partial.sitefooter')


    <script type='text/javascript' src="{{ url ('front/js/jquery.js')}}"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type='text/javascript' src="{{ url ('front/js/bootstrap.min.js')}}"></script>

    <script type='text/javascript' src="{{ url ('front/js/masonry.pkgd.min.js')}}"></script>


    <script type='text/javascript' src="{{ url ('front/js/jquery.collapsible.min.js')}}"></script>

    <script type='text/javascript' src="{{ url ('front/js/swiper.min.js')}}"></script>

    <script type='text/javascript' src="{{ url ('front/js/jquery.countdown.min.js')}}"></script>
    <script type='text/javascript' src="{{ url ('front/js/circle-progress.min.js')}}"></script>
    <script type='text/javascript' src="{{ url ('front/js/jquery.countTo.min.js')}}"></script>
    <script type='text/javascript' src="{{ url ('front/js/custom.js')}}"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <!-- js tambahan -->
      <script src="{{ url ('front/js/jquery.min.js')}}"></script>

      <script src="{{ url ('front/js/popper.js')}}"></script>

     <script src="{{ url ('front/js/tooltip.js')}}"></script>

     <script src="{{ url ('front/js/jquery.nicescroll.min.js')}}"></script>

     <script src="{{ url ('front/js/scroll-up-bar.min.js')}}"></script>

    <script src="{{ url ('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script src="{{ url ('front/js/sidemenu.js')}}"></script>

    <script src="{{ url ('front/js/scripts.js')}}"></script>





           <script>
            var support = 'http://localhost:8080/';
        var apiUrl = 'http://127.0.0.1:8000/api/';
        var imageUrl = 'http://127.0.0.1:8000/assets/images/'
    </script>
  <script>
       
    </script>

  
  
    @yield('scripts')
</body>
</html>
