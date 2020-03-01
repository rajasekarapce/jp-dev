@extends('layouts.theme')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('app.company_register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('register_employer')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="account" class="col-md-4 col-form-label text-md-right">{{ __('app.account_type') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">

                                <select class="form-control" name="account_type_id" id="account">
									<option value="2" selected="selected">Employers/Corporates</option>
										<option value="3">Manpower Consultants</option>
										<option value="4">Colleges/Universities</option>
										<option value="5">Training Institutes</option>
										<option value="6">Educational Consultants</option>
										<option value="7">Ad Agencies/Affiliates</option>
										<option value="1">JobSeeker</option>
										<option value="8">Others</option>
										</select>	
                                    @if ($errors->has('account'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('app.company') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required autofocus>

                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <span class="mendatory-mark">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                                                        <div class="form-group row">
                                <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('app.designation') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                <select name="designation_id" class="form-control country_to_state" required autofocus>
                                        <option value="">@lang('app.select_designation')</option>
                                        @foreach($designations as $designation)
                                            <option value="{!! $designation->id !!}" @if(old('designation') && $designation->id == old('designation')) selected="selected" @endif  >{!! $designation->name !!}</option>
                                        @endforeach
                                    </select>
                                	<!-- <select class="form-control" name="designation_id" id="designation">
										<option value="">--Select--</option>
<option value="2">Accounts - Finance</option>
<option value="60">Assistant Director – HR / Talent Acquisition</option>
<option value="69">Assistant Manager HR</option>
<option value="79">Associate Director HR</option>
<option value="76">Asst Manager Recruitment</option>
<option value="64">Asst. General Manager</option>
<option value="5">BDM</option>
<option value="6">Business head</option>
<option value="78">Campus - Recruiter</option>
<option value="8">CEO</option>
<option value="9">Chairman</option>
<option value="66">Co-Founder</option>
<option value="65">COO</option>
<option value="62">Corporate HR</option>
<option value="12">Deputy General Manager - HR</option>
<option value="13">Director</option>
<option value="15">Director - HR</option>
<option value="77">Founder</option>
<option value="16">General Manager - (GM) HR</option>
<option value="17">General Manager (GM)</option>
<option value="19">Head - Talent Acquisition</option>
<option value="68">Head HR</option>
<option value="74">Head Talent Acquisition</option>
<option value="70">HR Admin</option>
<option value="72">HR Business Partner</option>
<option value="22">HR Executive</option>
<option value="61">HR Lead</option>
<option value="83">HR Leader</option>
<option value="59">HR Officer</option>
<option value="73">HR Professional</option>
<option value="23">HR- Recruiter</option>
<option value="67">HR Specialist</option>
<option value="80">IT Director</option>
<option value="75">IT Recruiter</option>
<option value="24">Manager - Campus Recruitment</option>
<option value="26">Manager - HR</option>
<option value="27">Manager - Recruitment</option>
<option value="28">Manager - Talent Acquisition</option>
<option value="29">Manager - University Relations</option>
<option value="71">Manager-Corp HR</option>
<option value="30">Managing Director (MD)</option>
<option value="31">Managing Partner</option>
<option value="32">Marketing Manager</option>
<option value="36">Placement Officer (TPO)</option>
<option value="84">President HR</option>
<option value="38">Procurement</option>
<option value="39">Product Manager</option>
<option value="40">Receptionist</option>
<option value="81">Recruiter</option>
<option value="41">Recruitment Associate</option>
<option value="42">Recruitment Consultant</option>
<option value="43">Recruitment Executive</option>
<option value="44">Recruitment Lead</option>
<option value="63">Recruitment Specialist</option>
<option value="45">Regional Director</option>
<option value="85">Regional Manager HR</option>
<option value="46">Resource Manager</option>
<option value="47">Senior Executive - HR</option>
<option value="48">Senior Executive - Talent Acquisition</option>
<option value="49">Senior Manager - HR</option>
<option value="50">Senior Manager - Recruitment</option>
<option value="51">Senior Manager - Talent Acquisition</option>
<option value="82">Senior VP- HR</option>
<option value="52">Sr.Technical Recruiter</option>
<option value="54">Technical Recruiter</option>
<option value="55">Training manager</option>
<option value="86">University Relations</option>
<option value="56">Vice President (VP)</option>
<option value="57">Vice President (VP)- HR</option>
 <option value="0" selected="selected">Others</option> 
										</select>	 -->
                                    @if ($errors->has('account'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_of_employee" class="col-md-4 col-form-label text-md-right">{{ __('app.no_of_employees') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">

                                	<select class="form-control" name="no_of_employee" id="no_of_employee">
<option value="">--Select Range--</option>
<option value="0-50">0-50</option>
<option value="51-200">51-200</option>
<option value="201-1000">201-1000</option>
<option value="1001-10000">1001-10000</option>
<option value="10000">&gt;10000</option>
										</select>	
                                    @if ($errors->has('no_of_employee'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_of_employee') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="requirement" class="col-md-4 col-form-label text-md-right">{{ __('app.requirement') }}</label>
                                <div class="col-md-6">
                                    <textarea id="requirement" class="form-control{{ $errors->has('requirement') ? ' is-invalid' : '' }}" name="requirement" value="{{ old('requirement') }}" required autofocus></textarea>

                                    @if ($errors->has('requirement'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('requirement') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <legend>Contact Information</legend>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('app.phone') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                      
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('app.address') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address_2" class="col-md-4 col-form-label text-md-right">{{ __('app.address_2') }}</label>
                                <div class="col-md-6">
                                    <input id="address_2" type="text" class="form-control{{ $errors->has('address_2') ? ' is-invalid' : '' }}" name="address_2" value="{{ old('address_2') }}">

                                    @if ($errors->has('address_2'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('app.country') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
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
                                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('app.state') }} <span class="mendatory-mark">*</span></label>
                                <div class="col-md-6">
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
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('app.city') }}</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
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
