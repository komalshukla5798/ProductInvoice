@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.posts') }} {{ trans('global.list') }}
        <a class="btn btn-success" href="{{ route('posts.create') }}" style="float: right;">
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
                            {{ trans('global.action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$posts && count($posts) >0)
                    @foreach($posts as $key => $model)
                        <tr>
                            
                            <td>
                                {{ $model->id ?? '' }}
                            </td>
                            <td>
                                {{ $model->detail->title ?? '' }}
                            </td>
                            <td>
                                {{edit_view_delete_button($model,"posts","Y","Y","Y")}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                     <tr><td colspan="6" align="center">No Records Found</tr>
                    @endif
                </tbody>
            </table>
            <div style="">{{ $posts->render() }}</div>
        </div>
    </div>
</div>
@endsection