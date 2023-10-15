@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.company') }}
    </div>

    <div class="card-body">
        <div class="mb-2 table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('global.name') }}
                        </th>
                        <td>
                            {{ $company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.email') }}
                        </th>
                        <td>
                           <a href="mailto:{{ $company->email ?? '' }}">{{ $company->email ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.logo') }}
                        </th>
                        <td>
                             <a data-fancybox  href="{{ $company->logo ?? '' }}" target="_blank"><img src="{{ $company->logo ?? '' }}" height="100" width="100" class="img-thumbnail"></a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.website') }}
                        </th>
                        <td>
                            <a href="{{ $company->website ?? '' }}" target="_blank">{{ $company->website ?? '' }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection