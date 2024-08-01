@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="body-wrapper">

        <div class="container mt-5 mb-5">
            <div class="row">
                @foreach ($modules as $module)

                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card" style="text-align:center">
                        <div class="mt-3">
                            <img src="{{asset('Modules/'. $module->image)}}" style="height: 200px" alt="Career Library Image">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3"> {{ $module->title }} </h5>
                            <a href="{{route('user.category')}}" class="btn btn-warning">{{ $module->btn_text }} <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                @endforeach
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
