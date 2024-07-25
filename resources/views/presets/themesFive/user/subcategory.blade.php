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
            @foreach ($subcategories as $subcategory)

            <div class="col-lg-4 col-md-6">
                <div class="card" style="padding-left: 10px; padding-right: 10px">
                    <div class="mt-3" style="height: 200px">
                        <img src="{{asset('subcategory/'. $subcategory->file)}}">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"> {{ $subcategory->title }} </h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    </div>
@endsection
