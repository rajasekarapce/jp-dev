@extends('layouts.dashboard')
@section('content')
<div class="row">
   <div class="col-md-12 qualification_panel">
      <form action="{{route('career_edit')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Skill Set</div>
         <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
            <div class="col-sm-8">
               <select required multiple class="form-control select2" name="skills[]"  style="color: rgb(51, 51, 51);">
                  <option value="">Select Skills (ctrl+click)</option>
                  @foreach($skills as $key => $skill)
                  <option value="{{$skill->id}}" value="{{$skill->id}}">{{$skill->name}}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="form-group row {{ $errors->has('work_exp')? 'has-error':'' }}">
            <label for="name" class="col-sm-4 control-label">@lang('Work Experience') <span class="color-red">*</span></label>
            @foreach(\App\CareerDetail::WORK_EXPERIENCE as $key => $value)    
            <div class="col-sm-4">
               <input required type="radio" name="work_exp" id="work_exp{{$key}}" value="{{$key}}" style="vertical-align: sub;" {{ old('work_exp') === 1 ? 'checked' : '' }} > {{$value}}
            </div>
            @endforeach
         </div>
         <div class=" col-lg-12 col-md-12 col-xs-12 control-group after-add-more">
          <div id="field0" class="field control-group">
            <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">My Project</div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Choose')</label>
                  <div class="col-sm-8">
                     <select required class="form-control select2" name="academic_proj[0][academic_projtype]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Academic Project</option>
                        @foreach(\App\CareerDetail::ACADEMIC_PROJTYPE as $key => $value)
                        <option {{ old('academic_proj[0][academic_projtype]') === $key ? 'selected' : '' }}  value="{{$key}}">{{$value}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Title')</label>
                  <div class="col-sm-8">
                     <input required class="form-control valid" type="text"  name="academic_proj[0][academic_projname]" id="title0" placeholder="Title" value="{{ old('academic_proj[0][academic_projname]')}}">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Description')</label>
                  <div class="col-sm-8">
                     <textarea required class="form-control valid" type="text"  name="academic_proj[0][academic_projdesc]" id="academic_projdesc0" placeholder="Project Description">{{ old('academic_proj[0][academic_projtype]')}}</textarea>
                  </div>
               </div>
               <div style="clear: both"></div>
            <div class="input-group-btn pull-right"> 
              <button class="btn btn-danger project projectremove" data-rowid="0" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
               <div style="clear: both"></div>
            </div>
           
          
        </div>
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add Project</button>
          </div>
         <div class=" col-lg-12 col-md-12 col-xs-12 control-group after-add-more-compexam">
          <div class=" col-lg-12 col-md-12 col-xs-12 control-group" style="margin-top:10px">
            <div id="compfield0" class="field">
              <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Competitive Exam Scores</div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Choose')</label>
                  <div class="col-sm-8">
                     <select class="form-control select2" name="compexamp[0][competitive_exam]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Academic Project</option>
                        @foreach(\App\CareerDetail::COMPETITIVE_EXAMS as $key => $value)
                        <option {{ old('compexamp[0][competitive_exam]') === $key ? 'selected' : '' }} value="{{$key}}" value="{{$key}}">{{$value}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Score Type')</label>
                  <div class="col-sm-8">
                      
                     @foreach(\App\CareerDetail::SCORE_TYPE as $key => $value)
                       <input type="radio" name="compexamp[0][score_type]" @if($key==1) checked @endif {{ old('compexamp[0][score_type]') === $key ? 'checked' : '' }} value="{{$key}}" /> {{$value}}
                        @endforeach
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Score')</label>
                  <div class="col-sm-8">
                    <input type="number" step="0.01" class="form-control" name="compexamp[0][score]" value="{{ old('compexamp[0][score]')}}"   />
                  </div>
               </div>
               <div style="clear: both"></div>
            <div class="input-group-btn pull-right"> 
              <button class="btn btn-danger compexamremove" data-comprowid="0" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
               <div style="clear: both"></div>
            </div>
         </div>
         </div>
         <div class="input-group-btn"> 
            <button class="btn btn-success add-more-exam" type="button"><i class="glyphicon glyphicon-plus"></i> Add Exam</button>
          </div>
          <div class=" col-lg-12 col-md-12 col-xs-12 control-group after-add-more-cert">
            <div id="certfield0" class="field">
              <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Certification Details</div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Certificate')</label>
                  <div class="col-sm-8">
                     <select class="form-control select2" name="certif[0][certification]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Year</option>
                        @foreach(\App\CareerDetail::CERTIFICATION as $key => $value)
                        <option  {{ old('certif[0][certification]') === $key ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Passout')</label>
                  <div class="col-sm-4">
                      <select  class="form-control select2" name="certif[0][cert_passyr]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Year</option>
                        @for ($i = (int) date('Y') + 7; $i >= (int) date('Y') - 40; $i--)
                             <option  {{ old('certif[0][cert_passyr]') === $i ? 'selected' : '' }} value='{{$i}}'>{{$i}}</option>
                            @endfor
                     </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control select2" name="certif[0][cert_passmonth]" id="cert_passmonth0" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Month</option>
                            @foreach(\App\User::PASSOUT_RADIO as $key=>$month)
                            <option  {{ old('certif[0][cert_passmonth]') === $key ? 'selected' : '' }} value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                  </div>
               </div>
              
               <div style="clear: both"></div>
            <div class="input-group-btn pull-right"> 
              <button class="btn btn-danger certremove" data-certrowid="0" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
               <div style="clear: both"></div>
            </div>
         </div>

           <div class="input-group-btn"> 
            <button class="btn btn-success add-more-cert" type="button"><i class="glyphicon glyphicon-plus"></i> Add Certification</button>
          </div>
         <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">@lang('English Communication Rating')</div>
         <div class="form-group row {{ $errors->has('hq_mark')? 'has-error':'' }}">
            <label for="name" class="col-sm-4 control-label">@lang('Description')</label>
            <div class="col-sm-8">
               <select required name="eng_commrate" id="eng_commrate" class="form-control select2">
               @foreach(\App\CareerDetail::ENG_RATE as $key => $value)    
               <option  value="{{$key}}" {{ old('eng_commrate') === 1 ? 'selected' : '' }} > {{$value}} </option>
               @endforeach
               </select>
            </div>
         </div>
         <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">@lang('Others Languages Known')</div>
         <div class="form-group row {{ $errors->has('hq_mark')? 'has-error':'' }}">
            <label for="name" class="col-sm-4 control-label">@lang('Choose Language Known')</label>
            <div class="col-sm-8">
               <select name="other_languages[]" id="other_languages" class="form-control select2" multiple="">
                  <option value="">Select Languages(ctrl+click)</option>
                  @foreach(\App\CareerDetail::OTHER_LANG as $key => $value)    
                  <option  value="{{$key}}" {{ old('other_languages') === 1 ? 'selected' : '' }} > {{$value}} </option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">@lang('Brief Profile Description')</div>
         <div class="form-group row {{ $errors->has('hq_mark')? 'has-error':'' }}">
            <div class="col-sm-12">
               <textarea cols="40" rows="5" name="brief_desc" class="col-lg-12 col-md-12 col-xs-12">
               </textarea>
            </div>
         </div>

        <div class="control-group text-center">
            <br>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
      <div class="copyproject hide" style="display: none;">
          <div class=" col-lg-12 col-md-12 col-xs-12 control-group" style="margin-top:10px">
            <div id="field##num##" class="field">
              <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">My Project</div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Choose')</label>
                  <div class="col-sm-8">
                     <select required class="form-control select2" name="academic_proj[##num##][academic_projtype]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Academic Project</option>
                        @foreach(\App\CareerDetail::ACADEMIC_PROJTYPE as $key => $value)
                        <option {{ old('skill') === $key ? 'selected' : '' }} value="{{$key}}" value="{{$key}}">{{$value}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Title')</label>
                  <div class="col-sm-8">
                     <input required class="form-control valid" type="text"  name="academic_proj[##num##][academic_projname]" id="title#num" placeholder="Title">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Description')</label>
                  <div class="col-sm-8">
                     <textarea required class="form-control valid" type="text"  name="academic_proj[##num##][academic_projdesc]" id="academic_projdesc##num##" placeholder="Project Description">
                     </textarea>
                  </div>
               </div>
               <div style="clear: both"></div>
            <div class="input-group-btn pull-right"> 
              <button class="btn btn-danger projectremove" data-rowid="##num##" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
               <div style="clear: both"></div>
            </div>
          </div>
        </div>
        
        <div class="copycompexam hide" style="display: none;">
          <div class=" col-lg-12 col-md-12 col-xs-12 control-group" style="margin-top:10px">
            <div id="compfield##num##" class="field">
              <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Competitive Exam Scores</div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Choose')</label>
                  <div class="col-sm-8">
                     <select required class="form-control select2" name="compexamp[##num##][competitive_exam]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Academic Project</option>
                        @foreach(\App\CareerDetail::COMPETITIVE_EXAMS as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Score Type')</label>
                  <div class="col-sm-8">
                     @foreach(\App\CareerDetail::SCORE_TYPE as $key => $value)
                        <input type="radio" name="compexamp[##num##][score_type]"  value="{{$key}}"  /> {{$value}}
                        @endforeach
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Score')</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" step="0.01" name="compexamp[##num##][score]" value=""   />
                  </div>
               </div>
               <div style="clear: both"></div>
            <div class="input-group-btn pull-right"> 
              <button class="btn btn-danger compexamremove" data-comprowid="##num##" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
               <div style="clear: both"></div>
            </div>
          </div>
        </div>

        <div class="copycertification hide" style="display: none;">
          <div class=" col-lg-12 col-md-12 col-xs-12 control-group" style="margin-top:10px">
            <div id="certfield##num##" class="field">
              <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Certification Details</div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Certificate')</label>
                  <div class="col-sm-8">
                     <select required class="form-control select2" name="certif[##num##][certification]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Year</option>
                        @foreach(\App\CareerDetail::CERTIFICATION as $key => $value)
                        <option  value="{{$key}}">{{$value}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Passout')</label>
                  <div class="col-sm-4">
                      <select required class="form-control select2" name="certif[##num##][cert_passyr]"  style="color: rgb(51, 51, 51);">
                        <option value="">Select Year</option>
                        @for ($i = (int) date('Y') + 7; $i >= (int) date('Y') - 40; $i--)
                             <option  value='{{$i}}'>{{$i}}</option>
                            @endfor
                     </select>
                  </div>
                  <div class="col-sm-4">
                    <select required class="form-control select2" name="certif[##num##][cert_passmonth]" id="cert_passmonth##num##" style="color: rgb(51, 51, 51);">
                            <option value="">Passout Month</option>
                            @foreach(\App\User::PASSOUT_RADIO as $key=>$month)
                            <option value="{{$key}}">{{$month}}</option>
                            @endforeach
                        </select>
                  </div>
               </div>
              
               <div style="clear: both"></div>
            <div class="input-group-btn pull-right"> 
              <button class="btn btn-danger certremove" data-certrowid="##num##" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
               <div style="clear: both"></div>
            </div>
          </div>
        </div>
   </div>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
@include('layouts.javascript')
<script type="text/javascript">
   function setMaximum(marktype)
   {
       if(marktype == 1)
       $(this).attr("max",100);
       else    
       $(this).attr("max",10);
   }
    $(document).ready(function() {
      var prjcount = '{{count($academic_projects)}}'; 
      var compexcount =  '{{count($competitive_exams)}}';
      var certcount =  '{{count($certifications)}}';
      $(".add-more-exam").click(function(){ 
        var removelength = $('.compexamremove').length;
        if(removelength <=3)
          {
            if(compexcount >= 0)
            var html = $(".copycompexam").html().replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount).replace('##num##', compexcount);
            $(".after-add-more-compexam").after(html);
            compexcount++;
            $(this).data("comprowid", compexcount);
          }
      });

      $(".add-more-cert").click(function(){ 
        var removelength = $('.certremove').length;
        if(removelength <=3)
          {
            if(certcount >= 0)
            var html = $(".copycertification").html().replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount).replace('##num##', certcount);
            $(".after-add-more-cert").after(html);
            certcount++;
            $(this).data("certrowid", certcount);
          }
      });
      
        $(".add-more").click(function(){ 
          var removelength = $('.projectremove').length;
          if(removelength <=3)
          {
            if(prjcount >= 0)
            var html = $(".copyproject").html().replace('##num##', prjcount).replace('##num##', prjcount).replace('##num##', prjcount).replace('##num##', prjcount).replace('##num##', prjcount).replace('##num##', prjcount);
            $(".after-add-more").after(html);
            prjcount++;
          }
        });

        $("body").on("click",".projectremove",function(){ 
          
          var len = $('.projectremove').length;
          if(len==2)
          {
            $(this).hide();
            return false;
          }
          prjcount--;
           var divid = $(this).data("rowid");
           $("#field"+divid).remove();
          
        });

      $("body").on("click",".compexamremove",function(){ 
          
          var len = $('.compexamremove').length;
          if(len==2)
          {
            $(this).hide();
            return false;
          }
          compexcount--;
           var divid = $(this).data("comprowid");
           $("#compfield"+divid).remove();
          
        });
        $("body").on("click",".certremove",function(){ 
          
          var len = $('.certremove').length;
          if(len==2)
          {
            $(this).hide();
            return false;
          }
          compexcount--;
           var divid = $(this).data("certrowid");
           $("#certfield"+divid).remove();
          
        });        
    });
</script>
@endsection