@extends($activeTemplate . 'layouts.master')


@section('content')
<div class="card">
    <div class="card-header">
        <h4>Quiz List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table datatable-save-state">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($quiz_list as $quiz)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td><a>{{ $quiz->title }}</a></td>
                            <td>{{ $quiz->duration }} minutes</td>
                            <td><a href="{{ route('user.join.quiz', $quiz->id) }}">Give Test</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
