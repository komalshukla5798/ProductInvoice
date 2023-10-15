@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.employee') }}
    </div>

    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                <label for="phone_number">{{ trans('global.phone_number') }}*</label>
                <input type="number" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" onkeypress="if(this.value.length > 10) return false; ">
                @if($errors->has('phone_number'))
                    <p class="help-block">
                        {{ $errors->first('phone_number') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('global.status') }}*</label>
                <input type="radio" id="status" name="status" value="1" @if(old('status') === '1') checked="checked" @endif>Active
                <input type="radio" id="status" name="status" value="0" @if(old('status') === '0') checked="checked" @endif>Inactive
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                <a class="btn btn-default" href="{{ route('employees.index') }}">
                {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection