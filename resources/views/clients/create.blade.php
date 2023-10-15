@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.client') }}
    </div>

    <div class="card-body">
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
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

            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('global.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}">
                @if($errors->has('address'))
                    <p class="help-block">
                        {{ $errors->first('address') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">{{ trans('global.city') }}*</label>
                <select id="city" name="city" class="form-control">
                    <option value="">--Select city--</option>
                    <option @if(old('city') == "Ahmedabad") selected="selected" @endif>Ahmedabad</option>
                    <option @if(old('city') == "Gandhinagar") selected="selected" @endif>Gandhinagar</option>
                    <option @if(old('city') == "Vadodara") selected="selected" @endif>Vadodara</option>
                </select>
                @if($errors->has('city'))
                    <p class="help-block">
                        {{ $errors->first('city') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('global.notes') }}*</label>
                <input type="text" id="notes" name="notes" class="form-control" value="{{ old('notes') }}">
                @if($errors->has('notes'))
                    <p class="help-block">
                        {{ $errors->first('notes') }}
                    </p>
                @endif
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                <a class="btn btn-default" href="{{ route('clients.index') }}">
                {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
     var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#logo-display').attr('src', e.target.result).attr('height', '100').attr('width', '100').attr('style', 'display:visible;margin-top:10px;');
            $('#logo-display').parent().attr('href', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#logo-input").on('change', function(){
    readURL(this);
});
</script>
@endsection