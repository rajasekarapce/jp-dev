@extends('layouts.dashboard')


@section('content')
    <div class="row">
        <div class="col-md-12">


            <form action="" method="post" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group row" id="user-image">
                    <label for="logo" class="col-md-4 col-form-label">{{ __('app.resume') }} </label>
                    <div class="col-md-8">
                    <br /><br />
                        <div class="company-logo mb-3" style="max-width: 100px;">
                            <!-- <img src="{{URL::to('/')}}{{ ('/uploads/logos/'.$logo) }}" class="img-fluid" /> -->
                            <a href="{{URL::to('/')}}{{ ('/uploads/resume/'.$resume) }}">View</a>
                        </div>
                        <input type="file" name="resume" class="form-control">
                        <p class="text-muted">Logo will be resize at (256X256), make sure your logo image is square</p>
                        {!! e_form_error('logo', $errors) !!}
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



@endsection