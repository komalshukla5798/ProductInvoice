@extends('layouts.app')
@section('content')
<style type="text/css">
    h4{
        text-align: right;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <h4 for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</h4>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <h4 for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</h4>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <!-- <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> -->
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10 offset-md-2">

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> {{ __('Help ?') }}</button>

                                <button type="submit" class="btn btn-rose">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-info" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            @php $emails = App\Models\User::pluck('email'); @endphp
                            <table class="table table-bordered">
                                <tr>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                                @forelse($emails as $email)
                                <tr>
                                    <td>{{$email}}</td>
                                    <td>123456</td>
                                </tr>
                                @empty
                                    <tr><td colspan="2"><center><a href="{{ route('seed') }}" class="btn btn-rose">Seed Database</a></center></td></tr>
                                @endforelse
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
