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
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}"><i class="la la-home"></i> @lang('app.view_site')</a> </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav ml-auto">
                    @if (Auth::user()->user_type == 'employer')
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
            <div class="container">  
              <div class="row">
                
                <div class="col-md-12">
                     <div class="profile-bg shadow2 mt-sm-2 mb-sm-2">
                      <div class="row">
                         <div class="col-lg-2 col-xs-3 col-md-3 padding-none profile-image-block">
                            <div class="user-icon" data-toggle="modal" data-target="#profile-picture-modal" role="button">
                                <div>
                                    @if (Auth::user()->logo)
                                    <img class="profile-image-style" id="profilePictureDisplay" src="{{URL::to('/')}}{{ ('/uploads/logos/'.Auth::user()->logo) }}">
                                    @else
                                    <img class="profile-image-style" id="profilePictureDisplay" src="https://d2zxo3dbbqu73w.cloudfront.net/images/profile_icon.jpg">
                                    @endif
                                </div>
                                <div class="edit-image-upload">
                                @if (Auth::user()->user_type == 'employer')
                                <a href="{{ URL('/dashboard/employer/profile'.'#upload-logo' )}}" >
                                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 20 20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                @else
                                <a href="{{ URL('/dashboard/u/profile/edit'.'#user-image' )}}" >
                                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 20 20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
                                      <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                @endif
                                </div>
                            </div>
                            <div class="padding-top-5 text-center color-fff">{{ Auth::user()->reg_id }}</div>
                            
                        </div>
                            <div class="col-lg-6 col-xs-4 col-md-4 padding-none">
                              <div class="row">
                              <div class="col-md-12 user-details">
                                <div class="full-name font-18 color-f6f6f6 ">
                                    <div class="color-fff display-inline-block">{{Auth::user()->name}}</div>
                                    <div class="margin-left-45 display-inline-block">
                                        <a id="edit-your-profile-link" class="color-f6f6f6" href="{{ route('education_edit') }}" title="Edit/Update your Profile">
                                            <i class="fa fa-edit"></i>
                                          </svg>
                                        </a>
                                    </div>
                                    
                                </div>
                                  <div class="mt-sm-2 color-fff">{{ Auth::user()->course }}</div>   
                              </div>
                              <div class="col-lg-6 user-details">
                                <div class="mt-sm-2 color-fff"><i class=" font-18 la la-calendar"></i>&nbsp; {{ Auth::user()->passedout }} Passout</div>   
                                <div class="mt-sm-2 color-fff"><i class=" font-18 la la-map-marker"></i>&nbsp; {{ Auth::user()->city }}</div>
                              </div>
                              <div class="col-md-6 user-details">
                                <div class="mt-sm-2 color-fff"><i class="la la-phone"></i>&nbsp; {{ Auth::user()->phone }}</div>   
                                <div class="mt-sm-2 color-fff"><i class="la la-envelope"></i>&nbsp; {{ Auth::user()->email }}</div>
                              
                              </div>
                               <div class="col-lg-10 col-xs-5 col-md-5  margin-top-20 margin-left-20 user-details" >
                                <div class="complete_your_profile">
                                    <div class="complete_your_profile_text" style="width: 65%; background-color:#8a2387;"></div>
                                </div>
                                <div><a class="color-fff" href="#" target="_blank">Profile Completion Status <span class="padding-left-4"> 65%</span></a></div>
                                <!-- <div class="profile_complete"><a class="nav-links color-fff" href="#">Complete Your Profile</a></div> -->
                            </div>
                             </div>                              
                            </div> 
                            <div class="col-lg-4 col-xs-5 col-md-5  margin-top-20 margin-left-20" >
                                <div class="pending-box">
                                  <div class="pendig-text">
                                    <h4>{{ $applied_job_count }} Applied Jobs</h4>
                                    <p>Add Resume</p>
                                    <p>Add Qualification</p>
                                    <!-- <p class="text-right "><a href="" class="view-btn">View All</a></p> -->
                                  </div>
                                </div>           
                            </div>           
                           </div>
                     </div>
                </div>
                
                
                <!--col--9-->
                
                
                <!--------------------------------------------------------------------------->
<!--                 
                <div class="col-md-3 padding-none">
                       <div class="card shadow2 mt-sm-2 mb-sm-2">
                         <div class="card-header2">
                            <h5 class="j-title">Subscribe to Job Alert</h5>  
                          </div>
                          <div class="card-body padd14">
                              <small>Click create and then confirm to activate the job alert.</small>
                               <input class="form-control form-control-sm" value="mylsamy@gmail.com">
                              <a href="#" class="nav-link pin text-center mt-sm-2">Create Daily Job Alert</a>
                          </div>
                        </div>
                </div> -->
                        <!---card---->
                        
                        
                <!--col--3-->
                <!--------------------------------------------------------------------------->
                
                
    
             </div> 
            <div class="row">
        
    
    
    
                <div class="col-md-3">
                     
                    @include('layouts.sidebar')

                </div>

                <div class="col-md-6 pl-0">
                    <div class="main-page ">
                    
                      <!-----------------------------
                        <div class="main-page-title mt-3 mb-3 d-flex">
                            <h3 class="flex-grow-1">{!! ! empty($title) ? $title : __('app.dashboard') !!}</h3>

                            <div class="action-btn-group">@yield('title_action_btn_gorup')</div>
                        </div>
                      ------------------------->
                      
                        @include('admin.flash_msg')

                        <div class="main-page-content">
                        
                        
                            @yield('content')
                            
                            
                        </div>

                        <div class="dashboard-footer mb-3">
                            <a href="" target="_blank">Any Degree</a> Version {{config('app.version')}}
                        </div>
                    </div>

                </div>
                <div class="col-md-3 padding-none">             
                        <div class="card shadow2 mt-sm-2 mb-sm-2" id="upload_resume">
                         <div class="card-header2">
                            <h5 class="j-title">Upload Resume</h5>  
                          </div>
                          <div class="card-body padd14">
                              <small>Increase Your chances of getting more Call Letters by Updating your resume frequently.</small>
                              <a href="{{ route('upload_resume') }}" class="nav-link pin text-center mt-sm-2">Upload Your Resume</a>
                          </div>
                        </div>
                        <div class="card shadow2 mt-sm-2 mb-sm-2">
                         <div class="card-header2">
                            <h5 class="j-title">Job Application Status</h5>  
                          </div>
                          <div class="card-body padd14">
                              <small>Upgrade to confirm the Job Applications and become priority applicant.</small>
                              <a href="{{ route('payments') }}" class="nav-link pin text-center mt-sm-2">Upgrade Now</a>
                          </div>
                        </div>
                </div>
            </div>
           </div>
        </div>
    </div>