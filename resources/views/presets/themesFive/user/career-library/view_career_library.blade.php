@extends($activeTemplate . 'layouts.master')

<style>
    .category-card {
        transition: transform 0.3s, border-color 0.3s;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: scale(1.05);
        border-color: hsl(var(--base));
    }
</style>

<style>
    .path-box {
        max-width: 100vh;
        display: flex;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .path-step {
        padding: 15px;
        /* flex: 1; */
        position: relative;
        background-color: #e6e9ef;
    }

    .path-step:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .path-step:nth-of-type(even) {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        background-color: #4558d1;
        color: #fff !important;
    }
</style>

@section('content')
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="row pt-4 pb-4" style="background-color: rgba(33, 113, 138, .89); border-radius:8px; color:#fff">
                <div class="col-md-8">
                    <div class="summary">
                        <h3 style="color: #f8be14"> {{ $viewSubcategory->title }} </h3>
                        <h5 class="summary mb-4" style="color:#fff">Summary</h5>
                        <p style="color:#fff"> {{ $viewSubcategory->description }} </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="opportunity-meter mt-5">
                        <img src=" {{ asset('subcategory/' . $viewSubcategory->file) }} " style="border-radius: 5px">
                    </div>
                </div>
            </div>

            <div>
                <div class="mt-5">
                    <h5>Path : 1</h5>
                </div>
                <div class="path-box">

                    <div class="path-step">
                        <strong>Stream :</strong>
                        <p> XII in any stream</p>
                    </div>
                    <div class="path-step">
                        <strong>Graduation :</strong>
                        <p>Diploma in sound engineering</p>
                    </div>
                </div>

                <div>
                    <h5>Path : 2</h5>
                </div>
                <div class="path-box">
                    <div class="path-step">
                        <strong>Stream :</strong>
                        <p>XII in any stream</p>
                    </div>
                    <div class="path-step">
                        <strong>Graduation :</strong>
                        <p>Certificate in creative arts digital sound</p>
                    </div>
                    <div class="path-step">
                        <strong>After Graduation :</strong>
                        <p>Certificate in audio technology</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
