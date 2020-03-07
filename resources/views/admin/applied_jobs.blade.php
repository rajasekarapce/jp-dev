@extends('layouts.dashboard')

@section('content')
This page (Applied page and saved page)
 <h5>Your Recent Job Applications</h5>
    <div class="row">
        <div class="col-md-12">
		
		    <table class="table table-hover" style="background-color: white;" >
			  <thead>
				<tr class="tbcol">
				  <th scope="col">Company</th>
				  <th scope="col">Applied Date</th>
				  <th scope="col">Application Status</th>
				  <th scope="col">Job Result</th>
				</tr>
			  </thead>
			  <tbody>
			  @foreach($applied_jobs as $applied_job)
				<tr>
				  <td>
				    <div class="c-pink">{{$applied_job->company}}</div>
					<div><small>{{$applied_job->job_title}}</small></div>
					<div><small>Last date: {{date('d-m-Y', strtotime($applied_job->deadline))}}</small></div>
				  </td>
				  <td>{{date('d-m-Y', strtotime($applied_job->Applied_Date))}}</td>
				  <td><span class="badge badge-success">Applied</span></td>
				  <td> </td>
				</tr>
				@endforeach
				<!-- <tr>
				  <td>
				    <div class="c-pink">Smartwiz Technologies</div>
					<div><small>Web Designer</small></div>
					<div><small>Last date: 09-03-2020</small></div>
				  </td>
				  <td>20-02-2020</td>
				  <td><span class="badge badge-success">Applied</span></td>
				  <td> </td>
				</tr> -->
				<!-- <tr>
				  <td>
				    <div class="c-pink">Smartwiz Technologies</div>
					<div><small>Web Designer</small></div>
					<div><small>Last date: 09-03-2020</small></div>
				  </td>
				  <td>20-02-2020</td>
				  <td><span class="badge badge-success">Applied</span></td>
				  <td> </td>
				</tr> -->
			  </tbody>
			</table>
			
			 <!-- <h5>Saved Jobs</h5> -->
			<!------Start--------->
		         <!-- <div class=" padding-none">
				      <div class="card shadow2 mt-sm-2 mb-sm-2">					     
						  <div class="card-body padd14">
						    <div class="row">
							   <div class="col-md-9 border-right">
						       <h5 class="job-tit"><a class="c-pink" href="">Creative Toughened Glass Pvt Ltd</a></h5>
							   <div><small><b>Front End Developer</b></small> </div>
							    <div><small><i class=" font-18 la la-graduation-cap"></i> BCA, BE/B.Tech(CSE), MCA, ME/M.Tech(CSE)</small></div>
							    <div><small><i class=" font-18 la la-map-marker"></i> Bangalore</small></div>
								<div><small><i class=" font-18 la la-calendar"></i><b>Last Date:</b> 09 Mar 20</small></div>
							  </div>
							   <div class="col-md-3">
							      <div><small><i class="fa fa-clock-o"></i> 1m ago</small></div>
								  <div> 
									  <a href=""><i class="fa fa-facebook-square"></i></a>
									  <a href=""><i class="fa fa-twitter-square"></i></a>
									  <a href=""><i class="fa fa-linkedin-square"></i></a>
									  <a href=""><i class="fa fa-google-plus"></i></a>
								  </div>
								  <div><a href=""><i class="fa fa-star" ></i></a></div>								  
							      <a href="#" class="nav-link btn pin text-center mt-sm-2">View & Apply</a>
							   </div>
							</div>	
							
						  </div>
						</div>
				  </div> -->
		<!------End--------->
		<!------Start--------->
		         <!-- <div class=" padding-none">
				      <div class="card shadow2 mt-sm-2 mb-sm-2">					     
						  <div class="card-body padd14">
						    <div class="row">
							   <div class="col-md-9 border-right">
						       <h5 class="job-tit"><a class="c-pink" href="">Creative Toughened Glass Pvt Ltd</a></h5>
							   <div><small><b>Front End Developer</b></small> </div>
							    <div><small><i class=" font-18 la la-graduation-cap"></i> BCA, BE/B.Tech(CSE), MCA, ME/M.Tech(CSE)</small></div>
							    <div><small><i class=" font-18 la la-map-marker"></i> Bangalore</small></div>
								<div><small><i class=" font-18 la la-calendar"></i><b>Last Date:</b> 09 Mar 20</small></div>
							  </div>
							   <div class="col-md-3">
							      <div><small><i class="fa fa-clock-o"></i> 1m ago</small></div>
								  <div> 
									  <a href=""><i class="fa fa-facebook-square"></i></a>
									  <a href=""><i class="fa fa-twitter-square"></i></a>
									  <a href=""><i class="fa fa-linkedin-square"></i></a>
									  <a href=""><i class="fa fa-google-plus"></i></a>
								  </div>
								  <div><a href=""><i class="fa fa-star" ></i></a></div>								  
							      <a href="#" class="nav-link btn pin text-center mt-sm-2">View & Apply</a>
							   </div>
							</div>	
							
						  </div>
						</div>
				  </div> -->
		<!------End--------->
		<!------Start--------->
		         <!-- <div class=" padding-none">
				      <div class="card shadow2 mt-sm-2 mb-sm-2">					     
						  <div class="card-body padd14">
						    <div class="row">
							   <div class="col-md-9 border-right">
						       <h5 class="job-tit"><a class="c-pink" href="">Creative Toughened Glass Pvt Ltd</a></h5>
							   <div><small><b>Front End Developer</b></small> </div>
							    <div><small><i class=" font-18 la la-graduation-cap"></i> BCA, BE/B.Tech(CSE), MCA, ME/M.Tech(CSE)</small></div>
							    <div><small><i class=" font-18 la la-map-marker"></i> Bangalore</small></div>
								<div><small><i class=" font-18 la la-calendar"></i><b>Last Date:</b> 09 Mar 20</small></div>
							  </div>
							   <div class="col-md-3">
							      <div><small><i class="fa fa-clock-o"></i> 1m ago</small></div>
								  <div> 
									  <a href=""><i class="fa fa-facebook-square"></i></a>
									  <a href=""><i class="fa fa-twitter-square"></i></a>
									  <a href=""><i class="fa fa-linkedin-square"></i></a>
									  <a href=""><i class="fa fa-google-plus"></i></a>
								  </div>
								  <div><a href=""><i class="fa fa-star" ></i></a></div>								  
							      <a href="#" class="nav-link btn pin text-center mt-sm-2">View & Apply</a>
							   </div>
							</div>	
							
						  </div>
						</div>
				  </div> -->
		<!------End--------->
			
		
		
         <!--------------------------------
            <table class="table table-bordered">

                <tr>
                    <th>@lang('app.name')</th>
                    <th>@lang('app.employer')</th>
                </tr>

                @foreach($applications as $application)
                    <tr>
                        <td>
                            <i class="la la-user"></i> {{$application->name}}
                            <p class="text-muted"><i class="la la-clock-o"></i> {{$application->created_at->format(get_option('date_format'))}} {{$application->created_at->format(get_option('time_format'))}}</p>
                            <p class="text-muted"><i class="la la-envelope-o"></i> {{$application->email}}</p>
                            <p class="text-muted"><i class="la la-phone-square"></i> {{$application->phone_number}}</p>
                        </td>

                        <td>
                            @if( ! empty($application->job->job_title))
                                <p>
                                    <a href="{{route('job_view', $application->job->job_slug)}}" target="_blank">{{$application->job->job_title}}</a>
                                </p>
                            @endif

                            @if( ! empty($application->job->employer->company))
                                <p>{{$application->job->employer->company}}</p>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </table>
			--------------------------->


            {!! $applications->links() !!}

        </div>
    </div>



@endsection