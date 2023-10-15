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
                            {{ $employee->first_name ?? '' }} {{ $employee->last_name ?? '' }}
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
                            {{ trans('global.company') }}
                        </th>
                        <td>
                           <a href="{{ route('companies.show',$employee->company) }}">{{ $employee->Company->name ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.phone') }}
                        </th>
                        <td>
                            <a href="tel:{{ $employee->phone ?? '' }}">{{ $employee->phone ?? '' }}</a>
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