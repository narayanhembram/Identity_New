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
        display: flex;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .path-step {
        padding: 15px;
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

<style>
    .exam-card {
        display: flex;
        align-items: center;
        background-color: #f9f9f9;
        padding: 10px;
        margin: 10px 0;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

    .exam-info {
        display: flex;
        align-items: center;
        flex-grow: 1;
    }

    .exam-label {
        font-size: 12px;
    }

    .exam-name,
    .form-issue-date,
    .last-date {
        flex-basis: 30%;
        flex-shrink: 0;
        font-size: 14px;
        margin-right: 20px;
    }

    .exam-dates {
        display: flex;
        align-items: center;
    }

    .exam-dates div {
        font-size: 14px;
        margin-right: 20px;
    }

    .arrow {
        width: 34px;
        height: 34px;
        background-color: #f1f1f1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .arrow::after {
        content: '➔';
        font-size: 25px;
        color: #555;
    }
</style>

<style>
    .card {
        padding: 15px 15px 15px 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #fff;
    }

    .card .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card .card-head .status-1 {
        text-align: left;
        font-size: .75rem;
    }

    .card .card-head .status-2 i {
        text-align: right;
        font-size: 1.5rem;
    }

    .card .card-head .circle {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #0fbf61;
        border-radius: 100px;
    }

    .card .card-title {
        text-align: center;
        font-weight: bold;
    }

    .card .card-title i {
        font-size: 35px;
    }

    .card .card-info .label {
        font-size: .75rem;
    }

    .card .card-info .value {
        font-size: .75rem;
        font-weight: bold;
    }

    .card .card-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<style>
    .modal-lg {
        max-width: 80%;
        /* Adjust the width as needed */
    }

    .close-icon {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        outline: none;
        padding: 0;
        margin: 0;
    }

    .close-icon i {
        font-size: 2rem;
        /* Increase size if needed */
        color: #000 !important;
    }
</style>

<style>
    .scholarship-item {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: .25rem;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .scholarship-title {
        font-weight: bold;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .explore-link {
        color: #007bff;
    }
</style>

@section('content')
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div class="mt-5">
                <div>
                    <div class="mt-3 mb-3">
                        <div style="background-color: #fff; padding:10px; border-radius:10px;">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Scholarship Type :</label>
                                    <select id="type-select" class="form-select">
                                        <option value="">Choose Scholarship Type</option>
                                        <option value="Central">Central</option>
                                        <option value="State">State</option>
                                        <option value="Private">Private</option>
                                        <option value="PSU">PSU</option>
                                    </select>
                                </div>

                                <div class="col-md-6 get_class">
                                    <label for="class" class="form-label">Class :</label>
                                    <select id="class-select" class="form-select">
                                        <option value="">Select Class</option>
                                        <option value="1st-5th">1st-5th</option>
                                        <option value="6th-8th">6th-8th</option>
                                        <option value="11th-12th">11th-12th</option>
                                        <option value="Under Graduate">Under Graduate</option>
                                        <option value="Post Graduate">Post Graduate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h5>Scholarships</h5>
                        <div id="scholarshiplist">
                            @foreach ($scholarship as $data)
                                <div class="scholarship-item">
                                    <div class="scholarship-title">
                                        {{ $data->name }}
                                    </div>
                                    <div class="mt-3">
                                        Explore: <a href="{{ $data->url }}" target="_blank" class="explore-link">Visit
                                            Now</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                $('.get_class').hide();
                $('#type-select').change(function() {
                    var selectedType = $(this).val();
                    if (selectedType === 'State') {
                        $('.get_class').show();
                    } else {
                        $('.get_class').hide();
                    }
                });

                $(document).on('change', '#type-select', function() {
                    var type = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.scholarship.getType') }}",
                        data: {
                            'type': type,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#scholarshiplist').empty();
                            if (response.length === 0) {
                                $('#scholarshiplist').append(
                                    '<div class="col-12 text-center mt-5"><h6>No scholarships are available in this selected type.</h6></div>'
                                );
                            } else {
                                $.each(response, function(key, scholarship) {
                                    var scholarshipCard =
                                        '<div class="scholarship-item">' +
                                        '<div class="scholarship-title">' +
                                        scholarship.name +
                                        '</div>' +
                                        '<div class="mt-3">' +
                                        'Explore: <a href="' + scholarship.url +
                                        '" target="_blank" class="explore-link">Visit Now</a>' +
                                        '</div>' +
                                        '</div>';
                                    $('#scholarshiplist').append(scholarshipCard);
                                });
                            }

                            $('.pagination').hide();
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: " + status + error);
                        }
                    });
                });

                $(document).on('change', '#class-select', function() {
                    var classes = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.scholarship.getClass') }}",
                        data: {
                            'classes': classes,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#scholarshiplist').empty();
                            if (response.length === 0) {
                                $('#scholarshiplist').append(
                                    '<div class="col-12 text-center mt-5"><h6>No scholarships are available in this selected type.</h6></div>'
                                );
                            } else {
                                $.each(response, function(key, scholarship) {
                                    var scholarshipCard =
                                        '<div class="scholarship-item">' +
                                        '<div class="scholarship-title">' +
                                        scholarship.name +
                                        '</div>' +
                                        '<div class="mt-3">' +
                                        'Explore: <a href="' + scholarship.url +
                                        '" target="_blank" class="explore-link">Visit Now</a>' +
                                        '</div>' +
                                        '</div>';
                                    $('#scholarshiplist').append(scholarshipCard);
                                });
                            }

                            $('.pagination').hide();
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: " + status + error);
                        }
                    });
                });
            });
        </script>
