@extends('layouts.master')
@section('home')
    <div class="row">

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate"
                                title="Campaign Sent">Campaign Sent</h5>
                            <h3 class="my-2 py-1">9,184</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-right" style="position: relative;">
                                <div id="campaign-sent-chart" data-colors="#3280e8"
                                     style="min-height: 60px;">
                                    <div id="apexchartskesskb9p"
                                         class="apexcharts-canvas apexchartskesskb9p apexcharts-theme-light"
                                         style="width: 96px; height: 60px;">
                                        <svg id="SvgjsSvg2212" width="96" height="60"
                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                             xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                             style="background: transparent;">
                                            <g id="SvgjsG2214" class="apexcharts-inner apexcharts-graphical"
                                               transform="translate(0, 0)">
                                                <defs id="SvgjsDefs2213">
                                                    <linearGradient id="SvgjsLinearGradient2218" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                        <stop id="SvgjsStop2219" stop-opacity="0.4"
                                                              stop-color="rgba(216,227,240,0.4)"
                                                              offset="0"></stop>
                                                        <stop id="SvgjsStop2220" stop-opacity="0.5"
                                                              stop-color="rgba(190,209,230,0.5)"
                                                              offset="1"></stop>
                                                        <stop id="SvgjsStop2221" stop-opacity="0.5"
                                                              stop-color="rgba(190,209,230,0.5)"
                                                              offset="1"></stop>
                                                    </linearGradient>
                                                    <clipPath id="gridRectMaskkesskb9p">
                                                        <rect id="SvgjsRect2224" width="100" height="60"
                                                              x="-2" y="0" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="gridRectMarkerMaskkesskb9p">
                                                        <rect id="SvgjsRect2225" width="100" height="64"
                                                              x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <line id="SvgjsLine2223" x1="0" y1="0" x2="0" y2="60"
                                                      stroke-dasharray="3" class="apexcharts-xcrosshairs"
                                                      x="0" y="0" width="1" height="60"
                                                      fill="url(#SvgjsLinearGradient2218)" filter="none"
                                                      fill-opacity="0.9" stroke-width="0"></line>
                                                <g id="SvgjsG2241" class="apexcharts-xaxis"
                                                   transform="translate(0, 0)">
                                                    <g id="SvgjsG2242" class="apexcharts-xaxis-texts-g"
                                                       transform="translate(0, 2.75)"></g>
                                                </g>
                                                <g id="SvgjsG2244" class="apexcharts-grid">
                                                    <g id="SvgjsG2245"
                                                       class="apexcharts-gridlines-horizontal"
                                                       style="display: none;">
                                                        <line id="SvgjsLine2247" x1="0" y1="0" x2="96"
                                                              y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2248" x1="0" y1="12" x2="96"
                                                              y2="12" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2249" x1="0" y1="24" x2="96"
                                                              y2="24" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2250" x1="0" y1="36" x2="96"
                                                              y2="36" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2251" x1="0" y1="48" x2="96"
                                                              y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2252" x1="0" y1="60" x2="96"
                                                              y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG2246" class="apexcharts-gridlines-vertical"
                                                       style="display: none;"></g>
                                                    <line id="SvgjsLine2254" x1="0" y1="60" x2="96" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                    <line id="SvgjsLine2253" x1="0" y1="1" x2="0" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                </g>
                                                <g id="SvgjsG2227"
                                                   class="apexcharts-bar-series apexcharts-plot-series">
                                                    <g id="SvgjsG2228" class="apexcharts-series" rel="1"
                                                       seriesName="seriesx1" data:realIndex="0">
                                                        <path id="SvgjsPath2230"
                                                              d="M 1.7454545454545451 60L 1.7454545454545451 45L 6.9818181818181815 45L 6.9818181818181815 45L 6.9818181818181815 60L 6.9818181818181815 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 1.7454545454545451 60L 1.7454545454545451 45L 6.9818181818181815 45L 6.9818181818181815 45L 6.9818181818181815 60L 6.9818181818181815 60z"
                                                              pathFrom="M 1.7454545454545451 60L 1.7454545454545451 60L 6.9818181818181815 60L 6.9818181818181815 60L 6.9818181818181815 60L 1.7454545454545451 60"
                                                              cy="45" cx="10.472727272727273" j="0" val="25"
                                                              barHeight="15"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2231"
                                                              d="M 10.472727272727273 60L 10.472727272727273 20.4L 15.709090909090909 20.4L 15.709090909090909 20.4L 15.709090909090909 60L 15.709090909090909 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 10.472727272727273 60L 10.472727272727273 20.4L 15.709090909090909 20.4L 15.709090909090909 20.4L 15.709090909090909 60L 15.709090909090909 60z"
                                                              pathFrom="M 10.472727272727273 60L 10.472727272727273 60L 15.709090909090909 60L 15.709090909090909 60L 15.709090909090909 60L 10.472727272727273 60"
                                                              cy="20.4" cx="19.2" j="1" val="66"
                                                              barHeight="39.6"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2232"
                                                              d="M 19.2 60L 19.2 35.400000000000006L 24.436363636363637 35.400000000000006L 24.436363636363637 35.400000000000006L 24.436363636363637 60L 24.436363636363637 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 19.2 60L 19.2 35.400000000000006L 24.436363636363637 35.400000000000006L 24.436363636363637 35.400000000000006L 24.436363636363637 60L 24.436363636363637 60z"
                                                              pathFrom="M 19.2 60L 19.2 60L 24.436363636363637 60L 24.436363636363637 60L 24.436363636363637 60L 19.2 60"
                                                              cy="35.400000000000006"
                                                              cx="27.927272727272726" j="2" val="41"
                                                              barHeight="24.599999999999998"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2233"
                                                              d="M 27.927272727272726 60L 27.927272727272726 6.600000000000001L 33.163636363636364 6.600000000000001L 33.163636363636364 6.600000000000001L 33.163636363636364 60L 33.163636363636364 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 27.927272727272726 60L 27.927272727272726 6.600000000000001L 33.163636363636364 6.600000000000001L 33.163636363636364 6.600000000000001L 33.163636363636364 60L 33.163636363636364 60z"
                                                              pathFrom="M 27.927272727272726 60L 27.927272727272726 60L 33.163636363636364 60L 33.163636363636364 60L 33.163636363636364 60L 27.927272727272726 60"
                                                              cy="6.600000000000001" cx="36.654545454545456"
                                                              j="3" val="89" barHeight="53.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2234"
                                                              d="M 36.654545454545456 60L 36.654545454545456 22.200000000000003L 41.89090909090909 22.200000000000003L 41.89090909090909 22.200000000000003L 41.89090909090909 60L 41.89090909090909 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 36.654545454545456 60L 36.654545454545456 22.200000000000003L 41.89090909090909 22.200000000000003L 41.89090909090909 22.200000000000003L 41.89090909090909 60L 41.89090909090909 60z"
                                                              pathFrom="M 36.654545454545456 60L 36.654545454545456 60L 41.89090909090909 60L 41.89090909090909 60L 41.89090909090909 60L 36.654545454545456 60"
                                                              cy="22.200000000000003" cx="45.38181818181818"
                                                              j="4" val="63" barHeight="37.8"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2235"
                                                              d="M 45.38181818181818 60L 45.38181818181818 45L 50.61818181818182 45L 50.61818181818182 45L 50.61818181818182 60L 50.61818181818182 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 45.38181818181818 60L 45.38181818181818 45L 50.61818181818182 45L 50.61818181818182 45L 50.61818181818182 60L 50.61818181818182 60z"
                                                              pathFrom="M 45.38181818181818 60L 45.38181818181818 60L 50.61818181818182 60L 50.61818181818182 60L 50.61818181818182 60L 45.38181818181818 60"
                                                              cy="45" cx="54.10909090909091" j="5" val="25"
                                                              barHeight="15"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2236"
                                                              d="M 54.10909090909091 60L 54.10909090909091 33.6L 59.345454545454544 33.6L 59.345454545454544 33.6L 59.345454545454544 60L 59.345454545454544 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 54.10909090909091 60L 54.10909090909091 33.6L 59.345454545454544 33.6L 59.345454545454544 33.6L 59.345454545454544 60L 59.345454545454544 60z"
                                                              pathFrom="M 54.10909090909091 60L 54.10909090909091 60L 59.345454545454544 60L 59.345454545454544 60L 59.345454545454544 60L 54.10909090909091 60"
                                                              cy="33.6" cx="62.836363636363636" j="6"
                                                              val="44" barHeight="26.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2237"
                                                              d="M 62.836363636363636 60L 62.836363636363636 52.8L 68.07272727272728 52.8L 68.07272727272728 52.8L 68.07272727272728 60L 68.07272727272728 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 62.836363636363636 60L 62.836363636363636 52.8L 68.07272727272728 52.8L 68.07272727272728 52.8L 68.07272727272728 60L 68.07272727272728 60z"
                                                              pathFrom="M 62.836363636363636 60L 62.836363636363636 60L 68.07272727272728 60L 68.07272727272728 60L 68.07272727272728 60L 62.836363636363636 60"
                                                              cy="52.8" cx="71.56363636363636" j="7"
                                                              val="12" barHeight="7.199999999999999"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2238"
                                                              d="M 71.56363636363636 60L 71.56363636363636 38.400000000000006L 76.8 38.400000000000006L 76.8 38.400000000000006L 76.8 60L 76.8 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 71.56363636363636 60L 71.56363636363636 38.400000000000006L 76.8 38.400000000000006L 76.8 38.400000000000006L 76.8 60L 76.8 60z"
                                                              pathFrom="M 71.56363636363636 60L 71.56363636363636 60L 76.8 60L 76.8 60L 76.8 60L 71.56363636363636 60"
                                                              cy="38.400000000000006" cx="80.29090909090908"
                                                              j="8" val="36" barHeight="21.599999999999998"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2239"
                                                              d="M 80.29090909090908 60L 80.29090909090908 54.6L 85.52727272727272 54.6L 85.52727272727272 54.6L 85.52727272727272 60L 85.52727272727272 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 80.29090909090908 60L 80.29090909090908 54.6L 85.52727272727272 54.6L 85.52727272727272 54.6L 85.52727272727272 60L 85.52727272727272 60z"
                                                              pathFrom="M 80.29090909090908 60L 80.29090909090908 60L 85.52727272727272 60L 85.52727272727272 60L 85.52727272727272 60L 80.29090909090908 60"
                                                              cy="54.6" cx="89.0181818181818" j="9" val="9"
                                                              barHeight="5.3999999999999995"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2240"
                                                              d="M 89.0181818181818 60L 89.0181818181818 27.6L 94.25454545454544 27.6L 94.25454545454544 27.6L 94.25454545454544 60L 94.25454545454544 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskkesskb9p)"
                                                              pathTo="M 89.0181818181818 60L 89.0181818181818 27.6L 94.25454545454544 27.6L 94.25454545454544 27.6L 94.25454545454544 60L 94.25454545454544 60z"
                                                              pathFrom="M 89.0181818181818 60L 89.0181818181818 60L 94.25454545454544 60L 94.25454545454544 60L 94.25454545454544 60L 89.0181818181818 60"
                                                              cy="27.6" cx="97.74545454545452" j="10"
                                                              val="54" barHeight="32.4"
                                                              barWidth="5.236363636363636"></path>
                                                    </g>
                                                    <g id="SvgjsG2229" class="apexcharts-datalabels"
                                                       data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine2255" x1="0" y1="0" x2="96" y2="0"
                                                      stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                      class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine2256" x1="0" y1="0" x2="96" y2="0"
                                                      stroke-dasharray="0" stroke-width="0"
                                                      class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG2257" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG2258" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG2259" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect2222" width="0" height="0" x="0" y="0" rx="0"
                                                  ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG2243" class="apexcharts-yaxis" rel="0"
                                               transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG2215" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-series-group"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(50, 128, 232);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-label"></span><span
                                                            class="apexcharts-tooltip-text-value"></span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 97px; height: 61px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="New Leads">
                                New Leads</h5>
                            <h3 class="my-2 py-1">3,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 5.38%</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-right" style="position: relative;">
                                <div id="new-leads-chart" data-colors="#40c391" style="min-height: 60px;">
                                    <div id="apexchartsqdlhwmdn"
                                         class="apexcharts-canvas apexchartsqdlhwmdn apexcharts-theme-light"
                                         style="width: 96px; height: 60px;">
                                        <svg id="SvgjsSvg2261" width="96" height="60"
                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                             xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                             style="background: transparent;">
                                            <g id="SvgjsG2263" class="apexcharts-inner apexcharts-graphical"
                                               transform="translate(0, 0)">
                                                <defs id="SvgjsDefs2262">
                                                    <clipPath id="gridRectMaskqdlhwmdn">
                                                        <rect id="SvgjsRect2269" width="102" height="62"
                                                              x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="gridRectMarkerMaskqdlhwmdn">
                                                        <rect id="SvgjsRect2270" width="100" height="64"
                                                              x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <line id="SvgjsLine2268" x1="-0.5" y1="0" x2="-0.5" y2="60"
                                                      stroke="#b6b6b6" stroke-dasharray="3"
                                                      class="apexcharts-xcrosshairs apexcharts-active"
                                                      x="-0.5" y="0" width="1" height="60" fill="#b1b9c4"
                                                      filter="none" fill-opacity="0.9"
                                                      stroke-width="1"></line>
                                                <g id="SvgjsG2277" class="apexcharts-xaxis"
                                                   transform="translate(0, 0)">
                                                    <g id="SvgjsG2278" class="apexcharts-xaxis-texts-g"
                                                       transform="translate(0, 2.75)"></g>
                                                </g>
                                                <g id="SvgjsG2280" class="apexcharts-grid">
                                                    <g id="SvgjsG2281"
                                                       class="apexcharts-gridlines-horizontal"
                                                       style="display: none;">
                                                        <line id="SvgjsLine2283" x1="0" y1="0" x2="96"
                                                              y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2284" x1="0" y1="12" x2="96"
                                                              y2="12" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2285" x1="0" y1="24" x2="96"
                                                              y2="24" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2286" x1="0" y1="36" x2="96"
                                                              y2="36" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2287" x1="0" y1="48" x2="96"
                                                              y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2288" x1="0" y1="60" x2="96"
                                                              y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG2282" class="apexcharts-gridlines-vertical"
                                                       style="display: none;"></g>
                                                    <line id="SvgjsLine2290" x1="0" y1="60" x2="96" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                    <line id="SvgjsLine2289" x1="0" y1="1" x2="0" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                </g>
                                                <g id="SvgjsG2272"
                                                   class="apexcharts-line-series apexcharts-plot-series">
                                                    <g id="SvgjsG2273" class="apexcharts-series"
                                                       seriesName="seriesx1" data:longestSeries="true"
                                                       rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath2276"
                                                              d="M 0 45C 3.36 45 6.24 20.4 9.6 20.4C 12.959999999999999 20.4 15.84 35.400000000000006 19.2 35.400000000000006C 22.56 35.400000000000006 25.439999999999998 6.600000000000001 28.799999999999997 6.600000000000001C 32.16 6.600000000000001 35.04 22.200000000000003 38.4 22.200000000000003C 41.76 22.200000000000003 44.64 45 48 45C 51.36 45 54.239999999999995 33.6 57.599999999999994 33.6C 60.959999999999994 33.6 63.84 52.8 67.2 52.8C 70.56 52.8 73.44 38.400000000000006 76.8 38.400000000000006C 80.16 38.400000000000006 83.03999999999999 54.6 86.39999999999999 54.6C 89.75999999999999 54.6 92.64 27.6 96 27.6"
                                                              fill="none" fill-opacity="1"
                                                              stroke="rgba(64,195,145,0.85)"
                                                              stroke-opacity="1" stroke-linecap="butt"
                                                              stroke-width="2" stroke-dasharray="0"
                                                              class="apexcharts-line" index="0"
                                                              clip-path="url(#gridRectMaskqdlhwmdn)"
                                                              pathTo="M 0 45C 3.36 45 6.24 20.4 9.6 20.4C 12.959999999999999 20.4 15.84 35.400000000000006 19.2 35.400000000000006C 22.56 35.400000000000006 25.439999999999998 6.600000000000001 28.799999999999997 6.600000000000001C 32.16 6.600000000000001 35.04 22.200000000000003 38.4 22.200000000000003C 41.76 22.200000000000003 44.64 45 48 45C 51.36 45 54.239999999999995 33.6 57.599999999999994 33.6C 60.959999999999994 33.6 63.84 52.8 67.2 52.8C 70.56 52.8 73.44 38.400000000000006 76.8 38.400000000000006C 80.16 38.400000000000006 83.03999999999999 54.6 86.39999999999999 54.6C 89.75999999999999 54.6 92.64 27.6 96 27.6"
                                                              pathFrom="M -1 60L -1 60L 9.6 60L 19.2 60L 28.799999999999997 60L 38.4 60L 48 60L 57.599999999999994 60L 67.2 60L 76.8 60L 86.39999999999999 60L 96 60"></path>
                                                        <g id="SvgjsG2274"
                                                           class="apexcharts-series-markers-wrap"
                                                           data:realIndex="0">
                                                            <g class="apexcharts-series-markers">
                                                                <circle id="SvgjsCircle2296" r="6" cx="0"
                                                                        cy="45"
                                                                        class="apexcharts-marker wi50p2dktj no-pointer-events"
                                                                        stroke="#ffffff" fill="#40c391"
                                                                        fill-opacity="1" stroke-width="2"
                                                                        stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG2275" class="apexcharts-datalabels"
                                                       data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine2291" x1="0" y1="0" x2="96" y2="0"
                                                      stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                      class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine2292" x1="0" y1="0" x2="96" y2="0"
                                                      stroke-dasharray="0" stroke-width="0"
                                                      class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG2293" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG2294" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG2295" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect2267" width="0" height="0" x="0" y="0" rx="0"
                                                  ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG2279" class="apexcharts-yaxis" rel="0"
                                               transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG2264" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                        <div
                                            class="apexcharts-tooltip apexcharts-theme-light apexcharts-active"
                                            style="left: 11px; top: 25.4px;">
                                            <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                 style="display: flex;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(64, 195, 145); display: none;"></span>
                                                <div class="apexcharts-tooltip-text"
                                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-label"></span><span
                                                            class="apexcharts-tooltip-text-value">25</span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 97px; height: 61px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Deals">
                                Deals</h5>
                            <h3 class="my-2 py-1">861</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-right" style="position: relative;">
                                <div id="deals-chart" data-colors="#3280e8" style="min-height: 60px;">
                                    <div id="apexchartslxgasdge"
                                         class="apexcharts-canvas apexchartslxgasdge apexcharts-theme-light"
                                         style="width: 96px; height: 60px;">
                                        <svg id="SvgjsSvg2297" width="96" height="60"
                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                             xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                             style="background: transparent;">
                                            <g id="SvgjsG2299" class="apexcharts-inner apexcharts-graphical"
                                               transform="translate(0, 0)">
                                                <defs id="SvgjsDefs2298">
                                                    <linearGradient id="SvgjsLinearGradient2303" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                        <stop id="SvgjsStop2304" stop-opacity="0.4"
                                                              stop-color="rgba(216,227,240,0.4)"
                                                              offset="0"></stop>
                                                        <stop id="SvgjsStop2305" stop-opacity="0.5"
                                                              stop-color="rgba(190,209,230,0.5)"
                                                              offset="1"></stop>
                                                        <stop id="SvgjsStop2306" stop-opacity="0.5"
                                                              stop-color="rgba(190,209,230,0.5)"
                                                              offset="1"></stop>
                                                    </linearGradient>
                                                    <clipPath id="gridRectMasklxgasdge">
                                                        <rect id="SvgjsRect2309" width="100" height="60"
                                                              x="-2" y="0" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="gridRectMarkerMasklxgasdge">
                                                        <rect id="SvgjsRect2310" width="100" height="64"
                                                              x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <line id="SvgjsLine2308" x1="0" y1="0" x2="0" y2="60"
                                                      stroke-dasharray="3" class="apexcharts-xcrosshairs"
                                                      x="0" y="0" width="1" height="60"
                                                      fill="url(#SvgjsLinearGradient2303)" filter="none"
                                                      fill-opacity="0.9" stroke-width="0"></line>
                                                <g id="SvgjsG2326" class="apexcharts-xaxis"
                                                   transform="translate(0, 0)">
                                                    <g id="SvgjsG2327" class="apexcharts-xaxis-texts-g"
                                                       transform="translate(0, 2.75)"></g>
                                                </g>
                                                <g id="SvgjsG2329" class="apexcharts-grid">
                                                    <g id="SvgjsG2330"
                                                       class="apexcharts-gridlines-horizontal"
                                                       style="display: none;">
                                                        <line id="SvgjsLine2332" x1="0" y1="0" x2="96"
                                                              y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2333" x1="0" y1="15" x2="96"
                                                              y2="15" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2334" x1="0" y1="30" x2="96"
                                                              y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2335" x1="0" y1="45" x2="96"
                                                              y2="45" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2336" x1="0" y1="60" x2="96"
                                                              y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG2331" class="apexcharts-gridlines-vertical"
                                                       style="display: none;"></g>
                                                    <line id="SvgjsLine2338" x1="0" y1="60" x2="96" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                    <line id="SvgjsLine2337" x1="0" y1="1" x2="0" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                </g>
                                                <g id="SvgjsG2312"
                                                   class="apexcharts-bar-series apexcharts-plot-series">
                                                    <g id="SvgjsG2313" class="apexcharts-series" rel="1"
                                                       seriesName="seriesx1" data:realIndex="0">
                                                        <path id="SvgjsPath2315"
                                                              d="M 1.7454545454545451 60L 1.7454545454545451 51L 6.9818181818181815 51L 6.9818181818181815 51L 6.9818181818181815 60L 6.9818181818181815 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 1.7454545454545451 60L 1.7454545454545451 51L 6.9818181818181815 51L 6.9818181818181815 51L 6.9818181818181815 60L 6.9818181818181815 60z"
                                                              pathFrom="M 1.7454545454545451 60L 1.7454545454545451 60L 6.9818181818181815 60L 6.9818181818181815 60L 6.9818181818181815 60L 1.7454545454545451 60"
                                                              cy="51" cx="10.472727272727273" j="0" val="12"
                                                              barHeight="9"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2316"
                                                              d="M 10.472727272727273 60L 10.472727272727273 49.5L 15.709090909090909 49.5L 15.709090909090909 49.5L 15.709090909090909 60L 15.709090909090909 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 10.472727272727273 60L 10.472727272727273 49.5L 15.709090909090909 49.5L 15.709090909090909 49.5L 15.709090909090909 60L 15.709090909090909 60z"
                                                              pathFrom="M 10.472727272727273 60L 10.472727272727273 60L 15.709090909090909 60L 15.709090909090909 60L 15.709090909090909 60L 10.472727272727273 60"
                                                              cy="49.5" cx="19.2" j="1" val="14"
                                                              barHeight="10.5"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2317"
                                                              d="M 19.2 60L 19.2 58.5L 24.436363636363637 58.5L 24.436363636363637 58.5L 24.436363636363637 60L 24.436363636363637 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 19.2 60L 19.2 58.5L 24.436363636363637 58.5L 24.436363636363637 58.5L 24.436363636363637 60L 24.436363636363637 60z"
                                                              pathFrom="M 19.2 60L 19.2 60L 24.436363636363637 60L 24.436363636363637 60L 24.436363636363637 60L 19.2 60"
                                                              cy="58.5" cx="27.927272727272726" j="2"
                                                              val="2" barHeight="1.5"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2318"
                                                              d="M 27.927272727272726 60L 27.927272727272726 24.75L 33.163636363636364 24.75L 33.163636363636364 24.75L 33.163636363636364 60L 33.163636363636364 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 27.927272727272726 60L 27.927272727272726 24.75L 33.163636363636364 24.75L 33.163636363636364 24.75L 33.163636363636364 60L 33.163636363636364 60z"
                                                              pathFrom="M 27.927272727272726 60L 27.927272727272726 60L 33.163636363636364 60L 33.163636363636364 60L 33.163636363636364 60L 27.927272727272726 60"
                                                              cy="24.75" cx="36.654545454545456" j="3"
                                                              val="47" barHeight="35.25"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2319"
                                                              d="M 36.654545454545456 60L 36.654545454545456 28.5L 41.89090909090909 28.5L 41.89090909090909 28.5L 41.89090909090909 60L 41.89090909090909 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 36.654545454545456 60L 36.654545454545456 28.5L 41.89090909090909 28.5L 41.89090909090909 28.5L 41.89090909090909 60L 41.89090909090909 60z"
                                                              pathFrom="M 36.654545454545456 60L 36.654545454545456 60L 41.89090909090909 60L 41.89090909090909 60L 41.89090909090909 60L 36.654545454545456 60"
                                                              cy="28.5" cx="45.38181818181818" j="4"
                                                              val="42" barHeight="31.5"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2320"
                                                              d="M 45.38181818181818 60L 45.38181818181818 48.75L 50.61818181818182 48.75L 50.61818181818182 48.75L 50.61818181818182 60L 50.61818181818182 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 45.38181818181818 60L 45.38181818181818 48.75L 50.61818181818182 48.75L 50.61818181818182 48.75L 50.61818181818182 60L 50.61818181818182 60z"
                                                              pathFrom="M 45.38181818181818 60L 45.38181818181818 60L 50.61818181818182 60L 50.61818181818182 60L 50.61818181818182 60L 45.38181818181818 60"
                                                              cy="48.75" cx="54.10909090909091" j="5"
                                                              val="15" barHeight="11.25"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2321"
                                                              d="M 54.10909090909091 60L 54.10909090909091 24.75L 59.345454545454544 24.75L 59.345454545454544 24.75L 59.345454545454544 60L 59.345454545454544 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 54.10909090909091 60L 54.10909090909091 24.75L 59.345454545454544 24.75L 59.345454545454544 24.75L 59.345454545454544 60L 59.345454545454544 60z"
                                                              pathFrom="M 54.10909090909091 60L 54.10909090909091 60L 59.345454545454544 60L 59.345454545454544 60L 59.345454545454544 60L 54.10909090909091 60"
                                                              cy="24.75" cx="62.836363636363636" j="6"
                                                              val="47" barHeight="35.25"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2322"
                                                              d="M 62.836363636363636 60L 62.836363636363636 3.75L 68.07272727272728 3.75L 68.07272727272728 3.75L 68.07272727272728 60L 68.07272727272728 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 62.836363636363636 60L 62.836363636363636 3.75L 68.07272727272728 3.75L 68.07272727272728 3.75L 68.07272727272728 60L 68.07272727272728 60z"
                                                              pathFrom="M 62.836363636363636 60L 62.836363636363636 60L 68.07272727272728 60L 68.07272727272728 60L 68.07272727272728 60L 62.836363636363636 60"
                                                              cy="3.75" cx="71.56363636363636" j="7"
                                                              val="75" barHeight="56.25"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2323"
                                                              d="M 71.56363636363636 60L 71.56363636363636 11.25L 76.8 11.25L 76.8 11.25L 76.8 60L 76.8 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 71.56363636363636 60L 71.56363636363636 11.25L 76.8 11.25L 76.8 11.25L 76.8 60L 76.8 60z"
                                                              pathFrom="M 71.56363636363636 60L 71.56363636363636 60L 76.8 60L 76.8 60L 76.8 60L 71.56363636363636 60"
                                                              cy="11.25" cx="80.29090909090908" j="8"
                                                              val="65" barHeight="48.75"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2324"
                                                              d="M 80.29090909090908 60L 80.29090909090908 45.75L 85.52727272727272 45.75L 85.52727272727272 45.75L 85.52727272727272 60L 85.52727272727272 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 80.29090909090908 60L 80.29090909090908 45.75L 85.52727272727272 45.75L 85.52727272727272 45.75L 85.52727272727272 60L 85.52727272727272 60z"
                                                              pathFrom="M 80.29090909090908 60L 80.29090909090908 60L 85.52727272727272 60L 85.52727272727272 60L 85.52727272727272 60L 80.29090909090908 60"
                                                              cy="45.75" cx="89.0181818181818" j="9"
                                                              val="19" barHeight="14.25"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2325"
                                                              d="M 89.0181818181818 60L 89.0181818181818 49.5L 94.25454545454544 49.5L 94.25454545454544 49.5L 94.25454545454544 60L 94.25454545454544 60z"
                                                              fill="rgba(50,128,232,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMasklxgasdge)"
                                                              pathTo="M 89.0181818181818 60L 89.0181818181818 49.5L 94.25454545454544 49.5L 94.25454545454544 49.5L 94.25454545454544 60L 94.25454545454544 60z"
                                                              pathFrom="M 89.0181818181818 60L 89.0181818181818 60L 94.25454545454544 60L 94.25454545454544 60L 94.25454545454544 60L 89.0181818181818 60"
                                                              cy="49.5" cx="97.74545454545452" j="10"
                                                              val="14" barHeight="10.5"
                                                              barWidth="5.236363636363636"></path>
                                                    </g>
                                                    <g id="SvgjsG2314" class="apexcharts-datalabels"
                                                       data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine2339" x1="0" y1="0" x2="96" y2="0"
                                                      stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                      class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine2340" x1="0" y1="0" x2="96" y2="0"
                                                      stroke-dasharray="0" stroke-width="0"
                                                      class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG2341" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG2342" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG2343" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect2307" width="0" height="0" x="0" y="0" rx="0"
                                                  ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG2328" class="apexcharts-yaxis" rel="0"
                                               transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG2300" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-series-group"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(50, 128, 232);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-label"></span><span
                                                            class="apexcharts-tooltip-text-value"></span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 97px; height: 61px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate"
                                title="Booked Revenue">Booked Revenue</h5>
                            <h3 class="my-2 py-1">$253k</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <div class="text-right" style="position: relative;">
                                <div id="booked-revenue-chart" data-colors="#40c391"
                                     style="min-height: 60px;">
                                    <div id="apexchartsw2bkzz4k"
                                         class="apexcharts-canvas apexchartsw2bkzz4k apexcharts-theme-light"
                                         style="width: 96px; height: 60px;">
                                        <svg id="SvgjsSvg2344" width="96" height="60"
                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                             xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                             style="background: transparent;">
                                            <g id="SvgjsG2346" class="apexcharts-inner apexcharts-graphical"
                                               transform="translate(0, 0)">
                                                <defs id="SvgjsDefs2345">
                                                    <linearGradient id="SvgjsLinearGradient2350" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                        <stop id="SvgjsStop2351" stop-opacity="0.4"
                                                              stop-color="rgba(216,227,240,0.4)"
                                                              offset="0"></stop>
                                                        <stop id="SvgjsStop2352" stop-opacity="0.5"
                                                              stop-color="rgba(190,209,230,0.5)"
                                                              offset="1"></stop>
                                                        <stop id="SvgjsStop2353" stop-opacity="0.5"
                                                              stop-color="rgba(190,209,230,0.5)"
                                                              offset="1"></stop>
                                                    </linearGradient>
                                                    <clipPath id="gridRectMaskw2bkzz4k">
                                                        <rect id="SvgjsRect2356" width="100" height="60"
                                                              x="-2" y="0" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="gridRectMarkerMaskw2bkzz4k">
                                                        <rect id="SvgjsRect2357" width="100" height="64"
                                                              x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                              stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <line id="SvgjsLine2355" x1="0" y1="0" x2="0" y2="60"
                                                      stroke-dasharray="3" class="apexcharts-xcrosshairs"
                                                      x="0" y="0" width="1" height="60"
                                                      fill="url(#SvgjsLinearGradient2350)" filter="none"
                                                      fill-opacity="0.9" stroke-width="0"></line>
                                                <g id="SvgjsG2373" class="apexcharts-xaxis"
                                                   transform="translate(0, 0)">
                                                    <g id="SvgjsG2374" class="apexcharts-xaxis-texts-g"
                                                       transform="translate(0, 2.75)"></g>
                                                </g>
                                                <g id="SvgjsG2376" class="apexcharts-grid">
                                                    <g id="SvgjsG2377"
                                                       class="apexcharts-gridlines-horizontal"
                                                       style="display: none;">
                                                        <line id="SvgjsLine2379" x1="0" y1="0" x2="96"
                                                              y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2380" x1="0" y1="12" x2="96"
                                                              y2="12" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2381" x1="0" y1="24" x2="96"
                                                              y2="24" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2382" x1="0" y1="36" x2="96"
                                                              y2="36" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2383" x1="0" y1="48" x2="96"
                                                              y2="48" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine2384" x1="0" y1="60" x2="96"
                                                              y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                              class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG2378" class="apexcharts-gridlines-vertical"
                                                       style="display: none;"></g>
                                                    <line id="SvgjsLine2386" x1="0" y1="60" x2="96" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                    <line id="SvgjsLine2385" x1="0" y1="1" x2="0" y2="60"
                                                          stroke="transparent" stroke-dasharray="0"></line>
                                                </g>
                                                <g id="SvgjsG2359"
                                                   class="apexcharts-bar-series apexcharts-plot-series">
                                                    <g id="SvgjsG2360" class="apexcharts-series" rel="1"
                                                       seriesName="seriesx1" data:realIndex="0">
                                                        <path id="SvgjsPath2362"
                                                              d="M 1.7454545454545451 60L 1.7454545454545451 31.8L 6.9818181818181815 31.8L 6.9818181818181815 31.8L 6.9818181818181815 60L 6.9818181818181815 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 1.7454545454545451 60L 1.7454545454545451 31.8L 6.9818181818181815 31.8L 6.9818181818181815 31.8L 6.9818181818181815 60L 6.9818181818181815 60z"
                                                              pathFrom="M 1.7454545454545451 60L 1.7454545454545451 60L 6.9818181818181815 60L 6.9818181818181815 60L 6.9818181818181815 60L 1.7454545454545451 60"
                                                              cy="31.8" cx="10.472727272727273" j="0"
                                                              val="47" barHeight="28.2"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2363"
                                                              d="M 10.472727272727273 60L 10.472727272727273 33L 15.709090909090909 33L 15.709090909090909 33L 15.709090909090909 60L 15.709090909090909 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 10.472727272727273 60L 10.472727272727273 33L 15.709090909090909 33L 15.709090909090909 33L 15.709090909090909 60L 15.709090909090909 60z"
                                                              pathFrom="M 10.472727272727273 60L 10.472727272727273 60L 15.709090909090909 60L 15.709090909090909 60L 15.709090909090909 60L 10.472727272727273 60"
                                                              cy="33" cx="19.2" j="1" val="45"
                                                              barHeight="27"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2364"
                                                              d="M 19.2 60L 19.2 15.600000000000001L 24.436363636363637 15.600000000000001L 24.436363636363637 15.600000000000001L 24.436363636363637 60L 24.436363636363637 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 19.2 60L 19.2 15.600000000000001L 24.436363636363637 15.600000000000001L 24.436363636363637 15.600000000000001L 24.436363636363637 60L 24.436363636363637 60z"
                                                              pathFrom="M 19.2 60L 19.2 60L 24.436363636363637 60L 24.436363636363637 60L 24.436363636363637 60L 19.2 60"
                                                              cy="15.600000000000001"
                                                              cx="27.927272727272726" j="2" val="74"
                                                              barHeight="44.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2365"
                                                              d="M 27.927272727272726 60L 27.927272727272726 51.6L 33.163636363636364 51.6L 33.163636363636364 51.6L 33.163636363636364 60L 33.163636363636364 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 27.927272727272726 60L 27.927272727272726 51.6L 33.163636363636364 51.6L 33.163636363636364 51.6L 33.163636363636364 60L 33.163636363636364 60z"
                                                              pathFrom="M 27.927272727272726 60L 27.927272727272726 60L 33.163636363636364 60L 33.163636363636364 60L 33.163636363636364 60L 27.927272727272726 60"
                                                              cy="51.6" cx="36.654545454545456" j="3"
                                                              val="14" barHeight="8.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2366"
                                                              d="M 36.654545454545456 60L 36.654545454545456 26.4L 41.89090909090909 26.4L 41.89090909090909 26.4L 41.89090909090909 60L 41.89090909090909 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 36.654545454545456 60L 36.654545454545456 26.4L 41.89090909090909 26.4L 41.89090909090909 26.4L 41.89090909090909 60L 41.89090909090909 60z"
                                                              pathFrom="M 36.654545454545456 60L 36.654545454545456 60L 41.89090909090909 60L 41.89090909090909 60L 41.89090909090909 60L 36.654545454545456 60"
                                                              cy="26.4" cx="45.38181818181818" j="4"
                                                              val="56" barHeight="33.6"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2367"
                                                              d="M 45.38181818181818 60L 45.38181818181818 15.600000000000001L 50.61818181818182 15.600000000000001L 50.61818181818182 15.600000000000001L 50.61818181818182 60L 50.61818181818182 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 45.38181818181818 60L 45.38181818181818 15.600000000000001L 50.61818181818182 15.600000000000001L 50.61818181818182 15.600000000000001L 50.61818181818182 60L 50.61818181818182 60z"
                                                              pathFrom="M 45.38181818181818 60L 45.38181818181818 60L 50.61818181818182 60L 50.61818181818182 60L 50.61818181818182 60L 45.38181818181818 60"
                                                              cy="15.600000000000001" cx="54.10909090909091"
                                                              j="5" val="74" barHeight="44.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2368"
                                                              d="M 54.10909090909091 60L 54.10909090909091 51.6L 59.345454545454544 51.6L 59.345454545454544 51.6L 59.345454545454544 60L 59.345454545454544 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 54.10909090909091 60L 54.10909090909091 51.6L 59.345454545454544 51.6L 59.345454545454544 51.6L 59.345454545454544 60L 59.345454545454544 60z"
                                                              pathFrom="M 54.10909090909091 60L 54.10909090909091 60L 59.345454545454544 60L 59.345454545454544 60L 59.345454545454544 60L 54.10909090909091 60"
                                                              cy="51.6" cx="62.836363636363636" j="6"
                                                              val="14" barHeight="8.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2369"
                                                              d="M 62.836363636363636 60L 62.836363636363636 53.4L 68.07272727272728 53.4L 68.07272727272728 53.4L 68.07272727272728 60L 68.07272727272728 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 62.836363636363636 60L 62.836363636363636 53.4L 68.07272727272728 53.4L 68.07272727272728 53.4L 68.07272727272728 60L 68.07272727272728 60z"
                                                              pathFrom="M 62.836363636363636 60L 62.836363636363636 60L 68.07272727272728 60L 68.07272727272728 60L 68.07272727272728 60L 62.836363636363636 60"
                                                              cy="53.4" cx="71.56363636363636" j="7"
                                                              val="11" barHeight="6.6"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2370"
                                                              d="M 71.56363636363636 60L 71.56363636363636 55.8L 76.8 55.8L 76.8 55.8L 76.8 60L 76.8 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 71.56363636363636 60L 71.56363636363636 55.8L 76.8 55.8L 76.8 55.8L 76.8 60L 76.8 60z"
                                                              pathFrom="M 71.56363636363636 60L 71.56363636363636 60L 76.8 60L 76.8 60L 76.8 60L 71.56363636363636 60"
                                                              cy="55.8" cx="80.29090909090908" j="8" val="7"
                                                              barHeight="4.2"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2371"
                                                              d="M 80.29090909090908 60L 80.29090909090908 36.6L 85.52727272727272 36.6L 85.52727272727272 36.6L 85.52727272727272 60L 85.52727272727272 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 80.29090909090908 60L 80.29090909090908 36.6L 85.52727272727272 36.6L 85.52727272727272 36.6L 85.52727272727272 60L 85.52727272727272 60z"
                                                              pathFrom="M 80.29090909090908 60L 80.29090909090908 60L 85.52727272727272 60L 85.52727272727272 60L 85.52727272727272 60L 80.29090909090908 60"
                                                              cy="36.6" cx="89.0181818181818" j="9" val="39"
                                                              barHeight="23.4"
                                                              barWidth="5.236363636363636"></path>
                                                        <path id="SvgjsPath2372"
                                                              d="M 89.0181818181818 60L 89.0181818181818 10.800000000000004L 94.25454545454544 10.800000000000004L 94.25454545454544 10.800000000000004L 94.25454545454544 60L 94.25454545454544 60z"
                                                              fill="rgba(64,195,145,0.85)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="square"
                                                              stroke-width="0" stroke-dasharray="0"
                                                              class="apexcharts-bar-area" index="0"
                                                              clip-path="url(#gridRectMaskw2bkzz4k)"
                                                              pathTo="M 89.0181818181818 60L 89.0181818181818 10.800000000000004L 94.25454545454544 10.800000000000004L 94.25454545454544 10.800000000000004L 94.25454545454544 60L 94.25454545454544 60z"
                                                              pathFrom="M 89.0181818181818 60L 89.0181818181818 60L 94.25454545454544 60L 94.25454545454544 60L 94.25454545454544 60L 89.0181818181818 60"
                                                              cy="10.800000000000004" cx="97.74545454545452"
                                                              j="10" val="82" barHeight="49.199999999999996"
                                                              barWidth="5.236363636363636"></path>
                                                    </g>
                                                    <g id="SvgjsG2361" class="apexcharts-datalabels"
                                                       data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine2387" x1="0" y1="0" x2="96" y2="0"
                                                      stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                      class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine2388" x1="0" y1="0" x2="96" y2="0"
                                                      stroke-dasharray="0" stroke-width="0"
                                                      class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG2389" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG2390" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG2391" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect2354" width="0" height="0" x="0" y="0" rx="0"
                                                  ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG2375" class="apexcharts-yaxis" rel="0"
                                               transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG2347" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-series-group"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(64, 195, 145);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-label"></span><span
                                                            class="apexcharts-tooltip-text-value"></span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 97px; height: 61px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body" style="position: relative;">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-1">Campaigns</h4>

                    <div id="dash-campaigns-chart" class="apex-charts" data-colors="#40c391,#ffa866,#44badc"
                         style="min-height: 304.7px;">
                    </div>

                    <div class="row text-center mt-2">
                        <div class="col-md-4">
                            <i class="mdi mdi-send widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="font-weight-normal mt-3">
                                <span>6,510</span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i
                                    class="mdi mdi-checkbox-blank-circle text-warning"></i> Total Sent</p>
                        </div>
                        <div class="col-md-4">
                            <i class="mdi mdi-flag-variant widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="font-weight-normal mt-3">
                                <span>3,487</span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i
                                    class="mdi mdi-checkbox-blank-circle text-primary"></i> Reached</p>
                        </div>
                        <div class="col-md-4">
                            <i class="mdi mdi-email-open widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="font-weight-normal mt-3">
                                <span>1,568</span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i
                                    class="mdi mdi-checkbox-blank-circle text-success"></i> Opened</p>
                        </div>
                    </div>

                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 458px; height: 521px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->

        <div class="col-lg-7">
            <div class="card">
                <div class="card-body" style="position: relative;">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Today</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Revenue</h4>

                    <div class="chart-content-bg">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Current Month</p>
                                <h2 class="font-weight-normal mb-3">
                                    <span>$42,025</span>
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Previous Month</p>
                                <h2 class="font-weight-normal mb-3">
                                    <span>$74,651</span>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div id="dash-revenue-chart" class="apex-charts" data-colors="#40c391,#44badc"
                         style="min-height: 336px;">
                        <div id="apexchartsryscjef9"
                             class="apexcharts-canvas apexchartsryscjef9 apexcharts-theme-light apexcharts-zoomable"
                             style="width: 601px; height: 321px;">
                            <svg id="SvgjsSvg1550" width="601" height="321"
                                 xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                 xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                 style="background: transparent;">
                                <foreignObject x="0" y="0" width="601" height="321">
                                    <div class="apexcharts-legend apexcharts-align-center position-bottom"
                                         xmlns="http://www.w3.org/1999/xhtml"
                                         style="inset: auto 0px 0px; position: absolute;">
                                        <div class="apexcharts-legend-series" rel="1" data:collapsed="false"
                                             style="margin: 0px 5px;"><span class="apexcharts-legend-marker"
                                                                            rel="1" data:collapsed="false"
                                                                            style="background: rgb(64, 195, 145); color: rgb(64, 195, 145); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                class="apexcharts-legend-text" rel="1" i="0"
                                                data:default-text="Total%20Revenue" data:collapsed="false"
                                                style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400;">Total Revenue</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="2" data:collapsed="false"
                                             style="margin: 0px 5px;"><span class="apexcharts-legend-marker"
                                                                            rel="2" data:collapsed="false"
                                                                            style="background: rgb(68, 186, 220); color: rgb(68, 186, 220); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                class="apexcharts-legend-text" rel="2" i="1"
                                                data:default-text="Total%20Pipeline" data:collapsed="false"
                                                style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400;">Total Pipeline</span>
                                        </div>
                                    </div>
                                    <style type="text/css">

                                        .apexcharts-legend {
                                            display: flex;
                                            overflow: auto;
                                            padding: 0 10px;
                                        }

                                        .apexcharts-legend.position-bottom, .apexcharts-legend.position-top {
                                            flex-wrap: wrap
                                        }

                                        .apexcharts-legend.position-right, .apexcharts-legend.position-left {
                                            flex-direction: column;
                                            bottom: 0;
                                        }

                                        .apexcharts-legend.position-bottom.apexcharts-align-left, .apexcharts-legend.position-top.apexcharts-align-left, .apexcharts-legend.position-right, .apexcharts-legend.position-left {
                                            justify-content: flex-start;
                                        }

                                        .apexcharts-legend.position-bottom.apexcharts-align-center, .apexcharts-legend.position-top.apexcharts-align-center {
                                            justify-content: center;
                                        }

                                        .apexcharts-legend.position-bottom.apexcharts-align-right, .apexcharts-legend.position-top.apexcharts-align-right {
                                            justify-content: flex-end;
                                        }

                                        .apexcharts-legend-series {
                                            cursor: pointer;
                                            line-height: normal;
                                        }

                                        .apexcharts-legend.position-bottom .apexcharts-legend-series, .apexcharts-legend.position-top .apexcharts-legend-series {
                                            display: flex;
                                            align-items: center;
                                        }

                                        .apexcharts-legend-text {
                                            position: relative;
                                            font-size: 14px;
                                        }

                                        .apexcharts-legend-text *, .apexcharts-legend-marker * {
                                            pointer-events: none;
                                        }

                                        .apexcharts-legend-marker {
                                            position: relative;
                                            display: inline-block;
                                            cursor: pointer;
                                            margin-right: 3px;
                                            border-style: solid;
                                        }

                                        .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                            display: inline-block;
                                        }

                                        .apexcharts-legend-series.apexcharts-no-click {
                                            cursor: auto;
                                        }

                                        .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
                                            display: none !important;
                                        }

                                        .apexcharts-inactive-legend {
                                            opacity: 0.45;
                                        }</style>
                                </foreignObject>
                                <g id="SvgjsG1552" class="apexcharts-inner apexcharts-graphical"
                                   transform="translate(50.39999961853027, 40)">
                                    <defs id="SvgjsDefs1551">
                                        <clipPath id="gridRectMaskryscjef9">
                                            <rect id="SvgjsRect1559" width="534.8040037155151"
                                                  height="218.11199999999997" x="-3" y="-1" rx="0" ry="0"
                                                  opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskryscjef9">
                                            <rect id="SvgjsRect1560" width="532.8040037155151"
                                                  height="220.11199999999997" x="-2" y="-2" rx="0" ry="0"
                                                  opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <line id="SvgjsLine1558" x1="-0.5" y1="0" x2="-0.5"
                                          y2="216.11199999999997" stroke="#b6b6b6" stroke-dasharray="3"
                                          class="apexcharts-xcrosshairs" x="-0.5" y="0" width="1"
                                          height="216.11199999999997" fill="#b1b9c4" filter="none"
                                          fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG1573" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1574" class="apexcharts-xaxis-texts-g"
                                           transform="translate(0, -4)">
                                            <text id="SvgjsText1576"
                                                  font-family="Helvetica, Arial, sans-serif" x="0"
                                                  y="245.11199999999997" text-anchor="middle"
                                                  dominant-baseline="auto" font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1577">Jan</tspan>
                                                <title>Jan</title></text>
                                            <text id="SvgjsText1579"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="48.07309124686502" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1580">Feb</tspan>
                                                <title>Feb</title></text>
                                            <text id="SvgjsText1582"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="96.14618249373002" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1583">Mar</tspan>
                                                <title>Mar</title></text>
                                            <text id="SvgjsText1585"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="144.219273740595" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1586">Apr</tspan>
                                                <title>Apr</title></text>
                                            <text id="SvgjsText1588"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="192.29236498746002" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1589">May</tspan>
                                                <title>May</title></text>
                                            <text id="SvgjsText1591"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="240.36545623432505" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1592">Jun</tspan>
                                                <title>Jun</title></text>
                                            <text id="SvgjsText1594"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="288.4385474811901" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1595">Jul</tspan>
                                                <title>Jul</title></text>
                                            <text id="SvgjsText1597"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="336.5116387280551" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1598">Aug</tspan>
                                                <title>Aug</title></text>
                                            <text id="SvgjsText1600"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="384.58472997492015" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1601">Sep</tspan>
                                                <title>Sep</title></text>
                                            <text id="SvgjsText1603"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="432.6578212217852" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1604">Oct</tspan>
                                                <title>Oct</title></text>
                                            <text id="SvgjsText1606"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="480.7309124686502" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1607">Nov</tspan>
                                                <title>Nov</title></text>
                                            <text id="SvgjsText1609"
                                                  font-family="Helvetica, Arial, sans-serif"
                                                  x="528.8040037155153" y="245.11199999999997"
                                                  text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1610">Dec</tspan>
                                                <title>Dec</title></text>
                                        </g>
                                        <line id="SvgjsLine1611" x1="0" y1="217.11199999999997"
                                              x2="528.8040037155151" y2="217.11199999999997"
                                              stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"></line>
                                    </g>
                                    <g id="SvgjsG1638" class="apexcharts-grid">
                                        <g id="SvgjsG1639" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1653" x1="0" y1="0" x2="528.8040037155151"
                                                  y2="0" stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1654" x1="0" y1="21.611199999999997"
                                                  x2="528.8040037155151" y2="21.611199999999997"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1655" x1="0" y1="43.22239999999999"
                                                  x2="528.8040037155151" y2="43.22239999999999"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1656" x1="0" y1="64.83359999999999"
                                                  x2="528.8040037155151" y2="64.83359999999999"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1657" x1="0" y1="86.44479999999999"
                                                  x2="528.8040037155151" y2="86.44479999999999"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1658" x1="0" y1="108.05599999999998"
                                                  x2="528.8040037155151" y2="108.05599999999998"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1659" x1="0" y1="129.66719999999998"
                                                  x2="528.8040037155151" y2="129.66719999999998"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1660" x1="0" y1="151.27839999999998"
                                                  x2="528.8040037155151" y2="151.27839999999998"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1661" x1="0" y1="172.88959999999997"
                                                  x2="528.8040037155151" y2="172.88959999999997"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1662" x1="0" y1="194.50079999999997"
                                                  x2="528.8040037155151" y2="194.50079999999997"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1663" x1="0" y1="216.11199999999997"
                                                  x2="528.8040037155151" y2="216.11199999999997"
                                                  stroke="#f1f3fa" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1640" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1641" x1="0" y1="217.11199999999997" x2="0"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1642" x1="48.07309124686501"
                                              y1="217.11199999999997" x2="48.07309124686501"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1643" x1="96.14618249373002"
                                              y1="217.11199999999997" x2="96.14618249373002"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1644" x1="144.21927374059504"
                                              y1="217.11199999999997" x2="144.21927374059504"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1645" x1="192.29236498746005"
                                              y1="217.11199999999997" x2="192.29236498746005"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1646" x1="240.36545623432505"
                                              y1="217.11199999999997" x2="240.36545623432505"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1647" x1="288.4385474811901"
                                              y1="217.11199999999997" x2="288.4385474811901"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1648" x1="336.5116387280551"
                                              y1="217.11199999999997" x2="336.5116387280551"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1649" x1="384.58472997492015"
                                              y1="217.11199999999997" x2="384.58472997492015"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1650" x1="432.6578212217852"
                                              y1="217.11199999999997" x2="432.6578212217852"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1651" x1="480.7309124686502"
                                              y1="217.11199999999997" x2="480.7309124686502"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1652" x1="528.8040037155153"
                                              y1="217.11199999999997" x2="528.8040037155153"
                                              y2="223.11199999999997" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1665" x1="0" y1="216.11199999999997"
                                              x2="528.8040037155151" y2="216.11199999999997"
                                              stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1664" x1="0" y1="1" x2="0"
                                              y2="216.11199999999997" stroke="transparent"
                                              stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1562"
                                       class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1563" class="apexcharts-series"
                                           seriesName="TotalxRevenue" data:longestSeries="true" rel="1"
                                           data:realIndex="0">
                                            <path id="SvgjsPath1566"
                                                  d="M 0 216.11199999999997L 0 82.46578777231201C 16.825581936402752 82.46578777231201 31.24750931046226 49.05423471539001 48.07309124686501 49.05423471539001C 64.89867318326776 49.05423471539001 79.32060055732727 121.95216865776527 96.14618249373002 121.95216865776527C 112.97176443013278 121.95216865776527 127.39369180419229 73.35354602951512 144.21927374059504 73.35354602951512C 161.0448556769978 73.35354602951512 175.4667830510573 121.95216865776527 192.29236498746005 121.95216865776527C 209.1179469238628 121.95216865776527 223.53987429792232 85.50320168657765 240.36545623432508 85.50320168657765C 257.19103817072784 85.50320168657765 271.61296554478736 137.13923822909345 288.4385474811901 137.13923822909345C 305.26412941759287 137.13923822909345 319.68605679165233 91.57802951510891 336.5116387280551 91.57802951510891C 353.33722066445785 91.57802951510891 367.75914803851737 121.95216865776527 384.5847299749201 121.95216865776527C 401.4103119113229 121.95216865776527 415.83223928538234 73.35354602951512 432.6578212217851 73.35354602951512C 449.4834031581879 73.35354602951512 463.9053305322474 115.877340829234 480.73091246865016 115.877340829234C 497.5564944050529 115.877340829234 511.9784217791124 85.50320168657765 528.8040037155151 85.50320168657765C 528.8040037155151 85.50320168657765 528.8040037155151 85.50320168657765 528.8040037155151 216.11199999999997M 528.8040037155151 85.50320168657765z"
                                                  fill="rgba(64,195,145,0.35)" fill-opacity="1"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                  stroke-dasharray="0" class="apexcharts-area" index="0"
                                                  clip-path="url(#gridRectMaskryscjef9)"
                                                  pathTo="M 0 216.11199999999997L 0 82.46578777231201C 16.825581936402752 82.46578777231201 31.24750931046226 49.05423471539001 48.07309124686501 49.05423471539001C 64.89867318326776 49.05423471539001 79.32060055732727 121.95216865776527 96.14618249373002 121.95216865776527C 112.97176443013278 121.95216865776527 127.39369180419229 73.35354602951512 144.21927374059504 73.35354602951512C 161.0448556769978 73.35354602951512 175.4667830510573 121.95216865776527 192.29236498746005 121.95216865776527C 209.1179469238628 121.95216865776527 223.53987429792232 85.50320168657765 240.36545623432508 85.50320168657765C 257.19103817072784 85.50320168657765 271.61296554478736 137.13923822909345 288.4385474811901 137.13923822909345C 305.26412941759287 137.13923822909345 319.68605679165233 91.57802951510891 336.5116387280551 91.57802951510891C 353.33722066445785 91.57802951510891 367.75914803851737 121.95216865776527 384.5847299749201 121.95216865776527C 401.4103119113229 121.95216865776527 415.83223928538234 73.35354602951512 432.6578212217851 73.35354602951512C 449.4834031581879 73.35354602951512 463.9053305322474 115.877340829234 480.73091246865016 115.877340829234C 497.5564944050529 115.877340829234 511.9784217791124 85.50320168657765 528.8040037155151 85.50320168657765C 528.8040037155151 85.50320168657765 528.8040037155151 85.50320168657765 528.8040037155151 216.11199999999997M 528.8040037155151 85.50320168657765z"
                                                  pathFrom="M -1 216.11199999999997L -1 216.11199999999997L 48.07309124686501 216.11199999999997L 96.14618249373002 216.11199999999997L 144.21927374059504 216.11199999999997L 192.29236498746005 216.11199999999997L 240.36545623432508 216.11199999999997L 288.4385474811901 216.11199999999997L 336.5116387280551 216.11199999999997L 384.5847299749201 216.11199999999997L 432.6578212217851 216.11199999999997L 480.73091246865016 216.11199999999997L 528.8040037155151 216.11199999999997"></path>
                                            <path id="SvgjsPath1567"
                                                  d="M 0 82.46578777231201C 16.825581936402752 82.46578777231201 31.24750931046226 49.05423471539001 48.07309124686501 49.05423471539001C 64.89867318326776 49.05423471539001 79.32060055732727 121.95216865776527 96.14618249373002 121.95216865776527C 112.97176443013278 121.95216865776527 127.39369180419229 73.35354602951512 144.21927374059504 73.35354602951512C 161.0448556769978 73.35354602951512 175.4667830510573 121.95216865776527 192.29236498746005 121.95216865776527C 209.1179469238628 121.95216865776527 223.53987429792232 85.50320168657765 240.36545623432508 85.50320168657765C 257.19103817072784 85.50320168657765 271.61296554478736 137.13923822909345 288.4385474811901 137.13923822909345C 305.26412941759287 137.13923822909345 319.68605679165233 91.57802951510891 336.5116387280551 91.57802951510891C 353.33722066445785 91.57802951510891 367.75914803851737 121.95216865776527 384.5847299749201 121.95216865776527C 401.4103119113229 121.95216865776527 415.83223928538234 73.35354602951512 432.6578212217851 73.35354602951512C 449.4834031581879 73.35354602951512 463.9053305322474 115.877340829234 480.73091246865016 115.877340829234C 497.5564944050529 115.877340829234 511.9784217791124 85.50320168657765 528.8040037155151 85.50320168657765"
                                                  fill="none" fill-opacity="1" stroke="#40c391"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                  stroke-dasharray="0" class="apexcharts-area" index="0"
                                                  clip-path="url(#gridRectMaskryscjef9)"
                                                  pathTo="M 0 82.46578777231201C 16.825581936402752 82.46578777231201 31.24750931046226 49.05423471539001 48.07309124686501 49.05423471539001C 64.89867318326776 49.05423471539001 79.32060055732727 121.95216865776527 96.14618249373002 121.95216865776527C 112.97176443013278 121.95216865776527 127.39369180419229 73.35354602951512 144.21927374059504 73.35354602951512C 161.0448556769978 73.35354602951512 175.4667830510573 121.95216865776527 192.29236498746005 121.95216865776527C 209.1179469238628 121.95216865776527 223.53987429792232 85.50320168657765 240.36545623432508 85.50320168657765C 257.19103817072784 85.50320168657765 271.61296554478736 137.13923822909345 288.4385474811901 137.13923822909345C 305.26412941759287 137.13923822909345 319.68605679165233 91.57802951510891 336.5116387280551 91.57802951510891C 353.33722066445785 91.57802951510891 367.75914803851737 121.95216865776527 384.5847299749201 121.95216865776527C 401.4103119113229 121.95216865776527 415.83223928538234 73.35354602951512 432.6578212217851 73.35354602951512C 449.4834031581879 73.35354602951512 463.9053305322474 115.877340829234 480.73091246865016 115.877340829234C 497.5564944050529 115.877340829234 511.9784217791124 85.50320168657765 528.8040037155151 85.50320168657765"
                                                  pathFrom="M -1 216.11199999999997L -1 216.11199999999997L 48.07309124686501 216.11199999999997L 96.14618249373002 216.11199999999997L 144.21927374059504 216.11199999999997L 192.29236498746005 216.11199999999997L 240.36545623432508 216.11199999999997L 288.4385474811901 216.11199999999997L 336.5116387280551 216.11199999999997L 384.5847299749201 216.11199999999997L 432.6578212217851 216.11199999999997L 480.73091246865016 216.11199999999997L 528.8040037155151 216.11199999999997"></path>
                                            <g id="SvgjsG1564" class="apexcharts-series-markers-wrap"
                                               data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1671" r="0" cx="0"
                                                            cy="82.46578777231201"
                                                            class="apexcharts-marker wy4ydj8g7"
                                                            stroke="#ffffff" fill="#40c391" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9"
                                                            default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1568"
                                       class="apexcharts-line-series apexcharts-plot-series">
                                        <g id="SvgjsG1569" class="apexcharts-series"
                                           seriesName="TotalxPipeline" data:longestSeries="true" rel="1"
                                           data:realIndex="1">
                                            <path id="SvgjsPath1572"
                                                  d="M 0 49.05423471539001C 16.825581936402752 49.05423471539001 31.24750931046226 6.53043991567111 48.07309124686501 6.53043991567111C 64.89867318326776 6.53043991567111 79.32060055732727 79.42837385804637 96.14618249373002 79.42837385804637C 112.97176443013278 79.42837385804637 127.39369180419229 30.829751229796216 144.21927374059504 30.829751229796216C 161.0448556769978 30.829751229796216 175.4667830510573 85.50320168657765 192.29236498746005 85.50320168657765C 209.1179469238628 85.50320168657765 223.53987429792232 52.09164862965565 240.36545623432508 52.09164862965565C 257.19103817072784 52.09164862965565 271.61296554478736 103.72768517217146 288.4385474811901 103.72768517217146C 305.26412941759287 103.72768517217146 319.68605679165233 58.166476458186935 336.5116387280551 58.166476458186935C 353.33722066445785 58.166476458186935 367.75914803851737 82.46578777231201 384.5847299749201 82.46578777231201C 401.4103119113229 82.46578777231201 415.83223928538234 30.829751229796216 432.6578212217851 30.829751229796216C 449.4834031581879 30.829751229796216 463.9053305322474 85.50320168657765 480.73091246865016 85.50320168657765C 497.5564944050529 85.50320168657765 511.9784217791124 46.016820801124396 528.8040037155151 46.016820801124396"
                                                  fill="none" fill-opacity="1" stroke="rgba(68,186,220,1)"
                                                  stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                  stroke-dasharray="0" class="apexcharts-line" index="1"
                                                  clip-path="url(#gridRectMaskryscjef9)"
                                                  pathTo="M 0 49.05423471539001C 16.825581936402752 49.05423471539001 31.24750931046226 6.53043991567111 48.07309124686501 6.53043991567111C 64.89867318326776 6.53043991567111 79.32060055732727 79.42837385804637 96.14618249373002 79.42837385804637C 112.97176443013278 79.42837385804637 127.39369180419229 30.829751229796216 144.21927374059504 30.829751229796216C 161.0448556769978 30.829751229796216 175.4667830510573 85.50320168657765 192.29236498746005 85.50320168657765C 209.1179469238628 85.50320168657765 223.53987429792232 52.09164862965565 240.36545623432508 52.09164862965565C 257.19103817072784 52.09164862965565 271.61296554478736 103.72768517217146 288.4385474811901 103.72768517217146C 305.26412941759287 103.72768517217146 319.68605679165233 58.166476458186935 336.5116387280551 58.166476458186935C 353.33722066445785 58.166476458186935 367.75914803851737 82.46578777231201 384.5847299749201 82.46578777231201C 401.4103119113229 82.46578777231201 415.83223928538234 30.829751229796216 432.6578212217851 30.829751229796216C 449.4834031581879 30.829751229796216 463.9053305322474 85.50320168657765 480.73091246865016 85.50320168657765C 497.5564944050529 85.50320168657765 511.9784217791124 46.016820801124396 528.8040037155151 46.016820801124396"
                                                  pathFrom="M -1 216.11199999999997L -1 216.11199999999997L 48.07309124686501 216.11199999999997L 96.14618249373002 216.11199999999997L 144.21927374059504 216.11199999999997L 192.29236498746005 216.11199999999997L 240.36545623432508 216.11199999999997L 288.4385474811901 216.11199999999997L 336.5116387280551 216.11199999999997L 384.5847299749201 216.11199999999997L 432.6578212217851 216.11199999999997L 480.73091246865016 216.11199999999997L 528.8040037155151 216.11199999999997"></path>
                                            <g id="SvgjsG1570" class="apexcharts-series-markers-wrap"
                                               data:realIndex="1">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1672" r="0" cx="0"
                                                            cy="49.05423471539001"
                                                            class="apexcharts-marker wtier81si"
                                                            stroke="#ffffff" fill="#44badc" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9"
                                                            default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1571" class="apexcharts-datalabels"
                                               data:realIndex="1"></g>
                                        </g>
                                        <g id="SvgjsG1565" class="apexcharts-datalabels"
                                           data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1666" x1="0" y1="0" x2="528.8040037155151" y2="0"
                                          stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                          class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1667" x1="0" y1="0" x2="528.8040037155151" y2="0"
                                          stroke-dasharray="0" stroke-width="0"
                                          class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1668" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1669" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1670" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1673" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                          opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                          fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1674" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                          opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                          fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                </g>
                                <rect id="SvgjsRect1557" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                      opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                      fill="#fefefe"></rect>
                                <g id="SvgjsG1612" class="apexcharts-yaxis" rel="0"
                                   transform="translate(20.399999618530273, 0)">
                                    <g id="SvgjsG1613" class="apexcharts-yaxis-texts-g">
                                        <text id="SvgjsText1614" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="42" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px" font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1615">71</tspan>
                                        </text>
                                        <text id="SvgjsText1616" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="63.6112" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px" font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1617">64</tspan>
                                        </text>
                                        <text id="SvgjsText1618" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="85.2224" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px" font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1619">57</tspan>
                                        </text>
                                        <text id="SvgjsText1620" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="106.83359999999999" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1621">50</tspan>
                                        </text>
                                        <text id="SvgjsText1622" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="128.4448" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px" font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1623">43</tspan>
                                        </text>
                                        <text id="SvgjsText1624" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="150.05599999999998" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1625">36</tspan>
                                        </text>
                                        <text id="SvgjsText1626" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="171.66719999999998" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1627">28</tspan>
                                        </text>
                                        <text id="SvgjsText1628" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="193.27839999999998" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1629">21</tspan>
                                        </text>
                                        <text id="SvgjsText1630" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="214.88959999999997" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1631">14</tspan>
                                        </text>
                                        <text id="SvgjsText1632" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="236.50079999999997" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1633">7</tspan>
                                        </text>
                                        <text id="SvgjsText1634" font-family="Helvetica, Arial, sans-serif"
                                              x="20" y="258.11199999999997" text-anchor="end"
                                              dominant-baseline="auto" font-size="11px" font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1635">0</tspan>
                                        </text>
                                    </g>
                                    <g id="SvgjsG1636" class="apexcharts-yaxis-title">
                                        <text id="SvgjsText1637" font-family="Helvetica, Arial, sans-serif"
                                              x="30.006251335144043" y="148.05599999999998"
                                              text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="900" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-title-text "
                                              style="font-family: Helvetica, Arial, sans-serif;"
                                              transform="rotate(-90 -8.799995422363281 144.45600271224976)">
                                            Revenue (USD)
                                        </text>
                                    </g>
                                </g>
                                <g id="SvgjsG1553" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light"
                                 style="left: 61.4px; top: 85.4658px;">
                                <div class="apexcharts-tooltip-title"
                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Jan
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                     style="display: flex;"><span class="apexcharts-tooltip-marker"
                                                                  style="background-color: rgb(64, 195, 145);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label">Total Revenue: </span><span
                                                class="apexcharts-tooltip-text-value">44k</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                     style="display: flex;"><span class="apexcharts-tooltip-marker"
                                                                  style="background-color: rgb(68, 186, 220);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label">Total Pipeline: </span><span
                                                class="apexcharts-tooltip-text-value">55k</span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                style="left: 26.9312px; top: 258.112px;">
                                <div class="apexcharts-xaxistooltip-text"
                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 21.3125px;">
                                    Jan
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>

                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 650px; height: 522px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Top Performing</h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-nowrap table-centered mb-0">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Leads</th>
                                <th>Deals</th>
                                <th>Tasks</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <h5 class="font-15 mb-1 font-weight-normal">Jeremy Young</h5>
                                    <span class="text-muted font-13">Senior Sales Executive</span>
                                </td>
                                <td>187</td>
                                <td>154</td>
                                <td>49</td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-15 mb-1 font-weight-normal">Thomas Krueger</h5>
                                    <span class="text-muted font-13">Senior Sales Executive</span>
                                </td>
                                <td>235</td>
                                <td>127</td>
                                <td>83</td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-15 mb-1 font-weight-normal">Pete Burdine</h5>
                                    <span class="text-muted font-13">Senior Sales Executive</span>
                                </td>
                                <td>365</td>
                                <td>148</td>
                                <td>62</td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-15 mb-1 font-weight-normal">Mary Nelson</h5>
                                    <span class="text-muted font-13">Senior Sales Executive</span>
                                </td>
                                <td>753</td>
                                <td>159</td>
                                <td>258</td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-15 mb-1 font-weight-normal">Kevin Grove</h5>
                                    <span class="text-muted font-13">Senior Sales Executive</span>
                                </td>
                                <td>458</td>
                                <td>126</td>
                                <td>73</td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="action-icon"> <i
                                            class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-4">Recent Leads</h4>

                    <div class="media">
                        <img class="mr-3 rounded-circle" src="assets/images/users/avatar-2.jpg" width="40"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="badge badge-warning-lighten float-right">Cold lead</span>
                            <h5 class="mt-0 mb-1">Risa Pearson</h5>
                            <span class="font-13">richard.john@mail.com</span>
                        </div>
                    </div>

                    <div class="media mt-3">
                        <img class="mr-3 rounded-circle" src="assets/images/users/avatar-3.jpg" width="40"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="badge badge-danger-lighten float-right">Lost lead</span>
                            <h5 class="mt-0 mb-1">Margaret D. Evans</h5>
                            <span class="font-13">margaret.evans@rhyta.com</span>
                        </div>
                    </div>

                    <div class="media mt-3">
                        <img class="mr-3 rounded-circle" src="assets/images/users/avatar-4.jpg" width="40"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="badge badge-success-lighten float-right">Won lead</span>
                            <h5 class="mt-0 mb-1">Bryan J. Luellen</h5>
                            <span class="font-13">bryuellen@dayrep.com</span>
                        </div>
                    </div>

                    <div class="media mt-3">
                        <img class="mr-3 rounded-circle" src="assets/images/users/avatar-5.jpg" width="40"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="badge badge-warning-lighten float-right">Cold lead</span>
                            <h5 class="mt-0 mb-1">Kathryn S. Collier</h5>
                            <span class="font-13">collier@jourrapide.com</span>
                        </div>
                    </div>

                    <div class="media mt-3">
                        <img class="mr-3 rounded-circle" src="assets/images/users/avatar-1.jpg" width="40"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="badge badge-warning-lighten float-right">Cold lead</span>
                            <h5 class="mt-0 mb-1">Timothy Kauper</h5>
                            <span class="font-13">thykauper@rhyta.com</span>
                        </div>
                    </div>

                    <div class="media mt-3">
                        <img class="mr-3 rounded-circle" src="assets/images/users/avatar-6.jpg" width="40"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="badge badge-success-lighten float-right">Won lead</span>
                            <h5 class="mt-0 mb-1">Zara Raws</h5>
                            <span class="font-13">austin@dayrep.com</span>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-xl-4 col-lg-6">
            <div class="card cta-box bg-success text-white">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h2 class="mt-0"><i class="mdi mdi-bullhorn-outline"></i>&nbsp;</h2>
                            <h3 class="m-0 font-weight-normal cta-box-title">Enhance your <b>Campaign</b>
                                for better outreach <i class="mdi mdi-arrow-right"></i></h3>
                        </div>
                        <img class="ml-3" src="assets/images/email-campaign.svg" width="120"
                             alt="Generic placeholder image">
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card-->

            <!-- Todo-->
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-2">Todo</h4>

                    <div class="todoapp">
                        <div data-simplebar="init" style="max-height: 224px">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper"
                                             style="height: auto; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <ul class="list-group list-group-flush todo-list"
                                                    id="todo-list">
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="7" checked=""><label
                                                                class="custom-control-label" for="7"><s>Build
                                                                    an angular app</s></label></div>
                                                    </li>
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="6"><label class="custom-control-label"
                                                                              for="6">Create new version
                                                                3.0</label></div>
                                                    </li>
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="5"><label class="custom-control-label"
                                                                              for="5">Hehe!! This looks
                                                                cool!</label></div>
                                                    </li>
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="4" checked=""><label
                                                                class="custom-control-label"
                                                                for="4"><s>Testing??</s></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="3" checked=""><label
                                                                class="custom-control-label" for="3"><s>Creating
                                                                    component page</s></label></div>
                                                    </li>
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="2" checked=""><label
                                                                class="custom-control-label" for="2"><s>Build
                                                                    a js based app</s></label></div>
                                                    </li>
                                                    <li class="list-group-item border-0 pl-0">
                                                        <div class="custom-control custom-checkbox"><input
                                                                type="checkbox"
                                                                class="custom-control-input todo-done"
                                                                id="1"><label class="custom-control-label"
                                                                              for="1">Design One page
                                                                theme</label></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder"
                                     style="width: auto; height: 315px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                     style="height: 159px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                            </div>
                        </div>
                    </div> <!-- end .todoapp-->

                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div>
        <!-- end col -->
    </div>
    <!-- end row-->
@endsection
