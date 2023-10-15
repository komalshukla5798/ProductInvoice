@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.company') }}
    </div>

    <div class="card-body">
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
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

             <div class="form-group logo {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">{{ trans('global.logo') }}*</label>
                <input type="file" id="logo-input" name="logo" class="form-control" accept="image/*">
                @if($errors->has('logo'))
                <p class="help-block">
                    {{ $errors->first('logo') }}
                </p>
                @endif
                <a data-fancybox href=""><img id="logo-display" class="img-thumbnail" height="100" width="100"></a>
            </div>

            <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                <label for="website">{{ trans('global.website') }}</label>
                <input type="url" id="website" name="website" class="form-control" value="{{ old('website') }}">
                @if($errors->has('website'))
                    <p class="help-block">
                        {{ $errors->first('website') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                <a class="btn btn-default" href="{{ route('companies.index') }}">
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