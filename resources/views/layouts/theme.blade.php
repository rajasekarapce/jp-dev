<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! !empty($title) ? $title : 'Anydegree' !!}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" {{ ! request()->is('payment*')? 'defer' : ''}}></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
	
	<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" >
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!--- Slider-->

	
	
    <script type='text/javascript'>
        /* <![CDATA[ */
        var page_data = {!! pageJsonData() !!};
        /* ]]> */
    </script>
	
	
	
	

</head>
<body class="{{request()->routeIs('home') ? ' home ' : ''}} {{request()->routeIs('job_view') ? ' job-view-page ' : ''}}">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel {{request()->routeIs('home') ? 'transparent-navbar' : ''}}">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('assets/images/logo.png')}}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('jobs_listing')}}">JOBS</a> </li>
					<li class="nav-item"><a class="nav-link" href="{{route('home')}}">PLACEMENTPAPER</a> </li>
					<li class="nav-item"><a class="nav-link" href="{{route('home')}}">COURSES</a> </li>
					<li class="nav-item"><a class="nav-link" href="{{route('home')}}">SERVICES <span class="badge badge-warning">New</span></a> </li>
					<li class="nav-item dropdown">
						<!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  MORE <i class="la la-angle-down"></i>
						</a>
						 <div class="dropdown-menu" >
						  <a class="dropdown-item" href="#">Menu 1</a>
						  <a class="dropdown-item" href="#">Menu 2</a>
						  <a class="dropdown-item" href="#">Menu 3</a>
						</div> -->
					  </li>
					
<!---
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}"><i class="la la-home"></i> @lang('app.home')</a> </li>
                    <?php
                    $header_menu_pages = config('header_menu_pages');
                    ?>
                    @if($header_menu_pages->count() > 0)
                        @foreach($header_menu_pages as $page)
                            <li class="nav-item"><a class="nav-link" href="{{ route('single_page', $page->slug) }}"><i class="la la-link"></i>{{ $page->title }} </a></li>
                        @endforeach
                    @endif

                    <li class="nav-item"><a class="nav-link" href="{{route('pricing')}}"><i class="la la-dollar"></i> @lang('app.pricing')</a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('jobs_listing')}}"><i class="la la-briefcase"></i> @lang('app.jobs')</a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('blog_index')}}"><i class="la la-file-o"></i> @lang('app.blog')</a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact_us')}}"><i class="la la-envelope-o"></i> @lang('app.contact_us')</a> </li>
--->		
			
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
<!---
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white" href="{{route('post_new_job')}}"><i class="la la-save"></i>{{__('app.post_new_job')}} </a>
                    </li>
--->                        
                        @if(null !== Auth::user()) 
                         <li class="nav-item">
                            <a class="nav-link ora" href="{{ route('dashboard') }}"><i class="la la-sign-in"></i> {{ Auth::user()->name }}</a>
                         </li>
						 <li class="nav-item">
                            <a class="nav-link ora" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-pencil-square"></i>{{ __('Logout') }}</a>
                         </li>
                         @else
                         <li class="nav-item">
                            <a class="nav-link ora" href="{{ route('login') }}"><i class="la la-sign-in"></i> {{ __('Login') }}</a>
                         </li>
             <li class="nav-item">
                            <a class="nav-link ora" href="{{ route('new_register') }}"><i class="la la-pencil-square"></i>{{ __('Register') }}</a>
                         </li>
                         @endif
                         @if(null !== Auth::user())
						 <li class="nav-item">
                            <a class="nav-link pin" href="#"><i class="la la-users"></i> For Employer</a>
                         </li>
						 <li class="nav-item">
                            <a class="nav-link pin" href="#"><i class="la la-institution"></i> For Instituitions</a>
                         </li>
                         @else
            <li class="nav-item">
                            <a class="nav-link pin" href="{{ route('login') }}"><i class="la la-users"></i> For Employer</a>
                         </li>
             <li class="nav-item">
                            <a class="nav-link pin" href="{{ route('login') }}"><i class="la la-institution"></i> For Instituitions</a>
                         </li>



                         @endif

                    <!-- Authentication Links -->
