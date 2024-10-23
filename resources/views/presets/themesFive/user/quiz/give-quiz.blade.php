@extends($activeTemplate . 'layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> Do not refresh the page or navigate away, your progress will be lost.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="media mb-0">
                        <div class="media-body col-lg-4">
                            <h4 class="font-weight-semibold mb-0 ">
                                Quiz Title: {{ $quiz->title }}
                            </h4>
                        </div>
                        <div class="media-body col-lg-4">
                            <h4 class="font-weight-semibold mb-0 text-center">
                                Timer: <div id="timer_style"><label id="minutes">00</label>:<label
                                        id="seconds">00</label>
                                </div>
                            </h4>
                        </div>
                        <div class="media-body col-lg-4">
                            <h5 class="font-weight-semibold mb-0 text-right">
                                Exam Time: {{ $quiz->duration }} Minutes
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store.answer') }}">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" readonly required>
                            <input id="start_time" type="hidden" name="start_time" value="{{ $start_time }}" readonly
                                required>

                            <div class="tab-content">
                                @php $i = 0; @endphp
                                @foreach ($questions as $question)
                                    <div class="tab-pane fade @if ($i === 0) show active @endif"
                                        id="question{{ $i }}" role="tabpanel">
                                        <div id="question">
                                            <h5 style="text-align:left;">Question {{ $i + 1 }} :
                                                {{ $question->question }}</h5>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_a" required>
                                                        <label class="form-check-label">{{ $question->option_a }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_b" required>
                                                        <label class="form-check-label">{{ $question->option_b }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_c" required>
                                                        <label class="form-check-label">{{ $question->option_c }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="answer[{{ $i + 1 }}]" value="option_d" required>
                                                        <label class="form-check-label">{{ $question->option_d }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>

                            <div class="quiz-navigation mt-3" style="text-align: center;">
                                <button type="button" class="btn btn-secondary prev-question"
                                    style="float: left;">Previous</button>
                                <button type="button" class="btn btn-primary next-question"
                                    style="float: right;">Next</button>
                                <button type="submit" class="btn btn-success submit-quiz"
                                    style="margin: 0 auto;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Questions ({{ count($questions) }})</h5>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist"
                            style="max-height: 130px; overflow-y: auto;">
                            @php $i = 0; @endphp
                            @foreach ($questions as $key => $question)
                                <li class="nav-item">
                                    <a class="nav-link @if ($key === 0) active @endif"
                                        id="pills-question{{ $i }}-tab" data-toggle="pill"
                                        href="#question{{ $i }}" role="tab"
                                        style="padding: 6px 11px;">{{ $key + 1 }}</a>
                                </li>

                                @php $i++; @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime() {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds % 60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
        }

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        function myFunction() {
            window.setTime = null;
            window.pad = null;
            document.getElementById('timer_style').innerHTML = "Time is Up!";
            document.getElementById('timer_style').style.color = 'red'
        }
        window.setTimeout(myFunction, {{ $quiz->duration * 60 * 1000 }});
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var totalQuestions = {{ count($questions) }};
            var currentQuestion = 0;

            function showQuestion(index) {
                $('.tab-pane').removeClass('show active');
                $('#question' + index).addClass('show active');
                $('.nav-link').removeClass('active');
                $('#pills-question' + index + '-tab').addClass('active');
            }

            $('.next-question').click(function() {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    showQuestion(currentQuestion);
                }
            });

            $('.prev-question').click(function() {
                if (currentQuestion > 0) {
                    currentQuestion--;
                    showQuestion(currentQuestion);
                }
            });

            $('.nav-link').click(function() {
                var index = $(this).parent().index();
                currentQuestion = index;
            });
        });
    </script>
@endsection
