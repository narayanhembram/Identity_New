@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Question')</th>
                                    <th>@lang('Option 1')</th>
                                    <th>@lang('Option 2')</th>
                                    <th>@lang('Option 3')</th>
                                    <th>@lang('Option 4')</th>
                                    <th>@lang('Correct Answer')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quiz as $quizs)
                                    <tr>
                                        <td>{{ $quizs->question }}</td>
                                        <td>{{ $quizs->option1 }}</td>
                                        <td>{{ $quizs->option2 }}</td>
                                        <td>{{ $quizs->option3 }}</td>
                                        <td>{{ $quizs->option4 }}</td>
                                        <td>{{ $quizs->correct_answer }}</td>


                                        <td>
                                            <a href="{{ route('admin.quiz.edit', $quizs->id) }}" title="@lang('Edit')"
                                                data-id="{{ $quizs->id }}" class="btn btn-sm btn--primary ">
                                                <i class="las la-edit"></i>
                                            </a>
                                            <button title="@lang('Remove')" data-id="{{ $quizs->id }}"
                                                class="btn btn-sm btn--danger rejectBtn">
                                                <i class="las la-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                {{-- @if ($quiz->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($quiz) }}
                    </div>
                @endif --}}
            </div><!-- card end -->
        </div>
    </div>


    {{-- delete modal --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Plan Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.quiz.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="fw-bold">@lang('delete')</span> <span
                                class="fw-bold withdraw-amount text-success"></span> @lang('this plan') <span
                                class="fw-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--danger btn-global">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.quiz.add') }}" class="btn btn-sm btn--primary ">
        @lang('Add Question')</a>
@endpush

@push('script')
    <script>
        $('.rejectBtn').on('click', function() {
            var modal = $('#rejectModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.modal('show');
        });
    </script>
@endpush
