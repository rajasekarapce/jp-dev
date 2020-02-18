@extends('layouts.dashboard')
@section('content')
<div class="row">
   <div class="col-md-10">
      <form method="post" action="">
         @csrf
         <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
            <label for="name" class="col-sm-4 control-label">@lang('app.name')</label>
            <div class="col-sm-8">
               <input type="text" class="form-control {{e_form_invalid_class('name', $errors)}}" id="name" value="{!! $skill->name !!}" name="name" placeholder="@lang('app.name')">
               {!! e_form_error('name', $errors) !!}
            </div>
         </div>
         <div class="form-group row {{ $errors->has('status')? 'has-error':'' }}">
            <label for="status" class="col-sm-4 control-label">@lang('app.status')</label>
            <div class="col-sm-8">
               @foreach(App\Skill::STATUS_RADIO as $key => $label)
               <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                  <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $skill->status) === $key ? 'checked' : '' }} required>
                  <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
               </div>
               @endforeach
               {!! e_form_error('status', $errors) !!}
            </div>
         </div>
        
         
         <div class="form-group row">
            <div class="col-sm-offset-4 col-sm-8">
               <button type="submit" class="btn btn-primary">@lang('app.update_skill')</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection