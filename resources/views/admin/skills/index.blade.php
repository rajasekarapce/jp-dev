@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-10">


            <form method="post" action="">
                @csrf

                <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('app.name')</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control {{e_form_invalid_class('name', $errors)}}" id="name" value="{{ old('name') }}" name="name" placeholder="@lang('app.name')">

                        {!! e_form_error('name', $errors) !!}
                    </div>
                </div>

                
                
                <div class="form-group row {{ $errors->has('status')? 'has-error':'' }}">
                    <label for="status" class="col-sm-4 control-label">@lang('app.status')</label>
                    <div class="col-sm-8">
                        @foreach(App\Skill::STATUS_RADIO as $key => $label)
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
                        <button type="submit" class="btn btn-primary">@lang('app.save_new_skill')</button>
                    </div>
                </div>

            </form>

        </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>@lang('app.skill')</th>
                    <th>#</th>
                </tr>
                @foreach($skills as $skill)
                    <tr>
                        <td>
                            {{ $skill->name }}
                        </td>
                        <td>
                            <a href="{{ route('edit_skills', $skill->id) }}" class="btn btn-info"><i class="la la-pencil"></i> </a>
                            <a href="javascript:;" class="btn btn-danger category_delete" data-id="{{ $skill->id }}"><i class="la la-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>



@endsection