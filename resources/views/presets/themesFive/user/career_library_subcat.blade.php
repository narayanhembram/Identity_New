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

@section('content')
    <div class="body-wrapper">
        <div class="container mt-5 mb-5">
            <div class="row">
                @foreach ($subcategories as $subcategory)
                    <div class="col-lg-3 col-md-6">
                        <div class="card category-card" style="text-align:center; height:280px; overflow:hidden">
                            <a href=" {{ route('user.subcategory', $subcategory->id) }} ">
                                <div class="mt-3">
                                    <img src="{{ asset('subcategory/' . $subcategory->file) }}" class="category-image"
                                        style="height: 200px; width:190px">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"> {{ $subcategory->title }} </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
