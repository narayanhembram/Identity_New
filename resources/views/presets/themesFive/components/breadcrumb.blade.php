
<!-- ==================== Breadcumb Start ==================== -->
<section class="breadcumb pt-5">
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <div class="content">
                <h2>{{__($pageTitle)}}</h2>
                <p>
                    <a href="{{route('home')}}">@lang('Home')</a> /
                    <span><a href="{{ URL::current() }}" class="text--base">{{__($pageTitle)}}</a></span>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Breadcumb End ==================== -->
