@extends($activeTemplate . 'layouts.master')
<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px #000000;
    }

    .custom-container {
        max-width: 1400px;
        /* Set a wider max-width */
        margin: 0 auto;
        /* Center the container */
        padding-left: 150px;
        padding-right: 150px;
    }

    .body-wrapper {
        padding-left: 0px;
        padding-right: 0px !important;
        transition: all 0.5s;
    }

</style>
@section('content')
    <section class="home-profile mt-5 mb-5" style="background-color: #32323233; padding-top: 23px;">
        <div class="body-wrapper">
            <div class="custom-container"> <!-- Custom container without Bootstrap -->
                <div class="row">
                    {{-- @foreach ($modules as $module) --}}
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-hover"
                            style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="mt-3">
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . @$user->image, getFileSize('userProfile')) }}"
                                    style="height: 170px; width: 170px; object-fit: cover; border-radius: 50%;"
                                    alt="Career Library Image">
                            </div>
                            <div class="card-body text-center">
                                <p>welcome</p>
                                <h5 class="card-title mb-3"> {{ $user->username }} </h5>
                                <a href="" class="btn btn-warning">Upgrade<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 mb-4">
                        <div class="card card-hover"
                            style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="mt-3">
                                <img src="{{ asset('assets/images/user/default_interest_graph.jpg') }}"
                                    style="height: 230px; width: 100%; object-fit: cover;" alt="Career Library Image">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title mb-3"> </h5>
                                <a href="" class="btn btn-warning">Start Assesment<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>

    </section>

    {{-- <div class="body-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach ($modules as $module)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card card-hover" style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="mt-3">
                        <img src="{{asset('Modules/'. $module->image)}}" style="height: 200px; width: 100%; object-fit: cover;" alt="Career Library Image">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3"> {{ $module->title }} </h5>
                        <a href="{{ $module->url }}" class="btn btn-warning">{{ $module->btn_text }} <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
    <section class="home mt-5">
        <div class="">
            <div class="custom-container mt-5 mb-5"> <!-- Custom container without Bootstrap -->
                <div class="row">
                    @foreach ($modules as $module)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card card-hover"
                                style="text-align:center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <div class="mt-3">
                                    <img src="{{ asset('Modules/' . $module->image) }}"
                                        style="height: 200px; width: 100%; object-fit: cover;" alt="Career Library Image">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-3"> {{ $module->title }} </h6>
                                    <a href="{{ $module->url }}" class="btn btn-warning" style="font-size: small;">{{ $module->btn_text }} <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('presets.themesFive.components.footer')
@endsection

@push('script')
@endpush
