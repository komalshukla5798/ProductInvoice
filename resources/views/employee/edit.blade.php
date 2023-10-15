@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.employee') }}
    </div>

    <div class="card-body">
        <form action="{{ route('employees.update', [$employee->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">{{ trans('global.first_name') }}*</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($employee) ? $employee->first_name : '') }}">
                @if($errors->has('first_name'))
                    <p class="help-block">
                        {{ $errors->first('first_name') }}
                    </p>
                @endif
            </div>

              <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">{{ trans('global.last_name') }}*</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($employee) ? $employee->last_name : '') }}">
                @if($errors->has('last_name'))
                    <p class="help-block">
                        {{ $errors->first('last_name') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                <label for="company">{{ trans('global.company') }}*</label>
                 <select id="company" name="company" class="form-control"  style="height: 35px;">
                    <option value="" selected="">Select</option>
                    @foreach($companies as $company)                          
                    <option value="{{$company['id']}}"{{ (@$company['id'] == @$employee->company) ? 'selected' : '' }}>{{ $company['name'] }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <p class="help-block">
                        {{ $errors->first('company') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($employee) ? $employee->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('global.phone') }}*</label>
                <input type="number" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($employee) ? $employee->phone : '') }}" onkeypress="if(this.value.length > 10) return false; ">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
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