@extends('layouts.theme')

@section('content')

    <div class="home-hero-section">



        <div class="job-search-bar">

            <div class="container">
<!--               <div class="row">
                    <div class="col-md-8">
                        <h1>Find the job that you deserve</h1>
                        <p class="mt-4 mb-4 job-search-sub-text">More than 3000+ trusted live jobs available from 500+ different employer, <br /> and agents on this website to take your career next level</p>
                    </div>
                </div>
--->
                <div class="row ">
                    <div class="col-md-9">

<!-- 					  
					  <form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                            <div class="form-row">
                                <div class="col-auto">
                                    <input type="text" name="q" class="form-control mb-2" style="min-width: 300px;" placeholder="@lang('app.job_title_placeholder')">
									<input type="text" name="q" class="form-control mb-2" style="min-width: 300px;" placeholder="@lang('app.job_title_placeholder')">
                                    <input type="text" name="location" class="form-control" style="min-width: 300px;"  placeholder="@lang('app.job_location_placeholder')">
                                    <button type="submit" class="btn btn-success mb-2"><i class="la la-search"></i> @lang('app.search') @lang('app.job')</button>
                                </div>
                            </div>
                        </form>
--->					
					
					
                        <form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                            <div class="form-row">
                                <div class="col-auto">
                                    <input type="text" name="q" class="form-control shadow2 mb-2" style="min-width: 300px;" placeholder="@lang('app.job_title_placeholder')">
									<select class="form-control shadow2 mb-2" style="min-width: 200px;" placeholder="Select Qualification">
									  <option>Select Qualification</option>
									  <option>BA</option>
									  <option>BSC</option>
									  <option>BCOM</option>
									  <option>MA</option>
									  <option>MSC</option>
									</select>
                                    <input type="text" name="location" class="form-control shadow2" style="min-width: 200px;"  placeholder="Enter Location">
                                    <button type="submit" class="btn btn-find shadow2 mb-2"><i class="la la-search"></i> @lang('app.search')</button>
                                </div>
                            </div>
                        </form>
						<div class="float-right mr-15"><a class="advance-ser" href="#">Advance Search</a></div>

                    </div><!--col-9-->
					
					<div class="col-md-3">
					    <div class="btn-group shadow2 mtop-20" role="group" aria-label="Basic example">
						  <div  class="upleft" ><i class=" font36 la la-upload"></i></div>
						  <div  class="upright"><b>UPLOAD RESUME</b><br><small> We will create your Profile</small></div>
						</div>
					</div><!--col-3-->
				
                </div>
            </div>
        </div>
	
    </div>
	
	    <div class="nav-bot">
		    <div class="container">
				<ul class="nav">
				  <li class="nav-item">
					<a class="nav-link" href="#">All Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">Software Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">Govt Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link " href="#">Walkin Jobs <span class="badge badge-warning">New</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">MBA Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">BANK Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">BPO Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link " href="#">Part time Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">BANK Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#">Finance Jobs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link " href="#">Defence Jobs</a>
				  </li>
				   <li class="nav-item">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					More<i class="la la-angle-down"></i></a>
					<div class="dropdown-menu dropdown-menu-right" >
					  <a class="dropdown-item" href="#">Menu 1</a>
					  <a class="dropdown-item" href="#">Menu 2</a>
					  <a class="dropdown-item" href="#">Menu 3</a>
					</div>
				  </li>
				</ul>
			 </div>	
	    </div>
		
		<div class="container mt20">
                <div class="row">
                     <div class="col-md-9">
					 
					   <div class="card shadow2 mb20">
					     <div class="card-header">
							<h4 class="j-title">Companies Hiring</h4>  
						  </div>
						  <div class="card-body">
							   
							  <div id="logo-slider">
								  <button class='arrow prev btn btn-slide'></button>
								  <button class='arrow next btn btn-slide'></button>
								  <div class="logo-slider-frame">
									
									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										  <img src="{{asset('assets/images/c-logo1.jpg')}}" />
									  </div>
									</div>

									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										  <img src="{{asset('assets/images/c-logo2.jpg')}}" />
									  </div>
									</div>

									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										  <img src="{{asset('assets/images/c-logo3.jpg')}}" />
									  </div>
									</div>


									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										 <img src="{{asset('assets/images/c-logo4.jpg')}}" />
									  </div>
									</div>

									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										  <img src="{{asset('assets/images/c-logo5.jpg')}}" />
									  </div>
									</div>

									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										  <img src="{{asset('assets/images/c-logo6.jpg')}}" />
									  </div>
									</div>
									
									<div class="logo-slider-item">
									  <div class="logo-slider-inset">
										  <img src="{{asset('assets/images/c-logo7.jpg')}}" />
									  </div>
									</div>
									
								  </div>
								</div>
							  
						  </div>
						</div>
					 
			<!------------------------Hiring end--------------------------------->
			
			         <div class="card shadow2 mb20">
					     <div class="card-header">
							<h4 class="j-title">Latest Jobs 
							 <a type="button" href="{{route('jobs_listing')}}" class="btn btn-sm2 float-right">View All <i class="la la-angle-right"></i></a>
							</h4>  
						  </div>
						  @if($regular_jobs->count())
						  <div class="card-body ">   
						     <div class="row">
						     	 @foreach($regular_jobs as $regular_job)
							    <div class="col-md-4 jlist"><a href="{{route('job_view', $regular_job->job_slug)}}">{!! $regular_job->job_title !!}</a></div>
								@endforeach
								
						     </div>
                          </div>
                          @endif
					  </div>	
			<!------------------------Latest jobs end--------------------------------->
			

                      <!-- <div class="card shadow2 mb20">
					     <div class="card-header">
							<h4 class="j-title">Walkin Jobs <span class="badge badge-danger">New</span>
							   <a type="button" href="{{route('jobs_listing')}}" class="btn btn-sm2 float-right">View All <i class="la la-angle-right"></i></a>
							</h4>  
						  </div>
						  <div class="card-body">   
						      <marquee id="scroll_news" style="padding: 5px;" behavior="scroll" scroscrollamount="10" loop="infinite" onmouseover="this.stop();" onmouseout="this.start();">
							    <div class="walkin"> <a href="">Walkin Jobs in Bangalore</a></div>
								<div class="walkin"> <a href="">Walkin Jobs in Delhi</a></div>
								<div class="walkin"> <a href="">Walkin Jobs in Noida</a></div>
								<div class="walkin"> <a href="">Walkin Jobs in Mumbai</a></div>
								<div class="walkin"> <a href="">Walkin Jobs in Kolkata</a></div>
								<div class="walkin"> <a href="">Walkin Jobs in Gurgaon</a></div>
								<div class="walkin"> <a href="">Walkin Jobs in Chennai</a></div>
							  </marquee>
                          </div>
					  </div> -->	  
			<!------------------------Walkin Jobs end--------------------------------->
			         <div class="card shadow2 mb20">
					     <div class="card-header">
							<h4 class="j-title">Job By Category
							   <a type="button" href="{{route('jobs_listing')}}" class="btn btn-sm2 float-right">View All <i class="la la-angle-right"></i></a>
							</h4>  
						  </div>
                                	@if($categories->count())
						  <div class="card-body">   
                                <div class="row">
                                	@foreach($categories as $category)
									<div class="col-md-4 jlist"><a href="{{route('jobs_listing', ['category' => $category->id])}}">{{$category->category_name}}</a></div>
									@endforeach
									
						        </div>
                          </div>
                          @endif
					  </div>	  
			<!------------------------Walkin Jobs end--------------------------------->
			<!-- <div class="card shadow2 mb20">
					     <div class="card-header">
							<h4 class="j-title">Job By Company
							   <a type="button" href="#" class="btn btn-sm2 float-right">View All <i class="la la-angle-right"></i></a>
							</h4>  
						  </div>
						  <div class="card-body">   
                                <div class="row">
									<div class="col-md-4 jlist"><a href="#">HAL Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">IBPS Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">BEL Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">SBI Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">AAI Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">Air India Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">BSNL Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">UPPSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">TNPSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">RPSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">MPPSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">SSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">UPSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">Railway Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">Indian Navy Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">Indian Army recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">Indian Air Force Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">DRDO recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">FCI Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">UPSSSC Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">HAL Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">IBPS Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">BEL Recruitment</a></div>
									<div class="col-md-4 jlist"><a href="#">SBI Recruitment</a></div>
						        </div>
                          </div>
					  </div> -->	  
			<!------------------------Job By Company--end------------------------------->
			
			
			<div class="card shadow2 mb20">
					     <div class="card-header">
							<h4 class="j-title">@lang('app.premium_jobs')
							   <a type="button" href="{{route('jobs_listing')}}" class="btn btn-sm2 float-right">View All <i class="la la-angle-right"></i></a>
							</h4>  
						  </div>
						  @if($premium_jobs->count())
						  <div class="card-body">   
                                <div class="row">
                                	@foreach($premium_jobs as $job)
									<div class="col-md-4 jlist"><a href="{{route('jobs_by_employer', $job->employer->company_slug)}}">{!! $job->job_title !!}</a></div>
									@endforeach
						        </div>
                          </div>
                          @endif
					  </div>	  
			<!------------------------Jobs by Designation end--------------------------------->
			<div class="card shadow2 mb20">

						  <div class="card-body app-bg">   
                                <div class="row">
									<div class="col-md-4 offset-md-1">
									   <img class="appimg" src="{{asset('assets/images/app.png')}}" />
									</div>
									<div class="col-md-7 text-center">
									   <h1><b>Speed up your Job Search<br> with Our  Free App</b></h1>
									   <a href="https://play.google.com/store?hl=en" target="_blank"><img src="{{asset('assets/images/store1.png')}}" /></a>
									   <a href="https://play.google.com/store?hl=en" target="_blank"><img src="{{asset('assets/images/store1.png')}}" /></a>
									</div>
									
						        </div>
                          </div>
					  </div>	  
			<!------------------------Jobs by Designation end--------------------------------->
			
			
					 
	                 </div><!--col-9-->
					 <div class="col-md-3">
					     <div class="ad"><img src="{{asset('assets/images/ad1.jpg')}}" /></div>
						 <div class="ad"><img src="{{asset('assets/images/ad2.jpg')}}" /></div>
						 <div class="ad"><img src="{{asset('assets/images/ad3.jpg')}}" /></div>
						 <div class="ad"><img src="{{asset('assets/images/ad4.jpg')}}" /></div>
						 <div class="ad"><img src="{{asset('assets/images/ad5.jpg')}}" /></div>
						 <div class="ad"><img src="{{asset('assets/images/ad6.jpg')}}" /></div>
	                 </div><!--col-3-->
                </div>
		</div><!-----container end------->




        <div class="container mt20">
		 <div class=" mb20">
			<div class="row">
				<div class="col-md-12">
				   <p class="font12"><b>Jobs:</b> If you are interested in looking for a job after your degree, here is the chance to find yourself a job... Here you can find government as well as private jobs in the field. Be it mechanical engineering jobs, civil engineering jobs, electrical engineering jobs, biotechnology jobs, B.Tech jobs, MCA Jobs etc. Get the top Jobs for Graduates, with an extensive list of all graduate jobs online. Freshersworld is one of the Top Fresher job sites in India, with over 1000 companies listing jobs online. In the field of commerce, we have chartered accountant jobs, company secretary jobs. Apart from CA jobs we have BBA jobs, government jobs for MBA, supply chain management jobs, jobs for B.Com graduates, diploma jobs etc. Supply chain management jobs and government jobs for MBA are also listed here. Specially, there are jobs for Graduates in Major cities Including Mumbai, Bangalore, Hyderabad, Delhi Chennai and more. Freshers applying for the best jobs can improve their chances by taking our placement tests. Freshersworld is the number one job site for Freshers in India. We have jobs in across all fields including management, BPO, Engineering, medical and research field as well. There are pharmacy jobs, veterinary jobs, MSc chemistry jobs, testing jobs and lab technician jobs to name a few. Search and apply for jobs for freshers and find the latest jobs online.</p>
				   <p class="font12"><b>Online Job Portal for Freshers in India:</b> Any degree is one of the best popular job sites in India, always help jobseeker mainly freshers to find latest jobs in accordance with the qualification in all possible fields like Govt, Private, Engineering, IT, Bank, Defence etc. As a leading job portal, once freshers register with us we provide free job alert and send mailers to candidates and helps to find best job opportunities in their respective fields of expertise. Freshersworld is the best website for freshers who just completed their education and looking for job, as a top online job portal we act as medium to connect freshers with recruiters and employers and help them to find their suitable jobs according to their profession and educational qualification.</p>
				   <p class="font12"><b>No.1 Job sites in India:</b> Any degree is one of the best job portals for freshers, offers opportunities to trained and experienced professionals, useful if you are a fresher who is searching for a job. Helps Jobseekers to connect with the right people and let Freshers to get a job on demand lines in the industry as per your choice. Freshersworld is the most popular sites for freshers and user reviews are outstanding when compared to other job sites in India. Now Freshersworld become largest online job portal for freshers, has the biggest network of clients and companies in all possible fields. We first came in the year 2006 and has been accredited as being the leading Freshers job site in India by reviews and ratings.</p>
				</div>
			</div>
		 </div>
        </div> <!-----container end------->


		
