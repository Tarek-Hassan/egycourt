@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <div class="widget-heading">
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{trans('general.master_data')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('court_schedules.index') }}">{{trans('court_schedule.court_schedule')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">
                                    {{ trans('general.create_new') }}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">

                    <form id="createForm" action="{{ route('court_schedules.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label >{{trans('court_schedule.user_name')}}</label>
                                <input  class="form-control"   value="{{Auth::user()->full_name}}" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label >{{trans('court_schedule.court_id')}}</label>
                                <input  class="form-control"   value="{{App::isLocale('en') ? Auth::user()->court->name_en : Auth::user()->court->name_ar}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label >{{trans('court_schedule.circut_id')}}</label>
                                <input  class="form-control"   value="{{Auth::user()->circut->year}}/{{Auth::user()->circut->circut_no}}" disabled>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="court_speciality_id">{{trans('court_schedule.court_speciality_id')}} *</label>
                                <select class="selectpicker form-control get_court" id="court_speciality_id"  name="court_speciality_id" data-size="10" title="{{trans('forms.select')}}">

                                    @foreach ($court_specialists as $court_specialist)    
                                        <option value="{{$court_specialist->id}}" > {{App::isLocale('en') ? $court_specialist->name_en :$court_specialist->name_ar}} </option>
                                    @endforeach
                                       
                                </select>
                                @error('court_speciality_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="circut_no_Input">{{ trans('court_schedule.role_no') }} *</label>
                                <input type="text" class="form-control" id="role_no_Input" name="role_no" value="{{ old('role_no') }}"
                                    placeholder="{{ trans('court_schedule.role_no') }}"
                                    autocomplete="disabled" autofocus>
                                @error('role_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="case_date">{{ trans('court_schedule.case_date') }} *</label>
                                <input id="case_date" value="{{ today() }}" name="case_date" 
                                        class="form-control form-control-sm flatpickr flatpickr-input active" type="text">
                                @error('case_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                       
                        {{-- start::partial form --}}
                        @include('master.court_schedules.add_details')
                        {{-- End::partial form --}}
                    
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit"
                                    class="btn btn-primary mt-3">{{ trans('forms.create') }}</button>
                                <a href="{{ route('court_schedules.index') }}"
                                    class="btn btn-danger mt-3">{{ trans('forms.cancel') }}</a>
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
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
<script>
    var deposit_date = flatpickr(document.getElementById('case_date'));

</script>

    <script>

        $(".row").on('change', '.get_court', function () {

            let gov_id = $("#gov_id").val();
            let court_degree_id = $("#court_degree_id").val();
            let court =$("#court_id");

            $.ajax({

                url: '/master/court_gov_courtdegree',
                method: "GET",
                data: {
                    gov:gov_id,
                    court_degree:court_degree_id,
                }
            }).done(function (response) {
                court.empty();
                if (response.length > 0) {
                    
                    court.attr('disabled', false);
                    $.each(response, function (key, value) {
                        court.append('<option value=' + value.id + '> ' + value
                            .name + '</option>');
                    });

                }else{
                    court.attr('disabled', true);
                }

                court.selectpicker('refresh');
              
            }).fail(function () {

                court.attr('disabled', true);

            });

        });

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