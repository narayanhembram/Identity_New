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

@endpush
