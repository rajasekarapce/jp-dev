<div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{asset('assets/images/logo.png')}}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a target="_blank" class="nav-link" href="{{route('home')}}"><i class="la la-home"></i> @lang('app.view_site')</a> </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::user()->user_type != "user")    
                        <li class="nav-item">
                            <a class="nav-link btn btn-success text-white" href="{{route('post_new_job')}}"><i class="la la-save"></i>{{__('app.post_new_job')}} </a>
                        </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                <span class="badge badge-warning"><i class="la la-briefcase"></i>{{auth()->user()->premium_jobs_balance}}</span>
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

                    </ul>
                </div>
            </div>
        </nav>

        <div id="main-container" class="main-container">

            <div class="row">
                <div class="col-md-3">

                    @include('layouts.sidebar')
                    

                </div>

                <div class="col-md-9">
                    <div class="main-page pr-4">

                        <div class="main-page-title mt-3 mb-3 d-flex">
                            <h3 class="flex-grow-1">{!! ! empty($title) ? $title : __('app.dashboard') !!}</h3>

                            <div class="action-btn-group">@yield('title_action_btn_gorup')</div>
                        </div>

                        @include('admin.flash_msg')

                        <div class="main-page-content p-4 mb-4">
                            @yield('content')
                        </div>

                        <div class="dashboard-footer mb-3">
                            JobFair Version {{config('app.version')}}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>