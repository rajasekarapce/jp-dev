@extends('layouts.theme')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-5">
                                    <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Mobile') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-3 col-form-label text-md-right">{{ __('app.country') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <select name="country" class="form-control country_to_state" required autofocus>
                                        <option value="">@lang('app.select_a_country')</option>
                                        @foreach($countries as $country)
                                            <option value="{!! $country->id !!}" @if(old('country') && $country->id == old('country')) selected="selected" @endif  >{!! $country->country_name !!}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-3 col-form-label text-md-right">{{ __('app.state') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <select name="state" class="form-control state_options"  required autofocus>
                                        <option value="">Select a state</option>
                                        @if($old_country)
                                            @foreach($old_country->states as $state)
                                                <option value="{{$state->id}}" @if(old('state') && $state->id == old('state')) selected="selected" @endif >{!! $state->state_name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="city" class="col-md-3 col-form-label text-md-right">{{ __('app.city') }}<span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="qualification" class="col-md-3 col-form-label text-md-right">{{ __('Qualification') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <select name="qualification" class="form-control qualification" required id="qualification" autofocus>
                                        <option value="">@lang('app.select_qualification')</option>
                                        @foreach($qualifications as $qualifi)
                                            <option value="{!! $qualifi->id !!}" @if(old('country') && $country->id == old('qualifi')) selected="selected" @endif  >{!! $qualifi->course !!}</option>
                                        @endforeach
                                    </select>                                   
                                </div>
                                <div class="col-md-4 degree">
                                    <select name="branch" class="form-control branch_options"  required autofocus>                                       
                                    </select>                                    
                                </div>
                            </div>


                        <!--<div class="form-group row degree">
                                <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <select name="qualification" class="form-control degree_options"  required autofocus>
                                    </select> -->
                                <!-- </div>
                            </div> -->
                            
                            <div class="form-group row degree">
                                <label for="qualification" class="col-md-3 col-form-label text-md-right">{{ __('PassedOut Year') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <select name="passed_out" class="form-control "  required autofocus>
                                        <option value="">Passed Out</option>
                                                <option value="2015" > 2015 </option>
                                                <option value="2016" > 2016 </option>
                                                <option value="2017" > 2017 </option>
                                                <option value="2018" > 2018 </option>
                                                <option value="2019" > 2019 </option>
                                    </select>
                                   
                                </div>
                            </div>

                            <div class="form-group row degree">
                                <label for="qualification" class="col-md-3 col-form-label text-md-right"> <span class="mendatory-mark"></span></label>
                                <div class="col-md-5">
                                    <p>Marks : <input type="radio" name="percent_or_cgpa" checked value="1" />Percentage <input type="radio"  name="percent_or_cgpa" value="2" />CGPA (OUT Of 10)</p>
                                </div>
                                <div class="col-md-4">
                                <input id="percentage" type="text" name="percentage" placeholder="Marks" class="form-control{{ $errors->has('percentage') ? ' is-invalid' : '' }}"  value="{{ old('phone') }}" required autofocus>

                                        @if ($errors->has('percentage'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('percentage') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row degree">
                                <label for="college_location" class="col-md-3 col-form-label text-md-right">{{ __('Your College Location') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                <select name="college_location" class="form-control state" required autofocus>
                                        <option value="">@lang('Select State')</option>
                                         @foreach($states1 as $state)
                                            <option value="{!! $state->id !!}"   >{!! $state->state_name !!}</option>
                                        @endforeach 
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row degree">
                                <label for="institute" class="col-md-3 col-form-label text-md-right"><span class="mendatory-mark"></span></label>
                                <div class="col-md-5">
                                <select name="institute" class="form-control institution_options"  required autofocus>
                                        
                                               
                                    </select>
                                </div>
                                <div class="col-md-4">
                                <select name="university" class="form-control university_options"  required autofocus>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row degree">
                                <label for="qualification" class="col-md-3 col-form-label text-md-right">{{ __('Class 12th Marks') }}<span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                    <p>Marks : <input type="radio" name="have_or_dont" value="1" checked />I Have <input type="radio" name="have_or_dont" value="2" />I Don't Have</p>
                                </div>
                                <div class="col-md-4">
                                <input id="plus_two_marks" type="text" placeholder="12th Pass Marks In percentage" class="form-control{{ $errors->has('plus_two_marks') ? ' is-invalid' : '' }}" name="plus_two_marks" value="{{ old('plus_two_marks') }}" required autofocus>

                                        @if ($errors->has('plus_two_marks'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('plus_two_marks') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row degree">
                                <label for="qualification" class="col-md-3 col-form-label text-md-right">{{ __('Class 10th Marks') }}<span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                <input id="tenth_marks" type="text" placeholder="10th Pass Marks In percentage" class="form-control{{ $errors->has('tenth_marks') ? ' is-invalid' : '' }}" name="tenth_marks" value="{{ old('tenth_marks') }}" required autofocus>

                                    @if ($errors->has('tenth_marks'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tenth_marks') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row degree">
                                <label for="skills" class="col-md-3 col-form-label text-md-right">{{ __('Skills Sets') }}<span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                <textarea type="text" cols="35" rows="4" name="skills" required autofocus></textarea>

                                   
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="logo" class="col-md-3 col-form-label text-md-right">{{ __('Upload Resume') }}<span class="mendatory-mark">*</span></label>
                                <div class="col-md-5">
                                <input type="file" name="logo" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required autofocus></input>                                   
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="la la-save"></i> {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
