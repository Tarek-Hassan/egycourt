@extends('layouts.app')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Administration</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">Roles</a></li>
            <li class="breadcrumb-item"></li>
        </ol>
    </nav>
</div>
<div class="statbox widget box box-shadow layout-top-spacing">

    <div class="widget-content widget-content-area">
        @permission('Role-Create')
        <div class="row">
            <div class="col-md-12 text-right mb-5">
            <a href="{{route('roles.create')}}" class="btn btn-primary">{{trans('roles.create_new_role')}}</a>
            </div>
        </div>
        @endpermission
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed mb-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('roles.name')}}</th>
                        <th class="text-center">{{trans('roles.permission_count')}}</th>
                        <th class="text-center">{{trans('roles.users_count')}}</th>
                        <th class='text-center' style='width:100px;'></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ App\Helpers\Utils::rowNumber($items,$loop)}}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">{{ $item->permissions->count() }}</td>
                            <td class="text-center">{{ $item->users->count() }}</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    @permission('Role-Edit')
                                    <li>
                                        <a href="{{route('roles.edit',['role'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit">
                                            <i class="far fa-edit text-success"></i>
                                        </a>
                                    </li>
                                    @endpermission
                                    @permission('Role-Show')
                                    <li>
                                        <a href="{{route('roles.show',['role'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="show">
                                            <i class="far fa-eye text-primary"></i>
                                        </a>
                                    </li>
                                    @endpermission
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5">{{ trans('home.no_data_found')}}</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
        <div class="paginating-container">
            {{ $items->links() }}
        </div>
    </div>
</div>

@endsection
