<!DOCTYPE html>
<html lang="en">
    

<head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <!--Favicon -->
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>

        <!--Bootstrap.min css-->
        <link rel="stylesheet" href="asseta/plugins/bootstrap/css/bootstrap.min.css">

        <!--Icons css-->
        <link rel="stylesheet" href="asseta/css/icons.css">

        <!--Style css-->
        <link rel="stylesheet" href="asseta/css/style.css">

        <!--mCustomScrollbar css-->
        <link rel="stylesheet" href="asseta/plugins/scroll-bar/jquery.mCustomScrollbar.css">

        <!--Sidemenu css-->
        <link rel="stylesheet" href="asseta/plugins/toggle-menu/sidemenu.css">

    </head>

    <body class="bg-lolo" id="bg-default">
        <div id="app">
            <section class="section section-2">
                <div class="container">
                    <div class="row">
                        <div class="single-page single-pageimage construction-bg cover-image " data-image-src="asseta/img/news/cover.jpg">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="wrapper wrapper2">
                                        <form id="login" class="card-body" method="POST" action="{{ route('login') }}" tabindex="500" rol="form">
                                                    {{ csrf_field() }}
                                            <h3>Login</h3>
                                            <div class="mail">
                                                   <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                 <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                
                                            </div>
                                            <div class="passwd">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                                 <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                
                                            </div>
                                            <div class="submit">
                                                <button type="submit" class="btn btn-primary">
                                   Login
                                </button>

                                
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?'
                                    </a>
                               
                                               
                                            </div
                                            <p class="text-dark mb-0">Don't have account?<a href="{{ url('/register') }}" class="text-primary ml-1">Sign UP</a></p>
                                                <a class="btn  btn-social btn-facebook btn-block" href="{{ url('auth/facebook') }}"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
                                            <a class="btn  btn-social btn-google btn-block mt-2" href="{{ url('auth/google') }}"><i class="fa fa-google-plus"></i> Sign in with Google</a>
                                        </form>
                                     
                                        
                                  
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                  
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </section>
        </div>

        <!--Jquery.min js-->
        <script src="asseta/js/jquery.min.js"></script>

        <!--popper js-->
        <script src="asseta/js/popper.js"></script>

        <!--Tooltip js-->
        <script src="asseta/js/tooltip.js"></script>

        <!--Bootstrap.min js-->
        <script src="asseta/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!--Jquery.nicescroll.min js-->
        <script src="asseta/plugins/nicescroll/jquery.nicescroll.min.js"></script>

        <!--Scroll-up-bar.min js-->
        <script src="asseta/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
        
        <script src="asseta/js/moment.min.js"></script>

        <!--mCustomScrollbar js-->
        <script src="asseta/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

        <!--Sidemenu js-->
        <script src="asseta/plugins/toggle-menu/sidemenu.js"></script>

        <!--Scripts js-->
        <script src="asseta/js/scripts.js"></script>

    </body>

</html>