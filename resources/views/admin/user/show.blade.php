@extends('layouts.app')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">{{trans('menu.administration')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{trans('menu.users')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{$user->name}}</a></li>
            <li class="breadcrumb-item"></li>
        </ol>
    </nav>
</div>
    <div class="statbox widget box box-shadow layout-top-spacing">
        <div class="widget-content widget-content-area">
        <form id="createForm" action="{{route('users.edit',['user'=>$user->id])}}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{trans('user.avatar')}}:</label>
                        <div class="avatar avatar-xl ">
                        <img alt="avatar" src="{{$user->getAvatarUrl()}}" class="rounded" />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="userName">{{trans('user.user_name')}}</label>
                        <input type="text" class="form-control" id="userName" value="{{$user->name}}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fullName">{{trans('user.full_name')}}</label>
                        <input type="text" class="form-control" id="fullName"  value="{{$user->full_name}}" disabled>
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="email">{{trans('user.email')}}</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" disabled >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="empCode">{{trans('user.employee_no')}}</label>
                        <input type="text" class="form-control" id="empCode" name="employee_no" value="{{$user->employee_no}}" disabled>
                    </div>
                </div>
                <hr/>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="status">{{trans('user.status')}}</label>
                        <input type="text" class="form-control"  value="{{$user->is_active == "1" ? 'Enabled':'Disabled'}}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="role">{{trans('user.role')}} <span class="text-warning"></label>
                            <input type="text" class="form-control"  value="{{optional($user->roles->first())->name}}" disabled>

                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-md-12 text-center">
                        @permission('User-Edit')
                        <button type="submit" class="btn btn-primary mt-3">{{trans('forms.edit')}}</button>
                        @endpermission
                        <a href="{{route('users.index')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
                    </div>
                </div>


            </form>
        </div>
    </div>


@endsection
@push('styles')
<link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css" />
<style>
.avatar img {
    object-fit: scale-down;
}
.companies li{
    color: #212529;
}
</style>
@endpush

