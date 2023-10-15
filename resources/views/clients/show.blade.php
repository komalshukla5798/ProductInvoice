@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.client') }}
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
                            {{ $client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.email') }}
                        </th>
                        <td>
                           <a href="mailto:{{ $client->email ?? '' }}">{{ $client->email ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.address') }}
                        </th>
                        <td>
                            {{ $client->address ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.city') }}
                        </th>
                        <td>
                             {{ $client->city ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('global.notes') }}
                        </th>
                        <td>
                            {{ $client->notes ?? '' }}
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