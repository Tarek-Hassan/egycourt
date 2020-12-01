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
                                    href="{{ route('circut_court_specialities.index') }}">{{trans('circut_court_speciality.circut_court_speciality')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">
                                    {{ trans('general.create_new') }}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">

                    <form id="createForm" action="{{ route('circut_court_specialities.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="gov_id">{{trans('circut_court_speciality.gov_id')}} *</label>
                                <select class="selectpicker form-control get_court" id="gov_id"  name="gov_id" data-size="10" title="{{trans('forms.select')}}">
                                    @foreach ($governments as $government)    
                                        <option value="{{$government->id}}"  > {{App::isLocale('en') ? $government->name_en :$government->name_ar}} </option>
                                    @endforeach
                                       
                                </select>
                                @error('gov_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="court_degree_id">{{trans('circut_court_speciality.court_degree_id')}} *</label>
                                <select class="selectpicker form-control get_court" id="court_degree_id"  name="court_degree_id" data-size="10" title="{{trans('forms.select')}}">
                                    @foreach ($court_degrees as $court_degree)    
                                        <option value="{{$court_degree->id}}"  > {{App::isLocale('en') ? $court_degree->name_en :$court_degree->name_ar}} </option>
                                    @endforeach
                                </select>
                                @error('court_degree_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="court_id">{{trans('circut_court_speciality.court_id')}} *</label>
                                <select class="selectpicker form-control " id="court_id"  name="court_id" data-size="10" title="{{trans('forms.select')}}" disabled>
        
                                </select>
                                @error('court_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                        </div>


                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="circut_id">{{trans('circut_court_speciality.circut_id')}} *</label>
                                <select class="selectpicker form-control " id="circut_id"  name="circut_id" data-size="10" title="{{trans('forms.select')}}" disabled>
        
                                </select>
                                @error('circut_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="court_specialist_id">{{trans('circut_court_speciality.court_specialist_id')}} *</label>
                                <select class="selectpicker form-control" id="court_specialist_id"  name="court_specialist_id" data-size="10" title="{{trans('forms.select')}}">
                                    @foreach ($court_specialisties as $court_specialisty)    
                                        <option value="{{$court_specialisty->id}}"  > {{App::isLocale('en') ? $court_specialisty->name_en : $court_specialisty->name_ar}} </option>
                                    @endforeach
                                       
                                </select>
                                @error('court_specialist_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit"
                                    class="btn btn-primary mt-3">{{ trans('forms.create') }}</button>
                                <a href="{{ route('circut_court_specialities.index') }}"
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
@push('scripts')

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