@extends('layouts.dashboard')


@section('content')

    @if(auth()->user()->is_admin())
        <div class="row">
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-success">
                    <h4>Users</h4>
                    <h5>{{$usersCount}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-warning">
                    <h4>Payments</h4>
                    <h5>{!! get_amount($totalPayments) !!}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 bg-light">
                    <h4>Active Jobs</h4>
                    <h5>{{$activeJobs}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-danger">
                    <h4>Total Jobs</h4>
                    <h5>{{$totalJobs}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-dark">
                    <h4>Employer</h4>
                    <h5>{{$employerCount}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-info">
                    <h4>Agent</h4>
                    <h5>{{$agentCount}}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-primary">
                    <h4>Applied</h4>
                    <h5>{{$totalApplicants}}</h5>
                </div>
            </div>
        </div>

    @else
<!--------------------------------------------------------------------
       <div class="row">
            <div class="col-md-12">
                <div class="no data-wrap py-5 my-5 text-center">
                    <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                    <h1>No Data available here</h1>
                </div>
            </div>
        </div>
		
----------------------------------------------------------------------->		
		
		<!-- This page (Dashboard page and recommended page) -->
		   <h5>Latest Jobs For Your Profile</h5>
		      <!------Start--------->
			  @foreach($latest_jobs as $latest_job)

			  <?php
		      			$fdate = date('Y-m-d H:i:s');
		      			$tdate = $latest_job->created_at;

		      			$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime1->diff($datetime2);
 $days = $interval->format('%d');

		      		?>

		         <div class=" padding-none">
				      <div class="card shadow2 mt-sm-2 mb-sm-2">					     
						  <div class="card-body padd14">
						    <div class="row">
							   <div class="col-md-9 border-right">
						       <h5 class="job-tit"><a class="c-pink" href="">{{$latest_job->company}}</a></h5>
							   <div><small><b>{{$latest_job->position}}</b></small> </div>
							    <div><small><i class=" font-18 la la-graduation-cap"></i> {{$latest_job->course}}</small></div>
							    <div><small><i class=" font-18 la la-map-marker"></i> {{$latest_job->city_name}}</small></div>
								<div><small><i class=" font-18 la la-calendar"></i><b>Last Date:</b> {{date('d-m-Y', strtotime($latest_job->deadline))}}</small></div>
							  </div>
							   <div class="col-md-3">
							      <div><small><i class="fa fa-clock-o"></i> {{ $days }} days ago</small></div>
								  <div> 
									  <a href=""><i class="fa fa-facebook-square"></i></a>
									  <a href=""><i class="fa fa-twitter-square"></i></a>
									  <a href=""><i class="fa fa-linkedin-square"></i></a>
									  <a href=""><i class="fa fa-google-plus"></i></a>
								  </div>
								  <div><a href=""><i class="fa fa-star-o" ></i></a></div>								  
							      <a href="{{$latest_job->job_slug}}" class="nav-link btn pin text-center mt-sm-2">View & Apply</a>
							   </div>
							</div>	
							
						  </div>
						</div>
				  </div>
				  @endforeach
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
								  <div><a href=""><i class="fa fa-star-o" ></i></a></div>								  
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
								  <div><a href=""><i class="fa fa-star-o" ></i></a></div>								  
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
								  <div><a href=""><i class="fa fa-star-o" ></i></a></div>								  
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
								  <div><a href=""><i class="fa fa-star-o" ></i></a></div>								  
							      <a href="#" class="nav-link btn pin text-center mt-sm-2">View & Apply</a>
							   </div>
							</div>	
							
						  </div>
						</div>
				  </div> -->
		<!------End--------->

		
		
    @endif

@endsection










