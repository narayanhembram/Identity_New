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
            <div style="text-align: center">
                <h3>Your Career Library</h3>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="card category-card" style="text-align:center; height:320px; overflow:hidden">
                            <a href=" {{ route('user.subcategory', $category->id) }} ">
                                <div class="mt-3">
                                    <img src="{{ asset('category/' . $category->file) }}" class="category-image"
                                        style="height: 200px; width:190px">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"> {{ $category->title }} </h5>
                                    <p>({{ $category->subcategories_count }} Career Options)</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
