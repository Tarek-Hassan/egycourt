@extends('layouts.app')
@section('content')
{{-- <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>Analytics Dashboard</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics" href="javascript:void(0);">Monthly Analytics</a>
                <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
                <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
            </div>
        </div>
    </div>

</div> --}}

{{-- <div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <h5 class="">Visitors by Browser</h5>
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>Chrome</h6>
                                <p class="browser-count">65%</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                        </div>
                        <div class="w-browser-details">

                            <div class="w-browser-info">
                                <h6>Safari</h6>
                                <p class="browser-count">25%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        </div>
                        <div class="w-browser-details">

                            <div class="w-browser-info">
                                <h6>Others</h6>
                                <p class="browser-count">15%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="row widget-statistic">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <p class="w-value">31.6K</p>
                        <h5 class="">Followers</h5>
                    </div>
                    <div class="widget-content">
                        <div class="w-chart" style="position: relative;">
                            <div id="hybrid_followers" style="min-height: 160px;"><div id="apexchartsfjzrauo8k" class="apexcharts-canvas apexchartsfjzrauo8k light" style="width: 316px; height: 160px;"><svg id="SvgjsSvg2145" width="316" height="160" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG2147" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs2146"><clipPath id="gridRectMaskfjzrauo8k"><rect id="SvgjsRect2151" width="318" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskfjzrauo8k"><rect id="SvgjsRect2152" width="318" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient2158" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2159" stop-opacity="0.4" stop-color="rgba(27,85,226,0.4)" offset="0.45"></stop><stop id="SvgjsStop2160" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop2161" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine2150" x1="104.83333333333333" y1="0" x2="104.83333333333333" y2="160" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="104.83333333333333" y="0" width="1" height="160" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG2164" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2165" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG2168" class="apexcharts-grid"><line id="SvgjsLine2170" x1="0" y1="160" x2="316" y2="160" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine2169" x1="0" y1="1" x2="0" y2="160" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG2154" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG2155" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-area-0" d="M 0 160L 0 61.29870129870129C 18.43333333333333 61.29870129870129 34.233333333333334 4.155844155844136 52.666666666666664 4.155844155844136C 71.1 4.155844155844136 86.9 61.29870129870129 105.33333333333333 61.29870129870129C 123.76666666666667 61.29870129870129 139.56666666666666 24.93506493506493 158 24.93506493506493C 176.43333333333334 24.93506493506493 192.23333333333332 66.49350649350649 210.66666666666666 66.49350649350649C 229.1 66.49350649350649 244.89999999999998 56.10389610389609 263.3333333333333 56.10389610389609C 281.76666666666665 56.10389610389609 297.56666666666666 87.27272727272727 316 87.27272727272727C 316 87.27272727272727 316 87.27272727272727 316 160M 316 87.27272727272727z" fill="url(#SvgjsLinearGradient2158)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskfjzrauo8k)" pathTo="M 0 160L 0 61.29870129870129C 18.43333333333333 61.29870129870129 34.233333333333334 4.155844155844136 52.666666666666664 4.155844155844136C 71.1 4.155844155844136 86.9 61.29870129870129 105.33333333333333 61.29870129870129C 123.76666666666667 61.29870129870129 139.56666666666666 24.93506493506493 158 24.93506493506493C 176.43333333333334 24.93506493506493 192.23333333333332 66.49350649350649 210.66666666666666 66.49350649350649C 229.1 66.49350649350649 244.89999999999998 56.10389610389609 263.3333333333333 56.10389610389609C 281.76666666666665 56.10389610389609 297.56666666666666 87.27272727272727 316 87.27272727272727C 316 87.27272727272727 316 87.27272727272727 316 160M 316 87.27272727272727z" pathFrom="M -1 160L -1 160L 52.666666666666664 160L 105.33333333333333 160L 158 160L 210.66666666666666 160L 263.3333333333333 160L 316 160"></path><path id="apexcharts-area-0" d="M 0 61.29870129870129C 18.43333333333333 61.29870129870129 34.233333333333334 4.155844155844136 52.666666666666664 4.155844155844136C 71.1 4.155844155844136 86.9 61.29870129870129 105.33333333333333 61.29870129870129C 123.76666666666667 61.29870129870129 139.56666666666666 24.93506493506493 158 24.93506493506493C 176.43333333333334 24.93506493506493 192.23333333333332 66.49350649350649 210.66666666666666 66.49350649350649C 229.1 66.49350649350649 244.89999999999998 56.10389610389609 263.3333333333333 56.10389610389609C 281.76666666666665 56.10389610389609 297.56666666666666 87.27272727272727 316 87.27272727272727" fill="none" fill-opacity="1" stroke="#1b55e2" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskfjzrauo8k)" pathTo="M 0 61.29870129870129C 18.43333333333333 61.29870129870129 34.233333333333334 4.155844155844136 52.666666666666664 4.155844155844136C 71.1 4.155844155844136 86.9 61.29870129870129 105.33333333333333 61.29870129870129C 123.76666666666667 61.29870129870129 139.56666666666666 24.93506493506493 158 24.93506493506493C 176.43333333333334 24.93506493506493 192.23333333333332 66.49350649350649 210.66666666666666 66.49350649350649C 229.1 66.49350649350649 244.89999999999998 56.10389610389609 263.3333333333333 56.10389610389609C 281.76666666666665 56.10389610389609 297.56666666666666 87.27272727272727 316 87.27272727272727" pathFrom="M -1 160L -1 160L 52.666666666666664 160L 105.33333333333333 160L 158 160L 210.66666666666666 160L 263.3333333333333 160L 316 160"></path><g id="SvgjsG2156" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle2176" r="0" cx="105.33333333333333" cy="61.29870129870129" class="apexcharts-marker w1lw399yl no-pointer-events" stroke="#ffffff" fill="#1b55e2" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG2157" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine2171" x1="0" y1="0" x2="316" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2172" x1="0" y1="0" x2="316" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2173" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2174" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2175" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect2149" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG2166" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG2167" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light" style="left: 116px; top: 64px;"><div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(27, 85, 226);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Sales: </span><span class="apexcharts-tooltip-text-value">38</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 317px; height: 161px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="widget widget-one_hybrid widget-referral">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </div>
                        <p class="w-value">1,900</p>
                        <h5 class="">Referral</h5>
                    </div>
                    <div class="widget-content">
                        <div class="w-chart" style="position: relative;">
                            <div id="hybrid_followers1" style="min-height: 160px;"><div id="apexchartsipuq07spf" class="apexcharts-canvas apexchartsipuq07spf light" style="width: 316px; height: 160px;"><svg id="SvgjsSvg2180" width="316" height="160" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG2182" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs2181"><clipPath id="gridRectMaskipuq07spf"><rect id="SvgjsRect2186" width="318" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskipuq07spf"><rect id="SvgjsRect2187" width="318" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient2193" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2194" stop-opacity="0.4" stop-color="rgba(231,81,90,0.4)" offset="0.45"></stop><stop id="SvgjsStop2195" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop2196" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine2185" x1="0" y1="0" x2="0" y2="160" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="160" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG2199" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2200" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG2203" class="apexcharts-grid"><line id="SvgjsLine2205" x1="0" y1="160" x2="316" y2="160" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine2204" x1="0" y1="1" x2="0" y2="160" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG2189" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG2190" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-area-0" d="M 0 160L 0 4.155844155844136C 18.43333333333333 4.155844155844136 34.233333333333334 87.27272727272727 52.666666666666664 87.27272727272727C 71.1 87.27272727272727 86.9 24.93506493506493 105.33333333333333 24.93506493506493C 123.76666666666667 24.93506493506493 139.56666666666666 61.29870129870129 158 61.29870129870129C 176.43333333333334 61.29870129870129 192.23333333333332 56.10389610389609 210.66666666666666 56.10389610389609C 229.1 56.10389610389609 244.89999999999998 66.49350649350649 263.3333333333333 66.49350649350649C 281.76666666666665 66.49350649350649 297.56666666666666 61.29870129870129 316 61.29870129870129C 316 61.29870129870129 316 61.29870129870129 316 160M 316 61.29870129870129z" fill="url(#SvgjsLinearGradient2193)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskipuq07spf)" pathTo="M 0 160L 0 4.155844155844136C 18.43333333333333 4.155844155844136 34.233333333333334 87.27272727272727 52.666666666666664 87.27272727272727C 71.1 87.27272727272727 86.9 24.93506493506493 105.33333333333333 24.93506493506493C 123.76666666666667 24.93506493506493 139.56666666666666 61.29870129870129 158 61.29870129870129C 176.43333333333334 61.29870129870129 192.23333333333332 56.10389610389609 210.66666666666666 56.10389610389609C 229.1 56.10389610389609 244.89999999999998 66.49350649350649 263.3333333333333 66.49350649350649C 281.76666666666665 66.49350649350649 297.56666666666666 61.29870129870129 316 61.29870129870129C 316 61.29870129870129 316 61.29870129870129 316 160M 316 61.29870129870129z" pathFrom="M -1 160L -1 160L 52.666666666666664 160L 105.33333333333333 160L 158 160L 210.66666666666666 160L 263.3333333333333 160L 316 160"></path><path id="apexcharts-area-0" d="M 0 4.155844155844136C 18.43333333333333 4.155844155844136 34.233333333333334 87.27272727272727 52.666666666666664 87.27272727272727C 71.1 87.27272727272727 86.9 24.93506493506493 105.33333333333333 24.93506493506493C 123.76666666666667 24.93506493506493 139.56666666666666 61.29870129870129 158 61.29870129870129C 176.43333333333334 61.29870129870129 192.23333333333332 56.10389610389609 210.66666666666666 56.10389610389609C 229.1 56.10389610389609 244.89999999999998 66.49350649350649 263.3333333333333 66.49350649350649C 281.76666666666665 66.49350649350649 297.56666666666666 61.29870129870129 316 61.29870129870129" fill="none" fill-opacity="1" stroke="#e7515a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskipuq07spf)" pathTo="M 0 4.155844155844136C 18.43333333333333 4.155844155844136 34.233333333333334 87.27272727272727 52.666666666666664 87.27272727272727C 71.1 87.27272727272727 86.9 24.93506493506493 105.33333333333333 24.93506493506493C 123.76666666666667 24.93506493506493 139.56666666666666 61.29870129870129 158 61.29870129870129C 176.43333333333334 61.29870129870129 192.23333333333332 56.10389610389609 210.66666666666666 56.10389610389609C 229.1 56.10389610389609 244.89999999999998 66.49350649350649 263.3333333333333 66.49350649350649C 281.76666666666665 66.49350649350649 297.56666666666666 61.29870129870129 316 61.29870129870129" pathFrom="M -1 160L -1 160L 52.666666666666664 160L 105.33333333333333 160L 158 160L 210.66666666666666 160L 263.3333333333333 160L 316 160"></path><g id="SvgjsG2191" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle2211" r="0" cx="0" cy="4.155844155844136" class="apexcharts-marker we6weejz9 no-pointer-events" stroke="#ffffff" fill="#e7515a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG2192" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine2206" x1="0" y1="0" x2="316" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2207" x1="0" y1="0" x2="316" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2208" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2209" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2210" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect2184" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG2201" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG2202" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light" style="left: 11px; top: 7px;"><div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 81, 90);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">Sales: </span><span class="apexcharts-tooltip-text-value">60</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 317px; height: 161px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="widget widget-one_hybrid widget-engagement">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        </div>
                        <p class="w-value">18.2%</p>
                        <h5 class="">Engagement</h5>
                    </div>
                    <div class="widget-content">
                        <div class="w-chart" style="position: relative;">
                            <div id="hybrid_followers3" style="min-height: 160px;"><div id="apexchartsmkuft126" class="apexcharts-canvas apexchartsmkuft126 light" style="width: 316px; height: 160px;"><svg id="SvgjsSvg2215" width="316" height="160" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG2217" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs2216"><clipPath id="gridRectMaskmkuft126"><rect id="SvgjsRect2221" width="318" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskmkuft126"><rect id="SvgjsRect2222" width="318" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient2228" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop2229" stop-opacity="0.4" stop-color="rgba(141,191,66,0.4)" offset="0.45"></stop><stop id="SvgjsStop2230" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop2231" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine2220" x1="0" y1="0" x2="0" y2="160" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="160" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG2234" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2235" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG2238" class="apexcharts-grid"><line id="SvgjsLine2240" x1="0" y1="160" x2="316" y2="160" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine2239" x1="0" y1="1" x2="0" y2="160" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG2224" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG2225" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-area-0" d="M 0 160L 0 87.27272727272727C 18.43333333333333 87.27272727272727 34.233333333333334 30.129870129870113 52.666666666666664 30.129870129870113C 71.1 30.129870129870113 86.9 66.49350649350649 105.33333333333333 66.49350649350649C 123.76666666666667 66.49350649350649 139.56666666666666 4.155844155844136 158 4.155844155844136C 176.43333333333334 4.155844155844136 192.23333333333332 61.29870129870129 210.66666666666666 61.29870129870129C 229.1 61.29870129870129 244.89999999999998 24.93506493506493 263.3333333333333 24.93506493506493C 281.76666666666665 24.93506493506493 297.56666666666666 61.29870129870129 316 61.29870129870129C 316 61.29870129870129 316 61.29870129870129 316 160M 316 61.29870129870129z" fill="url(#SvgjsLinearGradient2228)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskmkuft126)" pathTo="M 0 160L 0 87.27272727272727C 18.43333333333333 87.27272727272727 34.233333333333334 30.129870129870113 52.666666666666664 30.129870129870113C 71.1 30.129870129870113 86.9 66.49350649350649 105.33333333333333 66.49350649350649C 123.76666666666667 66.49350649350649 139.56666666666666 4.155844155844136 158 4.155844155844136C 176.43333333333334 4.155844155844136 192.23333333333332 61.29870129870129 210.66666666666666 61.29870129870129C 229.1 61.29870129870129 244.89999999999998 24.93506493506493 263.3333333333333 24.93506493506493C 281.76666666666665 24.93506493506493 297.56666666666666 61.29870129870129 316 61.29870129870129C 316 61.29870129870129 316 61.29870129870129 316 160M 316 61.29870129870129z" pathFrom="M -1 160L -1 160L 52.666666666666664 160L 105.33333333333333 160L 158 160L 210.66666666666666 160L 263.3333333333333 160L 316 160"></path><path id="apexcharts-area-0" d="M 0 87.27272727272727C 18.43333333333333 87.27272727272727 34.233333333333334 30.129870129870113 52.666666666666664 30.129870129870113C 71.1 30.129870129870113 86.9 66.49350649350649 105.33333333333333 66.49350649350649C 123.76666666666667 66.49350649350649 139.56666666666666 4.155844155844136 158 4.155844155844136C 176.43333333333334 4.155844155844136 192.23333333333332 61.29870129870129 210.66666666666666 61.29870129870129C 229.1 61.29870129870129 244.89999999999998 24.93506493506493 263.3333333333333 24.93506493506493C 281.76666666666665 24.93506493506493 297.56666666666666 61.29870129870129 316 61.29870129870129" fill="none" fill-opacity="1" stroke="#8dbf42" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskmkuft126)" pathTo="M 0 87.27272727272727C 18.43333333333333 87.27272727272727 34.233333333333334 30.129870129870113 52.666666666666664 30.129870129870113C 71.1 30.129870129870113 86.9 66.49350649350649 105.33333333333333 66.49350649350649C 123.76666666666667 66.49350649350649 139.56666666666666 4.155844155844136 158 4.155844155844136C 176.43333333333334 4.155844155844136 192.23333333333332 61.29870129870129 210.66666666666666 61.29870129870129C 229.1 61.29870129870129 244.89999999999998 24.93506493506493 263.3333333333333 24.93506493506493C 281.76666666666665 24.93506493506493 297.56666666666666 61.29870129870129 316 61.29870129870129" pathFrom="M -1 160L -1 160L 52.666666666666664 160L 105.33333333333333 160L 158 160L 210.66666666666666 160L 263.3333333333333 160L 316 160"></path><g id="SvgjsG2226" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle2246" r="0" cx="0" cy="0" class="apexcharts-marker we74c4lhj no-pointer-events" stroke="#ffffff" fill="#8dbf42" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG2227" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine2241" x1="0" y1="0" x2="316" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2242" x1="0" y1="0" x2="316" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2243" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2244" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2245" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect2219" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG2236" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG2237" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(141, 191, 66);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 317px; height: 161px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
@push('styles')
    <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script>
@endpush
