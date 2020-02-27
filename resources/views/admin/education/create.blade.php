@extends('layouts.dashboard')


@section('content')


    <div class="row">
        <div class="col-md-12 qualification_panel">


            <form action="{{route('education_details')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Highest Qualification Details</div>
                <div class="form-group row {{ $errors->has('hq_qualid')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Highest qualification') <span class="color-red">*</span></label>
                    <div class="col-sm-8">
                        <select required class="form-control select2" name="hq_qualid" id="course" style="color: rgb(51, 51, 51);">
                            <option value="">Select Course</option>
                            @foreach($qualifications as $key=>$qualification)
                            <option {{ old('hq_qualid') === $key ? 'selected' : '' }} value="{{$qualification->id}}">{{$qualification->course}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
                 <div class="form-group row {{ $errors->has('hq_passmonth')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Passout') <span class="color-red">*</span></label>
                    <div class="col-sm-4">
                        <select required class="form-control select2" name="hq_passmonth" id="passMonth" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Month</option>
                            @foreach(\App\User::PASSOUT_RADIO as $key=>$month)
                            <option {{ old('hq_passmonth') === $key ? 'selected' : '' }} value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-sm-4">
                        <select required class="form-control select2" name="hq_passyear" id="hq_passyear" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Year</option>
                            @for ($i = (int) date('Y') + 7; $i >= (int) date('Y') - 40; $i--)
                             <option {{ old('hq_passyear') === $i ? 'selected' : '' }} value='{{$i}}'>{{$i}}</option>
                            @endfor
                        </select>
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('hq_marktype')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Percentage / CGPA') <span class="color-red">*</span></label>
                    <div class="col-sm-4">
                       <input required type="radio" onclick="setMaximum('hq_mark', 1);" name="hq_marktype" id="percentage" value="1" style="vertical-align: sub;" {{ old('hq_marktype') === 1 ? 'checked' : '' }} > Percentage
                        
                    </div>
                    <div class="col-sm-4">
                       <input required type="radio" onclick="setMaximum('hq_mark', 2);" name="hq_marktype" id="cgpa" {{ old('hq_marktype') === 2 ? 'checked' : '' }} value="2" style="vertical-align: sub;"> CGPA (out of 10)
                        
                    </div>
                    
                </div>
                <div class="form-group row {{ $errors->has('hq_mark')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Marks')</label>
                <div class="col-sm-8">
                      <input required class="form-control valid" type="float" step="0.01" name="hq_mark" id="marks" placeholder="Enter your Marks" min="1" max="100" value="{{ old('hq_mark')}}">
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('State') <span class="color-red">*</span></label>
                    <div class="col-sm-8">
                        <select required class="form-control select2" name="hq_state" id="dropdown_hqState" style="color: rgb(51, 51, 51);">
                            <option value="">Select State</option>
                            @foreach($states as $key => $state)
                            <option {{ old('hq_state') === $state->id ? 'selected' : '' }} value="{{$state->id}}" value="{{$state->id}}">{{$state->state_name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>

                 <div class="form-group row {{ $errors->has('institute')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Institute') <span class="color-red">*</span></label>
                    <div class="col-sm-8">
                        <select required class="form-control select2" name="hq_institute" id="dropdown_hqInstitute" style="color: rgb(51, 51, 51);">
                            <option value="">Select State</option>
                            @if(count($institutions) > 0 )
                            @foreach($institutions as $key=>$institution)
                            <option {{ old('hq_institution') === $institution->id ? 'selected' : '' }} value="{{$institution->id}}">{{$institution->name}}</option>
                            @endforeach
                            @endif
                            
                        </select>
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('university')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('University') <span class="color-red">*</span></label>
                    <div class="col-sm-8">
                        <select required class="form-control select2" name="hq_university" id="dropdown_hqUniversity" style="color: rgb(51, 51, 51);">
                            <option value="">Select University</option>
                            @if(count($universities) > 0 )
                            @foreach($universities as $key=>$university)
                            <option {{ old('hq_institution') === $university->id ? 'selected' : '' }} value="{{$university->id}}">{{$university->name}}</option>
                            @endforeach
                            @endif
                            
                        </select>
                        
                    </div>
                </div>
                 <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Class 12th Details</div>
                
                 <div class="form-group row {{ $errors->has('xii_passmonth')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Passout')</label>
                    <div class="col-sm-4">
                        <select required class="form-control select2" name="xii_passmonth" id="passMonthXii" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Month</option>
                            @foreach(\App\User::PASSOUT_RADIO as $key=>$month)
                            <option  {{ old('xii_passmonth') === $key ? 'selected' : '' }} value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-sm-4">
                        <select required class="form-control select2" name="xii_passyear" id="passYearXii" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Year</option>
                            @for ($i = (int) date('Y') + 7; $i >= (int) date('Y') - 40; $i--)
                             <option {{ old('xii_passyear') === $i ? 'selected' : '' }} value='{{$i}}'>{{$i}}</option>
                            @endfor
                        </select>
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('xii_marktype')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Percentage / CGPA')</label>
                    <div class="col-sm-4">
                       <input onclick="setMaximum('xii_mark', 1);" type="radio" name="xii_marktype" id="percentage" value="1" style="vertical-align: sub;" {{ old('xii_marktype') === 1 ? 'checked' : '' }}> Percentage
                        
                    </div>
                    <div class="col-sm-4">
                       <input onclick="setMaximum('xii_mark', 2);" type="radio" name="xii_marktype" {{ old('xii_marktype') === 2 ? 'checked' : '' }} id="cgpa" value="2" style="vertical-align: sub;"> CGPA (out of 10)
                        
                    </div>
                    
                </div>
                <div class="form-group row {{ $errors->has('xii_mark')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Marks')</label>
                <div class="col-sm-8">
                      <input required class="form-control valid" type="float" step="0.01" min="1" max="100" name="xii_mark" id="marksXii" placeholder="Enter your Marks" value="{{ old('xii_mark')}}">
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('xii_school')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('School')</label>
                    <div class="col-sm-8">
                        <input required placeholder="Select your School Name" class="form-control select2" name="xii_school" id="dropdown_schoolNameXii" value="{{ old('xii_school')}}" style="color: rgb(51, 51, 51);" />
                            
                        
                    </div>
                </div>

                 <div class="form-group row {{ $errors->has('xii_board')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Board')</label>
                    <div class="col-sm-8">
                        <input required placeholder="Enter Board Name" class="form-control select2" name="xii_board" id="dropdown_schoolBoardXii" value="{{ old('xii_board')}}" style="color: rgb(51, 51, 51);" />
                        
                    </div>
                </div>    
                <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Class 10th Details</div>
                
                 <div class="form-group row {{ $errors->has('x_passmonth')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Passout')</label>
                    <div class="col-sm-4">
                        <select required class="form-control select2" name="x_passmonth" id="passMonthX" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Month</option>
                            @foreach(\App\User::PASSOUT_RADIO as $key=>$month)
                            <option {{ old('x_passmonth') === $key ? 'selected' : '' }} value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-sm-4">
                        <select required class="form-control select2" name="x_passyear" id="passYearX" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Year</option>
                            @for ($i = (int) date('Y') + 7; $i >= (int) date('Y') - 40; $i--)
                             <option {{ old('x_passyear') === $i ? 'selected' : '' }}  value='{{$i}}'>{{$i}}</option>
                            @endfor
                        </select>
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('x_marktype')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Percentage / CGPA')</label>

                    @foreach(App\EducationDetail::MARK_TYPE_RADIO as $key => $label)
                    <div class="col-sm-4 {{ $errors->has('x_marktype') ? 'is-invalid' : '' }}">
                        <input style="vertical-align: sub;" type="radio" id="is_paused_{{ $key }}" name="x_marktype" value="{{ $key }}" {{ old('x_marktype') === $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="x_marktype_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                    
                    
                </div>
                <div class="form-group row {{ $errors->has('x_mark')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Marks')</label>
                <div class="col-sm-8">
                      <input required class="form-control valid"  name="x_mark" type="float" min="1" max="100" step="0.01" id="marksX" placeholder="Enter your Marks" value="{{ old('x_mark')}}">
                        
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('x_school')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('School')</label>
                    <div class="col-sm-8">
                        <input required placeholder="Select your School Name" class="form-control select2" name="x_school" id="dropdown_schoolNameX" value="{{ old('x_school')}}" style="color: rgb(51, 51, 51);" />
                            
                        
                    </div>
                </div>

                 <div class="form-group row {{ $errors->has('x_board')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('Board')</label>
                    <div class="col-sm-8">
                        <input required placeholder="Enter Board Name" class="form-control select2" name="x_board" id="dropdown_schoolBoardX" value="{{ old('x_board')}}" style="color: rgb(51, 51, 51);" />
                        
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
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    @include('layouts.javascript')
<script type="text/javascript">
    $( document ).ready(function() {
     getDropdownById("hqState","hqInstitute","get-institute-list","name");
      getDropdownById("hqState","hqUniversity","get-university-list","name");
});
    function setMaximum(type, marktype)
    {
        if(marktype == 1)
        $('input[name='+type+']').attr("max",100);
        else    
        $('input[name='+type+']').attr("max",10);
    }

</script>


@endsection