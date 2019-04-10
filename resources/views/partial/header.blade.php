  @guest
  <header class="site-header">
        <div class="header-bar">
            <div class="container-fluid">
                <div class="row align-items-center lala"  >
                    <div class="col-10 col-lg-4">
                        <h1 class="site-branding flex">
                            <a href="#"><font color="#00FFFF" ><i class="fa fa-moon-o fa-rotate-90"></i>Eventku</font></a>
                        </h1>
                    </div>

                    <div class="col-2 col-lg-8">
                        <nav class="site-navigation">
                              <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div><!-- .hamburger-menu -->
                           

                            <ul>
                                <li><a href="#"><font color="#00FFFF" >HOME</font></a></li>
                                 <li><a href="{{ url('event/layout') }}"><font color="#00FFFF" >EVENTS</font></a></li>
                                <li><a href="#"><font color="#00FFFF" >BLOG</font></a></li>
                                <li><a href="{{ route('login') }}"><font color="#00FFFF" >LOGIN</font></a></li>
                                <li><a href="#"><font color="#00FFFF" >CONTACT</font></a></li>
                                <li><a href="#"><i class="fas fa-search"></i></a></li>
                            </ul><!-- flex -->
                        </nav><!-- .site-navigation -->

                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- container-fluid -->
        </div><!-- header-bar -->
    </header><!-- .site-header -->
    @else
      <header class="site-header">
        <div class="header-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-10 col-lg-4">
                        <h1 class="site-branding flex">
                            <a href="#"><font color="#00FFFF" ><i class="fa fa-moon-o fa-rotate-90"></i>Eventku</font></a>
                        </h1>
                    </div>

                    <div class="col-2 col-lg-8">
                        <nav class="site-navigation">
                         <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div><!-- .hamburger-menu -->                            
                            <ul>
                                <li><a href="#"><font color="#00FFFF" >HOME</font></a></li>
                                 <li><a href="{{ url('event/layout') }}"><font color="#00FFFF" >EVENT</font></a></li>
                               
                               
                            
                                        @if (Auth::user()->role === 'admin')
                                           <li><a href="{{ url('/dashboard') }}"><font color="#00FFFF" >HALAMAN ADMIN</font></a></li>

                                            @else


                                    <li><a href="{{ url('/dashboard') }}"><font color="#00FFFF" >BUAT EVENT</font></a></li>
                                        @endif

                                      <li><a href="{{ url('/profile') }}"><font color="#00FFFF" >WELCOME, {{ Auth::user()->name }}</font></a></li>
                                       <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><font color="#00FFFF" >logout</font></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                             
                                <li><a href="#"><i class="fas fa-search"></i></a></li>
                            </ul><!-- flex -->
                        </nav><!-- .site-navigation -->

                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- container-fluid -->
        </div><!-- header-bar -->
    </header><!-- .site-header -->
    @endguest
       