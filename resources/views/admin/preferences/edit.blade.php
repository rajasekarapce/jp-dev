@extends('layouts.dashboard')
@section('content')
<div class="row">
  @php
  $workpreference = $minsalexpperyear = $preferredjobrole1 = $preferredjobrole2 = $preferredjobrole3 = $trainingstudycat = $coursetype =  $aspirants = array();
  $queryexpectation = '';
  if(isset($user_data->workpreference->first()->pivot) && $user_data->workpreference->first()->pivot)  
  $workpreference = json_decode($user_data->workpreference->first()->pivot->value);
  if(isset($user_data->minsalexpperyear->first()->pivot))
  $minsalexpperyear = json_decode($user_data->minsalexpperyear->first()->pivot->value);
  if(isset($user_data->preferredjobrole1->first()->pivot))
  $preferredjobrole1 = json_decode($user_data->preferredjobrole1->first()->pivot->value);
  if(isset($user_data->preferredjobrole2->first()->pivot))
  $preferredjobrole2 = json_decode($user_data->preferredjobrole2->first()->pivot->value);
  if(isset($user_data->preferredjobrole3->first()->pivot))
  $preferredjobrole3 = json_decode($user_data->preferredjobrole3->first()->pivot->value);
  if(isset($user_data->trainingstudycat->first()->pivot))
  $trainingstudycat = json_decode($user_data->trainingstudycat->first()->pivot->value);
  if(isset($user_data->coursetype->first()->pivot))
  $coursetype = json_decode($user_data->coursetype->first()->pivot->value);
  if(isset($user_data->queryexpectation->first()->pivot))
  $queryexpectation = $user_data->queryexpectation->first()->pivot->value;
  if(isset($user_data->aspirants->first()->pivot))
  $aspirants = json_decode($user_data->aspirants->first()->pivot->value);
  @endphp
  <div class="col-md-12 qualification_panel">
    <form action="{{route('preference_details')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Update your Career Preferences Details</div>
      <div class="form-group row {{ $errors->has('hq_qualid')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Work Preferences')</label>
        <div class="col-sm-8">
          @foreach(\App\User::PREFERENCE_CHECKBOX as $key=>$preference)
          <input type="checkbox" @php if(in_array($key, $workpreference)) echo "checked" @endphp name="settings[1][]" value="{{$key}}" /> {{$preference}}
          @endforeach
        </div>
      </div>
      <div class="form-group row {{ $errors->has('MinSalExpPerYear')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Minimum salary Expected (per Year)') </label>
        <div class="col-sm-8">
          <select class="form-control select2" name="settings[2]" id="MinSalExpPerYear" style="color: rgb(51, 51, 51);">
          @foreach(\App\User::SALARY_EXP_SELECT as $key=>$salary)
          <option   {{ old('MinSalExpPerYear', $minsalexpperyear) === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
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
            <option {{ old('settings[3]', $preferredjobrole1) === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
            @endforeach
          </select>
          <br/>
          <select required class="form-control select2" name="settings[4]" id="PreferredJobRole2" style="color: rgb(51, 51, 51);">
            <option value="">Preferred Job - 2</option>
            @foreach(\App\User::PREFERED_JOB_ROLE_SELECT as $key=>$salary)
            <option {{ old('settings[4]', $preferredjobrole2) === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
            @endforeach
          </select>
          <br/>
          <select required class="form-control select2" name="settings[5]" id="PreferredJobRole3" style="color: rgb(51, 51, 51);">
            <option value="">Preferred Job - 3</option>
            @foreach(\App\User::PREFERED_JOB_ROLE_SELECT as $key=>$salary)
            <option {{ old('PreferredJobRole3', $preferredjobrole3) === $key ? 'selected' : '' }} value="{{$key}}">{{$salary}}</option>
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
          <input type="checkbox" @php if(in_array($key, $trainingstudycat)) echo "checked" @endphp  name="settings[6][]" value="{{$key}}" /> {{$training_cat}}
          </label>
        </div>
        @endforeach
      </div>
      <div class="form-group row {{ $errors->has('settings[7]')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Choose Course Type')</label>
        <div class="col-sm-8">
          @foreach(\App\User::COURSE_TYPE_RADIO as $key=>$preference)
          <input type="radio"  {{ old('settings[7]', $coursetype) === $key ? 'checked' : '' }} @endphp name="settings[7]" value="{{$key}}" /> {{$preference}}
          @endforeach
        </div>
      </div>
       <div class="form-group row {{ $errors->has('QueryExpectation')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Your Queries or Expectation')</label>
        <div class="col-sm-8">
          <textarea cols="50%" rows="5" name="settings[8]">{{$queryexpectation}}</textarea>
        </div>
      </div>

      <div class="form-group row {{ $errors->has('Aspirants')? 'has-error':'' }}">
        <label for="name" class="col-sm-4 control-label">@lang('Aspirants')</label>
        <div class="col-sm-8">
          @foreach(\App\User::ASPIRANTS_RADIO as $key => $aspirant)
          <input type="radio"  {{ old('settings[9]', $aspirants) === $key ? 'checked' : '' }}   name="settings[9]" value="{{$key}}" /> {{$aspirant}}
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