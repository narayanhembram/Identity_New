@extends($activeTemplate.'layouts.master')
@section('content')
<div class="body-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="body-area">
                <h5>@lang('Paystack')</h5>
                <form action="{{ route('ipn.'.$deposit->gateway->alias) }}" method="POST">
                    @csrf
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            @lang('You have to pay '):
                            <strong>{{showAmount($deposit->final_amo)}} {{__($deposit->method_currency)}}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            @lang('You will get '):
                            <strong>{{showAmount($deposit->amount)}}  {{__($general->cur_text)}}</strong>
                        </li>
                    </ul>
                    <button type="button" class="btn--base  mt-3" id="btn-confirm">@lang('Pay Now')</button>
                    <script
                        src="//js.paystack.co/v1/inline.js"
                        data-key="{{ $data->key }}"
                        data-email="{{ $data->email }}"
                        data-amount="{{ round($data->amount) }}"
                        data-currency="{{$data->currency}}"
                        data-ref="{{ $data->ref }}"
                        data-custom-button="btn-confirm"
                    >
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
