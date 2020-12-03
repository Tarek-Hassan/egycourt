@extends('layouts.app')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">{{trans('menu.administration')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{trans('menu.users')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{trans('user.create_new')}}</a></li>
            <li class="breadcrumb-item"></li>
        </ol>
    </nav>
</div>

<div class="statbox widget box box-shadow layout-top-spacing">

    <div class="widget-content widget-content-area">
    <form id="createForm" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="custom-file-container" data-upload-id="avatar">
                        <label>{{trans('user.avatar')}} <span class="text-warning"> ( {{trans('user.max_image')}}) </span><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="avatar" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" disabled value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>

                    @error('avatar')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="userName">{{trans('user.user_name')}} * <span class="text-warning"> ( {{trans('user.username_rule')}}) </span></label>
                <input type="text" class="form-control" id="userName" name="name" value="{{old('name')}}"
                        placeholder="{{trans('user.user_name')}}" autocomplete="off" autofocus maxlength="30">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="fullName">{{trans('user.full_name')}} *</label>
                <input type="text" class="form-control" id="fullName" name="full_name" value="{{old('full_name')}}"
                        placeholder="{{trans('user.full_name')}}" autocomplete="off" maxlength="128">
                    @error('full_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="passwordInput">{{trans('login.password')}} * <span class="text-warning"> ( {{trans('user.password_rule')}}) </span></label>
                    <input type="password" class="form-control" id="passwordInput" name="password" maxlength="30"
                        placeholder="{{trans('login.password')}}" autocomplete="off" >
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="passwordConfirmInput">{{trans('login.password_confirmation')}} *</label>
                    <input type="password" class="form-control" id="passwordConfirmInput" name="password_confirmation" maxlength="30"
                        placeholder="{{trans('login.password_confirmation')}}" autocomplete="off">
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="email">{{trans('user.email')}}</label>
                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" maxlength="128"
                        placeholder="{{trans('user.email')}}" autocomplete="off" >
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="empCode">{{trans('user.employee_no')}}</label>
                <input type="text" class="form-control" id="empCode" name="employee_no" value="{{old('employee_no')}}"
                        placeholder="{{trans('user.employee_no')}}" autocomplete="off" maxlength="15" >
                    @error('employee_no')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <hr/>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="role">{{trans('circut.court_id')}}</label>
                    <select class="selectpicker show-tick form-control" id="court_id" data-live-search="true" name="court_id" title="{{trans('forms.select')}}">
                        @foreach ($courts as $item)
                        <option value="{{$item->id}}" {{$item->id == old('court_id') ? 'selected' :''}}>{{App::isLocale('en') ? $item->name_en :$item->name_ar}}</option>
                        @endforeach
                    </select>
                    @error('court_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="circut_id">{{trans('circut_court_speciality.circut_id')}} *</label>
                    <select class="selectpicker form-control " id="circut_id"  name="circut_id" data-size="10" title="{{trans('forms.select')}}" disabled>
        
                    </select>
                    @error('circut_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="role">{{trans('user.role')}} <span class="text-warning"> ({{trans('user.role_rule')}})</span></label>
                    <select class="selectpicker show-tick form-control" id="role" data-live-search="true" name="role" title="{{trans('forms.select')}}">
                        @foreach ($roles as $item)
                        <option value="{{$item->id}}" {{$item->id == old('role') ? 'selected' :''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="status">{{trans('user.status')}}</label>
                    <select class="selectpicker form-control"  name="is_active">
                        <option value="1" {{ old('status') == "1" ? 'selected':'' }}>{{trans('user.enabled')}}</option>
                        <option value="0" {{ old('status') == "0" ? 'selected':'' }}>{{trans('user.disabled')}}</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">{{trans('forms.create')}}</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
                </div>
            </div>


        </form>
    </div>
</div>
@endsection
@push('styles')
<link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .custom-file-container label {
    color: #3b3f5c;
}
.custom-file-container__image-preview{
    display: none;
}
</style>
@endpush
@push('scripts')
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{ asset('app/admin/user.js') }}"></script>
    <script>
        var alertTitle = "{{trans('user.alert_title')}}";
        var alertCreateUser = "{{trans('user.alert_create_user')}}"
        var createUser = "{{trans('user.create_new')}}";
        var cancel = "{{trans('forms.cancel')}}";

        var firstUpload = new FileUploadWithPreview('avatar',{
            images: {
                    baseImage: '{{asset('assets/img/profile.png')}}',
                }
        })
    </script>
    <script>
        $(function(){
                $('.row #court_id').change();
        })
        $(".row").on('change', '#court_id', function () {

            let court_id = $("#court_id").val();
            let circut =$("#circut_id");

            $.ajax({
                url: '/master/circut_court',
                method: "GET",
                data: {
                    court:court_id,
                }
            }).done(function (response) {
            
                circut.empty();
                if (response.length > 0) {
                
                    circut.attr('disabled', false);
                    $.each(response, function (key, value) {
                        circut.append('<option value=' + value.id + '> ' + value.year +'/'+value.circut_no +'</option>');
                    });
                }else{
                    circut.attr('disabled', true);
                }
                circut.selectpicker('refresh');
            }).fail(function () {
                circut.attr('disabled', true);
            });

        });

    </script>
@endpush

