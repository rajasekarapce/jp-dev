@extends('layouts.dashboard')

@section('content')

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
				
			  </tbody>
			</table>
			
			  {!! $applications->links() !!}

        </div>
    </div>



@endsection