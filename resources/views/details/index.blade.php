@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.details') }} {{ trans('global.list') }}

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th>
                            {{ trans('global.id') }}
                        </th>
                        <th>
                            {{ trans('global.name') }}
                        </th>
                        <th>
                            {{ trans('global.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$details && count($details) >0)
                    @foreach($details as $key => $model)
                        <tr>
                            
                            <td>
                                {{ $model->id ?? '' }}
                            </td>
                            <td>
                                {{ $model->post->name ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                    @else
                     <tr><td colspan="6" align="center">No Records Found</tr>
                    @endif
                </tbody>
            </table>
            <div style="">{{ $details->render() }}</div>
        </div>
    </div>
</div>
@endsection