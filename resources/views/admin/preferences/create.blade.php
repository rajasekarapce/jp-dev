@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12 qualification_panel">
    <form action="{{route('preference_details')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Update your Career Preferences Details</div>
      <div class="form-group row {{ $errors->has('hq_qualid')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Work Preferences')</label>
        <div class="col-sm-8">
          @foreach(\App\User::PREFERENCE_CHECKBOX as $key=>$preference)
          <input type="checkbox"  name="settings[1][]" value="{{$key}}" /> {{$preference}}
          @endforeach
        </div>
      </div>
      <div class="form-group row {{ $errors->has('MinSalExpPerYear')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Minimum salary Expected (per Year)') </label>
        <div class="col-sm-8">
          <select class="form-control select2" name="settings[2]" id="MinSalExpPerYear" style="color: rgb(51, 51, 51);">
          @foreach(\App\User::SALARY_EXP_SELECT as $key=>$salary)
          <option {{ old('MinSalExpPerYear') === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
          @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row {{ $errors->has('PreferredJobRole1')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Preferred Job Roles')  </label>
        <div class="col-sm-8">
          <select required class="form-control select2" name="settings[3]" id="PreferredJobRole1" style="color: rgb(51, 51, 51);">
            <option value="">Preferred Job - 1</option>
            @foreach(\App\User::PREFERED_JOB_ROLE_SELECT as $key=>$salary)
            <option {{ old('PreferredJobRole1') === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
            @endforeach
          </select>
          <br/>
          <select required class="form-control select2" name="settings[4]" id="PreferredJobRole2" style="color: rgb(51, 51, 51);">
            <option value="">Preferred Job - 2</option>
            @foreach(\App\User::PREFERED_JOB_ROLE_SELECT as $key=>$salary)
            <option {{ old('PreferredJobRole2') === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
            @endforeach
          </select>
          <br/>
          <select required class="form-control select2" name="settings[5]" id="PreferredJobRole3" style="color: rgb(51, 51, 51);">
            <option value="">Preferred Job - 3</option>
            @foreach(\App\User::PREFERED_JOB_ROLE_SELECT as $key=>$salary)
            <option {{ old('PreferredJobRole3') === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Are you interested in any Courses/ Exam preparation or Higher Studies / studies abroad guidance ?</div>
      <div class="form-group row {{ $errors->has('TrainingStudyCat')? 'has-error':'' }}">
        <div class="col-sm-12">
          <label for="name" class="col-sm-12 control-label">@lang('Choose your Training / Study category')</label>
        </div>
        @foreach(\App\User::TRAINING_CATEGORY_CHECKBOX as $key => $training_cat)
        <div class="col-sm-6">
          <label>
          <input type="checkbox"  name="settings[6][]" value="{{$key}}" /> {{$training_cat}}
          </label>
        </div>
        @endforeach
      </div>
      <div class="form-group row {{ $errors->has('CourseType')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Choose Course Type')</label>
        <div class="col-sm-8">
          @foreach(\App\User::COURSE_TYPE_RADIO as $key=>$preference)
          <input type="radio"  name="settings[7]" value="{{$key}}" /> {{$preference}}
          @endforeach
        </div>
      </div>
       <div class="form-group row {{ $errors->has('QueryExpectation')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Your Queries or Expectation')</label>
        <div class="col-sm-8">
          <textarea cols="50%" rows="5" name="settings[8]"></textarea>
        </div>
      </div>

      <div class="form-group row {{ $errors->has('Aspirants')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Aspirants')</label>
        <div class="col-sm-8">
          @foreach(\App\User::ASPIRANTS_RADIO as $key => $aspirant)
          <input type="radio"  name="settings[9]" value="{{$key}}" /> {{$aspirant}}
          @endforeach
        </div>
      </div>
      <hr />
      <div class="form-group row">
        <div class="col-sm-8 col-sm-offset-4">
          <button type="submit" class="btn btn-primary">@lang('app.update')</button>
        </div>
      </div>
    </form>
  </div>
</div>
@include('layouts.javascript')
@endsection