@extends($activeTemplate . 'layouts.frontend')

@section('content')
<section class="carrerlibrary">
    <div class="card">
        <div class="row justify-content-center align-items-center">
            @foreach ($carrers as $carrerlibrary)
            <div class="col-md-6 text-center">
                <img src="{{ asset('category/' . $carrerlibrary->file) }}" class="category-image" style="height: 200px; width:200px; border-radius:50%;">
                <a href="{{ route('viewCarrerLibrary', $carrerlibrary->id) }}"><h5>{{$carrerlibrary->title}}</h5></a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
