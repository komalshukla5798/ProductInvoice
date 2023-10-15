@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.employees') }} {{ trans('global.list') }}
        <a class="btn btn-success" href="{{ route('employee.create') }}" style="float: right;">
                {{ trans('global.add') }} {{ trans('global.employee') }}
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
                            {{ trans('global.company') }}
                        </th>
                         <th>
                            {{ trans('global.phone') }}
                        </th>
                        <th>
                            {{ trans('global.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$employees && count($employees) >0)
                    @foreach($employees as $key => $model)
                        <tr>
                            
                            <td>
                                {{ $model->id ?? '' }}
                            </td>
                        
                            <td>
                                {{ $model->first_name ?? '' }} {{ $model->last_name ?? '' }}
                            </td>
                            <td>
                                <a href="mailto:{{ $model->email ?? '' }}">{{ $model->email ?? '' }}</a>
                            </td>
                            <td>
                                 <a href="{{ route('companies.show',$model->company) }}">{{ $model->Company->name ?? '' }}</a>
                            </td>
                            <td>
                                 <a href="tel:{{ $model->phone ?? '' }}">{{ $model->phone ?? '' }}</a>
                            </td>
                            <td>
                                {{edit_view_delete_button($model,"employees","Y","Y","Y")}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                     <tr><td colspan="6" align="center">No Records Found</tr>
                    @endif
                </tbody>
            </table>
            <div style="">{{ $employees->links() }}</div>
        </div>
    </div>
</div>
@endsection