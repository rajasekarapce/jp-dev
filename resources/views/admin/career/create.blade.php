@extends('layouts.dashboard')
@section('content')
<div class="row">
   <div class="col-md-12 qualification_panel">
      <form action="{{route('career_details')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">Skill Set</div>
         <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
            <div class="col-sm-8">
               <select required multiple class="form-control select2" name="skills[]"  style="color: rgb(51, 51, 51);">
                  <option value="">Select Skills (ctrl+click)</option>
                  @foreach($skills as $key => $skill)
                  <option {{ old('skill') === $skill->id ? 'selected' : '' }} value="{{$skill->id}}" value="{{$skill->id}}">{{$skill->name}}</option>
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
         <div class="form-group row {{ $errors->has('hold_offer')? 'has-error':'' }}">
            <label for="name" class="col-sm-4 control-label">@lang('Are you holding an offer?') <span class="color-red">*</span></label>
            @foreach(\App\CareerDetail::HOLD_OFFER as $key => $value)    
            <div class="col-sm-4">
               <input required type="radio" name="hold_offer" id="hold_offer{{$key}}" value="{{$key}}" style="vertical-align: sub;" {{ old('hold_offer') === 1 ? 'checked' : '' }} > {{$value}}
            </div>
            @endforeach
         </div>
         <div class=" col-lg-12 col-md-12 col-xs-12 qualification_title">@lang('My Project Works')</div>
         <div id="field">
            <div id="field0" class="field">
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Choose')</label>
                  <div class="col-sm-8">
                     <select required class="form-control select2" name="academic_proj[0][academic_projtype]"  style="color: rgb(51, 51, 51);">
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
                     <input required class="form-control valid" type="text"  name="academic_proj[0][academic_projname]" id="title0" placeholder="Title">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="name" class="col-sm-4 control-label">@lang('Description')</label>
                  <div class="col-sm-8">
                     <textarea required class="form-control valid" type="text"  name="academic_proj[0][academic_projdesc]" id="academic_projdesc0" placeholder="Project Description">
                     </textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class=" col-lg-12 col-md-12 col-xs-12  row form-group">
            <div class="pull-left">
               <button id="add-more" name="add-more" class="btn btn-primary ">Add More</button>
            </div>
           
         </div>
         <div style="clear:both"></div>
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
               <select required name="other_languages[]" id="other_languages" class="form-control select2" multiple="">
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
   function setMaximum(type, marktype)
   {
       if(marktype == 1)
       $('input[name='+type+']').attr("max",100);
       else    
       $('input[name='+type+']').attr("max",10);
   }
   $(document).ready(function () {
   //@naresh action dynamic childs
   var next = 0;
   $("#add-more").click(function(e){
       e.preventDefault();
       var addto = "#field" + next;
       var addRemove = "#field" + (next);
       next = next + 1;
       var btnlength = $('button.remove-me').length;
       if(btnlength >= 2)
       {
        $('#add-more').hide();
        return false;
       }
       
           
       var newIn = '<div id="field'+ next +'"><div id="field0"><div class="form-group row "><label for="name" class="col-sm-4 control-label">@lang('Choose')</label><div class="col-sm-8"><select required class="form-control select2" name="academic_proj['+next+'][academic_projtype]"  style="color: rgb(51, 51, 51);"><option value="">Select Academic Project</option>@foreach(\App\CareerDetail::ACADEMIC_PROJTYPE as $key => $value)<option value="{{$key}}" value="{{$key}}">{{$value}}</option>@endforeach</select></div></div><div class="form-group row "><label for="name" class="col-sm-4 control-label">@lang('Title')</label><div class="col-sm-8"><input required class="form-control valid" type="text"  name="academic_proj['+next+'][academic_projname]" id="academic_proj'+next+'"  ></div></div><div class="form-group row "><label for="name" class="col-sm-4 control-label">@lang('Description')</label><div class="col-sm-8"><textarea required class="form-control valid" type="text"  name="academic_proj['+next+'][academic_projdesc]" id="academic_projdesc" placeholder="Project Description" ></textarea></div></div><div class="form-group"><div class="col-md-4">';
       
       var newInput = $(newIn);
       var removeBtn = '<button data-btnid="'+ (next - 1) +'" id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div></div></div><div style="clear:both; margin-bottom:10px;"></div>';
       var removeButton = $(removeBtn);
       $(addto).after(newInput);
       $(addRemove).after(removeButton);
       $("#field" + next).attr('data-source',$(addto).attr('data-source'));
       //$("#count").val(next);  
       
           $('.remove-me').click(function(e){
               e.preventDefault();
               var btnlength = $('.remove-me').length;
                if(btnlength)
                  $('#add-more').show();
                if(btnlength != 0)
                {
                var btnid = $(this).data('btnid');

               var fieldID = "#field" + btnid;
               
               $(this).remove();
               $(fieldID).remove();
                }
               
           });
   });
   
   });
</script>
@endsection