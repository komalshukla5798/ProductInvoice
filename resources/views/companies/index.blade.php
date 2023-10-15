@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.companies') }} {{ trans('global.list') }}
        <a class="btn btn-success" href="{{ route('companies.create') }}" style="float: right;">
                {{ trans('global.add') }} {{ trans('global.company') }}
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
                            {{ trans('global.logo') }}
                        </th>
                         <th>
                            {{ trans('global.website') }}
                        </th>
                        <th>
                            {{ trans('global.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$companies && count($companies) >0)
                    @foreach($companies as $key => $model)
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
                                 <a data-fancybox  href="{{ $model->logo ?? '' }}" target="_blank"><img src="{{ $model->logo ?? '' }}" height="50" width="50" class="img-thumbnail"></a>
                            </td>
                            <td>
                                 <a href="{{ $model->website ?? '' }}" target="_blank">{{ $model->website ?? '' }}</a>
                            </td>
                            <td>
                                {{edit_view_delete_button($model,"companies","Y","Y","Y")}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                     <tr><td colspan="6" align="center">No Records Found</tr>
                    @endif
                </tbody>
            </table>
            <div style="">{{ $companies->links() }}</div>
        </div>
    </div>
</div>

@endsection