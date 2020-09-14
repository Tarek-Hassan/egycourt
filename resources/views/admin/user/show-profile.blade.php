@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <div class="widget-heading">
                </div>
                <div class="widget-content widget-content-area">
                <form id="createForm" action="#" method="get">
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
                                <a href="{{route('home')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
                            </div>
                       </div>


                    </form>
                </div>
            </div>

        </div>
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

