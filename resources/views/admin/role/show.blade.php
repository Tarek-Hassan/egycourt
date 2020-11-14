@extends('layouts.app')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{trans('menu.administration')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{trans('menu.roles')}}</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{$role->name}}</a></li>
        <li class="breadcrumb-item"></li>
    </ol>
    </nav>
</div>

<div class="statbox widget box box-shadow layout-top-spacing">
    <div class="widget-content widget-content-area">
    <form id="createForm" action="{{route('roles.edit',['role'=>$role])}}" method="get">
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="roleName">{{trans('roles.name')}}</label>
                <input type="text" class="form-control" id="roleName" disabled value="{{$role->name}}">
                </div>
            </div>
            <hr/>
            <h4 class="kt-section__title">{{trans('roles.role_permissions')}}:</h4>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:350px;" class="align-middle">{{trans('roles.permission_name')}}</th>
                                <th>{{trans('roles.permission_actions')}}
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $group=>$actions)
                            <tr>
                                <td class="text-left">{{ ucwords($group)}}</td>
                                <td>
                                    @foreach ($actions as $action)
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-danger">
                                            <input type="checkbox" class="new-control-input" checked disabled>
                                            <span class="new-control-indicator"></span>{{$action->display_name}}
                                        </label>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    @permission('Role-Edit')
                    <button type="submit" class="btn btn-primary mt-3">{{trans('forms.edit')}}</button>
                    @endpermission
                    <a href="{{route('roles.index')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
                </div>
            </div>


        </form>
    </div>


@endsection
@push('styles')
<link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{ asset('app/admin/role.js') }}"></script>
@endpush

