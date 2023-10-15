@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.employee') }}
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
                            {{ $employee->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.email') }}
                        </th>
                        <td>
                            <a href="mailto:{{ $employee->email ?? '' }}">{{ $employee->email ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.phone_number') }}
                        </th>
                        <td>
                            <a href="tel:{{ $employee->phone_number ?? '' }}">{{ $employee->phone_number ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.status') }}
                        </th>
                        <td>
                            @if($employee->status == 1) Active @else Inactive @endif
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