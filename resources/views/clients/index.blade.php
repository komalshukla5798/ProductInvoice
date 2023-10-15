@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.clients') }} {{ trans('global.list') }}
        <a class="btn btn-success" href="{{ route('clients.create') }}" style="float: right;">
                {{ trans('global.add') }} {{ trans('global.client') }}
        </a>
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
                            {{ trans('global.email') }}
                        </th>
                        <th>
                            {{ trans('global.city') }}
                        </th>
                        <th>
                            {{ trans('global.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$clients && count($clients) >0)
                    @foreach($clients as $key => $model)
                        <tr>
                            
                            <td>
                                {{ $model->id ?? '' }}
                            </td>
                        
                            <td>
                                {{ $model->name ?? '' }}
                            </td>
                            <td>
                                <a href="mailto:{{ $model->email ?? '' }}">{{ $model->email ?? '' }}</a>
                            </td>
                            <td>
                                 {{ $model->city ?? '' }}
                            </td>
                            <td>
                                {{App\Helpers\Helper::edit_view_delete_button($model,"clients","Y","Y","Y")}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                     <tr><td colspan="6" align="center">No Records Found</tr>
                    @endif
                </tbody>
            </table>
            <div style="">{{ $clients->links() }}</div>
        </div>
    </div>
</div>

@endsection