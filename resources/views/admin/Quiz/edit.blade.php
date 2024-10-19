@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.quiz.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Question')</label>
                                    <input type="text" name="question" id="name" class="form-control"
                                        placeholder="@lang('Question')" value="{{ $quiz->question }}" required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 1')</label>
                                    <input step="any" type="text" name="option1" id="price"
                                         class="form-control" placeholder="@lang('Option 1')"
                                        value="{{ $quiz->option1 }}" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 2')</label>
                                    <input step="any" type="text" name="option2" id="price"
                                    value="{{ $quiz->option2 }}"  class="form-control" placeholder="@lang('Option 2')"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 3')</label>
                                    <input step="any" type="text" name="option3" id="price"class="form-control" placeholder="@lang('Option 3')" value="{{ $quiz->option3 }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Option 4')</label>
                                    <input step="any" type="text" name="option4" id="price" class="form-control" placeholder="@lang('Option 4')" value="{{ $quiz->option4 }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Correct Answer')</label>
                                    <input step="any" type="text" name="correct_answer" id="price" class="form-control"
                                        placeholder="@lang('Correct Answer')" value="{{ $quiz->correct_answer }}" required>
                                </div>
                            </div>
                            <div class="row text-end">
                                <div class="col-lg-12 ">
                                    <div class="form-group float-end p-3">
                                        <button type="submit" class="btn btn--primary btn-block btn-lg">
                                            @lang('Update')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.plan.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush

    @push('script')
        <script>
            (function($) {

                "use strict";

                var fileAdded = 0;
                $('.addPlanContent').on('click', function() {

                    $("#planContent").append(`
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                             <input type="text" name="contents[]" id="content" value="{{ old('contents.0') }}" class="form-control" placeholder="@lang('Content')">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn--danger text--white planContentDelete w-100"><i class="la la-times ms-0"></i></button>
                        </div>
                    </div>
                `)
                });

                $(document).on('click', '.planContentDelete', function() {
                    fileAdded--;
                    $(this).closest('.row').remove();
                });

                // Remove content field
                $(document).on('click', '.removePlanContent', function() {
                    $(this).closest('.content-field').remove();
                });

            })(jQuery);
        </script>
    @endpush