<!---
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="la la-sign-in"></i> {{ __('app.login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('new_register'))
                                <a class="nav-link" href="{{ route('new_register') }}"><i class="la la-user-plus"></i> {{ __('app.register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="la la-user"></i> {{ Auth::user()->name }}
                                <span class="badge badge-warning"><i class="la la-briefcase"></i>{{auth()->user()->premium_jobs_balance}}</span>
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('dashboard')}}">{{__('app.dashboard')}} </a>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
-------------->					
                </ul>
            </div>
        </div>
    </nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
    <div class="main-container">
        @yield('content')
    </div>

    <div id="main-footer" class="main-footer bg-foot py-5">

        <div class="container">
            <div class="row">
			
			  <div class="col">
			     <h4 class="mb-3">Job Seekers</h4>
				<ul class="list-unstyled">
					<li><a href="/jobs?">Jobs Search </a></li>
          @if(null == Auth::user())
					<li><a href="{{ route('login') }}">Job Seekers Login </a></li>
          @endif
					<!-- <li><a href="#">Upload Resume</a></li> -->
					<li><a href="#">Career Advice</a></li>
					<li><a href="#">Search Tips</a></li>
					<!-- <li><a href="#">Free Job Alert</a></li> -->
					<!-- <li><a href="#">Find Companies</a></li> -->
					<li><a href="#">Help</a></li>
				</ul>
			  </div>
			  <div class="col">
			     <h4 class="mb-3">Employer</h4>
				<ul class="list-unstyled">
        @if(null == Auth::user())
					<li><a href="{{ route('login') }}">Employer Login</a></li>
					<li><a href="{{route('post_new_job')}}">Job Posting</a></li>
          @endif
					<li><a href="#">Access Resume Database</a></li>
					<li><a href="#">Join Recruiters</a></li>
					<li><a href="#">Advertise with us</a></li>
					<li><a href="#">Research Reports</a></li>
					<!-- <li><a href="#">Buy Online</a></li> -->
				</ul>
			  </div>
			  <div class="col">
			     <h4 class="mb-3">Any Degree</h4>
				<ul class="list-unstyled">
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Career with us</a></li>
					<!-- <li><a href="#">Send Feedback</a></li> -->
					<li><a href="#">Testimonials</a></li>
					<li><a href="#">HTML Sitemap</a></li>
					<li><a href="#">XML Sitemap</a></li>
					<!-- <li><a href="#">Jobs App</a></li> -->
					
				</ul>
			  </div>
			  <div class="col">
			     <h4 class="mb-3">Stay Connected</h4>
				<ul class="list-unstyled">
					<li><a href="#" target="_blank"><i class="la la-facebook"></i> Facebook</a></li>
					<li><a href="#" target="_blank"><i class="la la-twitter"></i> Twitter</a></li>
					<li><a href="#" target="_blank"><i class="la la-linkedin"></i> Linkedin</a></li>
					<li><a href="#" target="_blank"><i class="la la-instagram"></i> Instagram</a></li>
					<li><a href="#" target="_blank"><i class="la la-youtube-play"></i> Youtube</a></li>
				</ul>
			  </div>
			  <div class="col">
			     <h4 class="mb-3">Legal</h4>
				<ul class="list-unstyled">
					<li><a href="#">Security & Fraud</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Be Safe</a></li>
					<li><a href="#">Complaints</a></li>
				</ul>
			  </div>
			
			
			
			
			
<!----			
                <div class="col-md-4">

                    <div class="footer-logo-wrap mb-3">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('assets/images/logo-alt.png')}}" />
                        </a>
                    </div>

                    <div class="footer-menu-wrap">
                        <ul class="list-unstyled">
                            <?php
                            $show_in_footer_menu = config('footer_menu_pages');
                            ?>
                            @if($show_in_footer_menu->count() > 0)
                                @foreach($show_in_footer_menu as $page)
                                    <li><a href="{{ route('single_page', $page->slug) }}">{{ $page->title }} </a></li>
                                @endforeach
                            @endif
                            <li><a href="{{route('contact_us')}}">@lang('app.contact_us')</a> </li>
                        </ul>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="footer-menu-wrap mt-2">
                        <h4 class="mb-3">@lang('app.job_seeker')</h4>

                        <ul class="list-unstyled">
                            <li><a href="{{route('register_job_seeker')}}">@lang('app.create_account')</a> </li>
                            <li><a href="{{route('jobs_listing')}}">@lang('app.search_jobs')</a> </li>
                            <li><a href="{{route('applied_jobs')}}">@lang('app.applied_jobs')</a> </li>
                        </ul>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="footer-menu-wrap  mt-2">
                        <h4 class="mb-3">@lang('app.employer')</h4>

                        <ul class="list-unstyled">
                            <li><a href="{{route('register_employer')}}">@lang('app.create_account')</a> </li>
                            <li><a href="{{route('post_new_job')}}">@lang('app.post_new_job')</a> </li>
                            <li><a href="{{route('pricing')}}">@lang('app.buy_premium_package')</a> </li>
                        </ul>

                    </div>

                </div>
------->

            </div>


            

        </div>

    </div>
	
	
	
                <div class="col-md-12">
                    <div class="footer-copyright-text-wrap text-center mt-4">
                         <!--<p>{!! get_text_tpl(get_option('copyright_text')) !!}</p>--->
						 <p>{!! get_text_tpl(get_option('copyright_text')) !!}</p>
                    </div>
                </div>
          
	
	


</div>



<!-- Scripts -->
@yield('page-js')



<script src="{{ asset('assets/js/main.js') }}" defer></script>

<script>
function defer(method) {
  if (window.jQuery)
    method();
  else
    setTimeout(function() {
      defer(method)
    }, 50);
}
defer(function() {
  (function($) {
    
    function doneResizing() {
      var totalScroll = $('.logo-slider-frame').scrollLeft();
      var itemWidth = $('.logo-slider-item').width( 110);
      var difference = totalScroll % itemWidth;
      if ( difference !== 100 ) {
        $('.logo-slider-frame').animate({
          scrollLeft: '-=' + difference
        }, 500, function() {
          // check arrows
          checkArrows();
        });
      }
    }
    
    function checkArrows() {
      var totalWidth = $('#logo-slider .logo-slider-item').length * $('.logo-slider-item').width();
      var frameWidth = $('.logo-slider-frame').width();
      var itemWidth = $('.logo-slider-item').width(110);
      var totalScroll = $('.logo-slider-frame').scrollLeft();
      
      if ( ((totalWidth - frameWidth) - totalScroll) < itemWidth ) {
        $(".next").css("visibility", "hidden");
      }
      else {
        $(".next").css("visibility", "visible");
      }
      if ( totalScroll < itemWidth ) {
        $(".prev").css("visibility", "hidden");
      }
      else {
        $(".prev").css("visibility", "visible");
      }
    }
    
    $('.arrow').on('click', function() {
      var $this = $(this),
        width = $('.logo-slider-item').width(),
        speed = 500;
      if ($this.hasClass('prev')) {
        $('.logo-slider-frame').animate({
          scrollLeft: '-=' + width
        }, speed, function() {
          // check arrows
          checkArrows();
        });
      } else if ($this.hasClass('next')) {
        $('.logo-slider-frame').animate({
          scrollLeft: '+=' + width
        }, speed, function() {
          // check arrows
          checkArrows();
        });
      }
    }); // end on arrow click
    
    $(window).on("load resize", function() {
      checkArrows();
      $('#logo-slider .logo-slider-item').each(function(i) {
        var $this = $(this),
          left = $this.width() * i;
        $this.css({
          left: left
        })
      }); // end each
    }); // end window resize/load
    
    var resizeId;
    $(window).resize(function() {
        clearTimeout(resizeId);
        resizeId = setTimeout(doneResizing, 500);
    });
    
  })(jQuery); // end function
});
</script>

</body>
</html>