<!----
   

    @if($premium_jobs->count())
        <div class="premium-jobs-wrap pb-5 pt-5">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">@lang('app.premium_jobs')</h4>
                    </div>
                </div>

                <div class="row">
                    @foreach($premium_jobs as $job)
                        <div class="col-md-4 mb-3">
                            <div class="premium-job-box p-3 bg-white box-shadow">

                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="premium-job-logo">
                                            <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}">
                                                <img src="{{$job->employer->logo_url}}" class="img-fluid" />
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-6">

                                        <p class="job-title">
                                            <a href="{{route('job_view', $job->job_slug)}}">{!! $job->job_title !!}</a>
                                        </p>

                                        <p class="text-muted m-0">
                                            <a href="{{route('jobs_by_employer', $job->employer->company_slug)}}" class="text-muted">
                                                {{$job->employer->company}}
                                            </a>
                                        </p>

                                        <p class="text-muted m-0">
                                            <i class="la la-map-marker"></i>
                                            @if($job->city_name)
                                                {!! $job->city_name !!},
                                            @endif
                                            @if($job->state_name)
                                                {!! $job->state_name !!},
                                            @endif
                                            @if($job->state_name)
                                                {!! $job->country_name !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

        </div>
    @endif



    <div class="new-registration-page bg-white pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="home-register-account-box">
                        <h4>@lang('app.job_seeker')</h4>
                        <p class="box-icon"><img src="{{asset('assets/images/employee.png')}}" /></p>
                        <p>@lang('app.job_seeker_new_desc')</p>
                        <a href="{{route('register_job_seeker')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="home-register-account-box">
                        <h4>@lang('app.employer')</h4>
                        <p class="box-icon"><img src="{{asset('assets/images/enterprise.png')}}" /></p>
                        <p>@lang('app.employer_new_desc')</p>
                        <a href="{{route('register_employer')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="home-register-account-box">
                        <h4>@lang('app.agency')</h4>
                        <p class="box-icon"><img src="{{asset('assets/images/agent.png')}}" /></p>
                        <p>@lang('app.agency_new_desc')</p>
                        <a href="{{route('register_agent')}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.register_account') </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($regular_jobs->count())
        <div class="regular-jobs-wrap pb-5 pt-5">

            <div class="container">
                <div class="regular-job-container p-3">

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-3">@lang('app.new_jobs')</h4>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($regular_jobs as $regular_job)
                            <div class="col-md-4 mb-3">

                                <div class="row">
                                    <div class="col-md-12">

                                        <p class="job-title m-0">
                                            <a href="{{route('job_view', $regular_job->job_slug)}}">{!! $regular_job->job_title !!}</a>
                                        </p>

                                        <p class="text-muted  m-0">
                                            <i class="la la-map-marker"></i>
                                            @if($regular_job->city_name)
                                                {!! $regular_job->city_name !!},
                                            @endif
                                            @if($regular_job->state_name)
                                                {!! $regular_job->state_name !!},
                                            @endif
                                            @if($regular_job->state_name)
                                                {!! $regular_job->country_name !!}
                                            @endif
                                        </p>

                                    </div>
                                </div>

                            </div>

                        @endforeach

                    </div>


                </div>

            </div>


        </div>
    @endif

    <div class="pricing-section bg-white pb-5 pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="pricing-section-heading mb-5 text-center">

                        <h1>Pricing</h1>
                        <h5 class="text-muted">Choose a package to unlock Premium/Regular jobs posting ability.</h5>
                        <h5 class="text-muted">To get a large amount of quality application, choose the premium package</h5>
                    </div>

                </div>
            </div>


            <div class="row">

                <div class="col-xs-12 col-md-4">
                    <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                        <h1 class="display-4">$0</h1>
                        <h3>Free</h3>

                        <div class="pricing-package-ribbon pricing-package-ribbon-light">Regular</div>

                        <p class="mb-2 text-muted"> No Premium Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                        <p class="mb-2 text-muted"> Unlimited Applicants</p>
                        <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                        <p class="mb-2 text-muted"> No support available</p>

                        <a href="{{route('new_register')}}" class="btn btn-success mt-4"><i class="la la-user-plus"></i> Sign Up</a>
                    </div>
                </div>

                @foreach($packages as $package)
                    <div class="col-xs-12 col-md-4">
                        <div class="pricing-table-wrap bg-light pt-5 pb-5 text-center">
                            <h1 class="display-4">{!! get_amount($package->price) !!}</h1>
                            <h3>{{$package->package_name}}</h3>
                            <div class="pricing-package-ribbon pricing-package-ribbon-green">Premium</div>

                            <p class="mb-2 text-muted"> {{$package->premium_job}} Premium Jobs Post</p>
                            <p class="mb-2 text-muted"> Unlimited Regular Job Post</p>
                            <p class="mb-2 text-muted"> Unlimited Applicants</p>
                            <p class="mb-2 text-muted"> Dashboard access to manage application</p>
                            <p class="mb-2 text-muted"> E-Mail support available</p>
                            <a href="{{route('checkout', $package->id)}}" class="btn btn-success mt-4"> <i class="la la-shopping-cart"></i> Purchas Package</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>





    <div class="home-blog-section pb-5 pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="pricing-section-heading mb-5 text-center">
                        <h1>From Our Blog</h1>
                        <h5 class="text-muted">Check the latest updates/news from us.</h5>
                    </div>

                </div>
            </div>


            <div class="row">

                @foreach($blog_posts as $post)

                    <div class="col-md-4">

                        <div class="blog-card-wrap bg-white p-3 mb-4">

                            <div class="blog-card-img mb-4">
                                <img src="{{$post->feature_image_thumb_uri}}" class="card-img" />
                            </div>

                            <h4 class="mb-3">{{$post->title}}</h4>

                            <p class="blog-card-text-preview">{!! limit_words($post->post_content) !!}</p>

                            <a href="{{route('blog_post_single', $post->slug)}}" class="btn btn-success"> <i class="la la-book"></i> Read More</a>

                            <div class="blog-card-footer border-top pt-3 mt-3">
                                <span><i class="la la-user"></i> {{$post->author->name}} </span>
                                <span><i class="la la-clock-o"></i> {{$post->created_at->diffForHumans()}} </span>
                                <span><i class="la la-eye"></i> {{$post->views}} </span>
                            </div>
                        </div>


                    </div>

                @endforeach

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="home-all-blog-posts-btn-wrap text-center my-3">

                        <a href="" class="btn btn-success btn-lg"><i class="la la-link"></i> @lang('app.all_blog_posts')</a>

                    </div>
                </div>
            </div>


        </div>
    </div>



    <div class="new-registration-page bg-white pb-5 pt-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <div class="call-to-action-post-job justify-content-center">
                        <div class="job-post-icon my-auto">
                            <img src="{{asset('assets/images/job.png')}}" />
                        </div>
                        <div class="job-post-details mr-3 ml-3 p-3 my-auto">
                            <h1>Post your job</h1>
                            <p>
                                Job seekers looking for quality job always. <br /> Post your job to get the talents
                            </p>
                        </div>

                        <div class="job-post-button my-auto">
                            <a href="{{route('post_new_job')}}" class="btn btn-success btn-lg">Post a Job</a>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

	
	
	
    <div class="job-stats-footer pb-5 pt-5 text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-muted mb-3">Our website stats</h2>
                    <p class="text-muted mb-4">Here the stats of how many people we've helped them to find jobs, hired talents</p>

                </div>
            </div>


            <div class="row">
                <div class="col-md-3">
                    <h3>15M</h3>
                    <h5>Job Applicants</h5>
                </div>

                <div class="col-md-3">
                    <h3>12M</h3>
                    <h5>Job Posted</h5>
                </div>
                <div class="col-md-3">
                    <h3>8M</h3>
                    <h5>Employers</h5>
                </div>
                <div class="col-md-3">
                    <h3>15M</h3>
                    <h5>Recruiters</h5>
                </div>
            </div>
        </div>
    </div>
----->







@endsection





