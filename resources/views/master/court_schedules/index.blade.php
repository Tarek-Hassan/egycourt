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
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{trans('court_schedule.court_schedule')}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                
                    @permission('CourtScheduleHeader-Create')
                    <div class="row">
                        <div class="col text-right mb-5">
                            <a href="{{ route('court_schedules.create') }}"
                            class="btn btn-primary">{{ trans('general.create_new') }}</a>
                    </div>
                    @endpermission
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('court_schedule.case_date') }}</th>
                                    <th>{{ trans('court_schedule.gov_id') }}</th>
                                    <th>{{ trans('court_schedule.court_id') }}</th>
                                    <th>{{ trans('court_schedule.court_specialist_id') }}</th>
                                    <th>{{ trans('court_schedule.circut_no') }}</th>
                                    <th>{{ trans('court_schedule.role_no') }}</th>
                                    <th class='text-center' style='width:100px;'></th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($items as $item)
                         
                                    <tr>
                                        <td>{{ App\Helpers\Utils::rowNumber($items,$loop) }}</td>
                                        <td>{{ $item->case_date }}</td>
                                        <td>{{App::isLocale('en') ? $item->court->government->name_en??$item->court->government->name_ar : $item->court->government->name_ar}}</td>
                                        <td>{{App::isLocale('en') ? $item->court->name_en??$item->court->name_ar: $item->court->name_ar}}</td>
                                        <td>{{App::isLocale('en') ? $item->courtSpecialist->name_en?? $item->courtSpecialist->name_ar : $item->courtSpecialist->name_ar}}</td>
                                        <td>{{$item->circut->year}}/{{$item->circut->circut_no}}</td>
                                        <td>{{ $item->role_no }}</td>

                                        <td class="text-center">
                                            <ul class="table-controls">

                                                @permission('CourtScheduleHeader-Edit')
                                                <li>
                                                    <a href="{{ route('court_schedules.edit',$item->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="edit">
                                                        <i class="far fa-edit text-success"></i>
                                                    </a>
                                                </li>
                                                @endpermission
                                                @permission('CourtScheduleHeader-Show')
                                                <li>
                                                    <a href="{{ route('court_schedules.show',$item->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="show">
                                                        <i class="far fa-eye text-primary"></i>
                                                    </a>
                                                </li>
                                                @endpermission
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">{{ trans('home.no_data_found') }}</td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                    <div class="paginating-container">
                        {{$items->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
