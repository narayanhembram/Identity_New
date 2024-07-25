@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="body-wrapper">
        {{-- <div class="table-content">

            <div class="row gy-4 mb-4">

                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="dash-card">
                        <a href="javascript:void(0)" class="d-flex justify-content-between">
                            <div>
                                <div>
                                    <p>@lang('Balance')</p>
                                </div>
                                <div class="content">
                                    <span
                                        class="text-uppercase">{{ $general->cur_sym }}{{ showAmount($user->balance) }}</span>
                                </div>

                            </div>
                            <div class="icon my-auto">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                        </a>
                    </div>
                </div>

                @if ($subscribe)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="dash-card">
                            <a href="{{ route('plans') }}" class="d-flex justify-content-between">
                                <div>
                                    <div>
                                        <p>{{ __(@$subscribe->plan->name) }} <span
                                                class="text-success">(@lang('Subscribed'))</span></p>
                                    </div>
                                    <div class="content">
                                        <span class="text-uppercase">{{ __($general->cur_sym) }}
                                            {{ showAmount(@$subscribe->plan->price) }}</span>
                                    </div>

                                </div>
                                <div class="icon my-auto">
                                    <i class="las la-gift"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @elseif($subscribe === false)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="dash-card">
                            <a href="{{ route('plans') }}" class="d-flex justify-content-between">
                                <div>
                                    <div>
                                        <p>@lang('Current Plan Expired')</p>
                                    </div>
                                    <div class="content">
                                        <p class="text-uppercase">@lang('subscribe to a new plan')</p>
                                    </div>

                                </div>
                                <div class="icon my-auto">
                                    <i class="las la-gift"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @elseif($subscribe === null)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="dash-card">
                            <a href="{{ route('plans') }}" class="d-flex justify-content-between">
                                <div>
                                    <div>
                                        <p>@lang('No Plan')</p>
                                    </div>
                                    <div class="content">
                                        <p class="text-uppercase">@lang('subscribe to a new plan')</p>
                                    </div>

                                </div>
                                <div class="icon my-auto">
                                    <i class="las la-gift"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="dash-card">
                        <a href="{{ route('services') }}" class="d-flex justify-content-between">
                            <div>
                                <div>
                                    <p>@lang('Services')</p>
                                </div>
                                <div class="content">
                                    <p class="text-uppercase">@lang('all services')</p>
                                </div>

                            </div>
                            <div class="icon my-auto">
                                <i class="fab fa-servicestack"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="dash-card">
                        <a href="" class="d-flex justify-content-between">
                            <div>
                                <div>
                                    <p>@lang('All Orders')</p>
                                </div>
                                <div class="content">
                                    <span class="text-uppercase">{{ $totalOrders }}</span>
                                </div>
                            </div>
                            <div class="icon my-auto">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div> --}}

        <div class="container mt-5 mb-5">
            <div class="row">
                @foreach ($modules as $module)

                <div class="col-lg-4 col-md-6">
                    <div class="card" style="padding-left: 10px; padding-right: 10px">
                        <div class="mt-3">
                            <img src="{{asset('Modules/'. $module->image)}}" style="height: 285px" alt="Career Library Image">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3"> {{ $module->title }} </h5>
                            <a href="{{route('user.subcategory')}}" class="btn btn-warning">{{ $module->btn_text }} <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="{{asset('Modules/1721024546_onetoone.jpg')}}" alt="Career Assessment Image">
                        <div class="card-body text-center">
                            <h5 class="card-title">Career Assessment</h5>
                            <a href="#" class="btn btn-warning">Start Assessment <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="{{asset('Modules/1721024449_Masterclass.jpg')}}" alt="Master Class Image">
                        <div class="card-body text-center">
                            <h5 class="card-title">Master Class</h5>
                            <a href="#" class="btn btn-warning">Watch Videos <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>
@endsection

@push('script')
    {{-- <script src="{{asset('assets/admin/js/apexcharts.min.js')}}"></script>
<script>
    (function () {
        "use strict";

        var options = {
            chart: {
                type: 'area',
                stacked: false,
                height: '310px'
            },
            stroke: {
                width: [0, 3],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
            colors: ['#00adad', '#67BAA7'],
            series: [{
        name: '@lang("Deposits")',
        type: 'area',
        data: @json($depositsChart['values'])
    }],
    fill: {
        opacity: [0.85, 1],
                },
    labels: @json($depositsChart['labels']),
    markers: {
        size: 0
    },
    xaxis: {
        type: 'text'
    },
    yaxis: {
        min: 0
    },
    tooltip: {
        shared: true,
            intersect: false,
                y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return "$ " + y.toFixed(0);
                }
                return y;

            }
        }
    },
    legend: {
        labels: {
            useSeriesColors: true
        },
        markers: {
            customHTML: [
                function () {
                    return ''
                },
                function () {
                    return ''
                }
            ]
        }
    }
            }
    var chart = new ApexCharts(
        document.querySelector("#account-chart"),
        options
    );
    chart.render();
    }) ();
</script> --}}
@endpush
