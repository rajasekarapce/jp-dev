@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-10">


            <form method="post" action="">
                @csrf

                <div class="form-group row {{ $errors->has('course')? 'has-error':'' }}">
                    <label for="course" class="col-sm-4 control-label">@lang('app.course')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control {{e_form_invalid_class('course', $errors)}}" id="course" value="{{ old('course') }}" name="course" placeholder="@lang('app.course')">

                        {!! e_form_error('course', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('qual_type')? 'has-error':'' }}">
                    <label for="qual_type" class="col-sm-4 control-label">@lang('app.qual_type')</label>
                    <div class="col-sm-8">
                        @foreach(App\Qualification::TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('qual_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="qual_type" value="{{ $key }}" {{ old('qual_type', '0') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach

                        {!! e_form_error('qual_type', $errors) !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('popular')? 'has-error':'' }}">
                    <label for="popular" class="col-sm-4 control-label">@lang('app.popular')</label>
                    <div class="col-sm-8">
                        @foreach(App\Qualification::POPULAR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('popular') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="popular_{{ $key }}" name="popular" value="{{ $key }}" {{ old('popular', 1) === $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="popular_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach

                        {!! e_form_error('status', $errors) !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('status')? 'has-error':'' }}">
                    <label for="status" class="col-sm-4 control-label">@lang('app.status')</label>
                    <div class="col-sm-8">
                        @foreach(App\Qualification::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', 1) === $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach

                        {!! e_form_error('status', $errors) !!}
                    </div>
                </div>

                


                <div class="form-group row">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">@lang('app.save_new_qualification')</button>
                    </div>
                </div>

            </form>

        </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>@lang('app.course')</th>
                    <th>#</th>
                </tr>
                @foreach($qualifications as $qualification)
                    <tr>
                        <td>
                            {{ $qualification->course }}
                        </td>
                        <td>
                            <a href="{{ route('edit_qualifications', $qualification->id) }}" class="btn btn-info"><i class="la la-pencil"></i> </a>
                            <a href="javascript:;" class="btn btn-danger category_delete" data-id="{{ $qualification->id }}"><i class="la la-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>



@endsection