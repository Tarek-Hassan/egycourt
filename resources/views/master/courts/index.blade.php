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
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{trans('court.courts')}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                
                    @permission('Court-Create')
                    <div class="row">
                        <div class="col text-right mb-5">
                            <a href="{{ route('courts.create') }}"
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
                                    <th>{{App::isLocale('en') ? trans('general.name_en') :trans('general.name_ar')}} </th>
                                    <th>{{ trans('court.gov_id') }}</th>
                                    <th>{{ trans('court.court_degree_id') }}</th>
                                    <th>{{ trans('general.is_active') }}</th>
                                    <th class='text-center' style='width:100px;'></th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($items as $item)
                                    <tr>
                                        <td>{{ App\Helpers\Utils::rowNumber($items,$loop) }}</td>
                                        <td>{{App::isLocale('en') ? $item->name_en??$item->name_ar : $item->name_ar}}</td>
                                        <td>{{App::isLocale('en') ? $item->government->name_en??$item->government->name_ar : $item->government->name_ar}}</td>
                                        <td>{{App::isLocale('en') ? $item->courtDegree->name_en??$item->courtDegree->name_ar : $item->courtDegree->name_ar}}</td>

                                        @if($item->is_active)
                                            <td><i class='fa fa-check' style='color:green'></i></td>
                                        @else
                                          <td><i class='fas fa-times' style='color:red'></i></td>
                                         @endif
                                        <td class="text-center">
                                            <ul class="table-controls">

                                                @permission('Court-Edit')
                                                <li>
                                                    <a href="{{ route('courts.edit',$item) }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="edit">
                                                        <i class="far fa-edit text-success"></i>
                                                    </a>
                                                </li>
                                                @endpermission
                                                @permission('Court-Show')
                                                <li>
                                                    <a href="{{ route('courts.show',$item) }}"
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
                                        <td colspan="6">{{ trans('home.no_data_found') }}</td>
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
