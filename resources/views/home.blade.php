@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-rose">{{ __('Dashboard') }}</div>

                <div class="card-body" style="text-align:center;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="text-info">Welcome <p class="text-dark">{{ Auth::user()->name }}</p></h3>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Products CRUD</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
