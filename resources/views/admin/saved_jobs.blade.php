@extends('layouts.dashboard')

@section('content')

 <h5>Your Saved Jobs</h5>
    <div class="row">
        <div class="col-md-12">
		
		    <table class="table table-hover" style="background-color: white;" >
			  <thead>
				<tr class="tbcol">
				  <th scope="col">Company</th>
				  <th scope="col">Position</th>
				  <th scope="col">Last date</th>
				</tr>
			  </thead>
			  <tbody>
			  @foreach(Auth::user()->savedjobs as $applied_job)
				<tr>
				  <td>
				    <div class="c-pink">{{$applied_job->job_title}}</div>
				  </td>
				  <td>{{$applied_job->position}}</td>
				  <td>{{date('d-m-Y', strtotime($applied_job->deadline))}} </td>
				</tr>
				@endforeach
				
			  </tbody>
			</table>
			
			  

        </div>
    </div>



@endsection