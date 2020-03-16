@extends('layouts.dashboard')
@section('content')
    @if(auth()->user()->is_admin())
        <div class="row">
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-success">
                    <h4>Users</h4>
                    <h5>{{$data['usersCount']}}</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 mb-3 bg-warning">
                    <h4>Payments</h4>
                    <h5>{!! get_amount($data['totalPayments']) !!}</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 mb-3 bg-light">
                    <h4>Active Jobs</h4>
                    <h5>{{$data['activeJobs']}}</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-danger">
                    <h4>Total Jobs</h4>
                    <h5>{{$data['totalJobs']}}</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-dark">
                    <h4>Employer</h4>
                    <h5>{{$data['employerCount']}}</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-info">
                    <h4>Agent</h4>
                    <h5>{{$data['agentCount']}}</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 mb-3 text-white bg-primary">
                    <h4>Applied</h4>
                    <h5>{{$data['totalApplicants']}}</h5>
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
		<p class="user-header">
		   <h5 class="user-header">Jobs Matching your Profile</h5><p>
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
						       <h5 class="job-tit"><a class="c-pink" href="{{route('job_view', $latest_job->job_slug)}}"><h5>{{$latest_job->job_title}}</h5></a></h5>
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
								  <div></div>								  
							      <!-- <a href="#" class="nav-link btn pin text-center mt-sm-2">View & Apply</a> -->
                                  <input type="hidden" name="job_id" id="id" value="{{$latest_job->job_id}}" /> 
                                  <input type="hidden" name="job_id" id="name1" value="{{$name}}" /> 
                                  <input type="hidden" name="job_id" id="email1" value="{{$email}}" /> 
                                  <input type="hidden" name="job_id" id="phone" value="{{$phone}}" /> 
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#applyJobModal" id="apply" ><i class="la la-calendar-plus-o"></i> @lang('app.apply_job') </button>
							   </div>
							</div>	
							
						  </div>
						</div>
				  </div>
				   @endforeach
				   <div class="padding-none">
				   <div class="mt-sm-2 mb-sm-2 pagination">
				   {{ $latest_jobs->links() }}
				   </div>
				   </div>
		<!------End--------->
		
    @endif
@endsection


<div class="modal fade" id="applyJobModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form action="{{route('apply_job')}}" method="post" id="applyJob" enctype="multipart/form-data">
                    @csrf


                    <div class="modal-header">
                        <h5 class="modal-title" >@lang('app.online_job_application_form')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        @if(session('error'))
                            <div class="alert alert-warning">{{session('error')}}</div>
                        @endif

                        <div class="form-group {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="name" class="control-label">@lang('app.name'):</label>
                            <input type="text" class="form-control {{e_form_invalid_class('name', $errors)}}" id="name" name="name" value="{{old('name')}}" placeholder="@lang('app.your_name')">
                            {!! e_form_error('name', $errors) !!}
                        </div>

                        <div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
                            <label for="email" class="control-label">@lang('app.email'):</label>
                            <input type="text" class="form-control {{e_form_invalid_class('email', $errors)}}" id="email" name="email" value="{{old('email')}}" placeholder="@lang('app.email_ie')">
                            {!! e_form_error('email', $errors) !!}
                        </div>

                        <div class="form-group {{ $errors->has('phone_number')? 'has-error':'' }}">
                            <label for="phone_number" class="control-label">@lang('app.phone_number'):</label>
                            <input type="text" class="form-control {{e_form_invalid_class('phone_number', $errors)}}" id="phone_number" name="phone_number" value="{{old('phone_number')}}" placeholder="@lang('app.phone_number')">
                            {!! e_form_error('phone_number', $errors) !!}
                        </div>

                        <div class="form-group {{ $errors->has('message')? 'has-error':'' }}">
                            <label for="message-text" class="control-label">@lang('app.message'):</label>
                            <textarea class="form-control {{e_form_invalid_class('message', $errors)}}" id="message" name="message" placeholder="@lang('app.your_message')">{{old('message')}}</textarea>
                            {!! e_form_error('message', $errors) !!}
                        </div>

                        <div class="form-group {{ $errors->has('resume')? 'has-error':'' }}">
                            <label for="resume" class="control-label">@lang('app.resume'):</label>
                            <input type="file" class="form-control {{e_form_invalid_class('resume', $errors)}}" id="resume" name="resume">
                            <p class="text-muted">@lang('app.resume_file_types')</p>
                            {!! e_form_error('resume', $errors) !!}
                        </div>

                        <input type="hidden" name="job_id" id="job_id" value="" />

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                        <button type="submit" class="btn btn-primary" id="report_ad">@lang('app.apply_online')</button>
                    </div>


                </form>
            </div>

        </div>
    </div>








