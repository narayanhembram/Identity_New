@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.entrance.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $edit->id }}">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Module')</label>
                                    <select name="module_id" class="form-control" required>
                                        <option value="">Select Module</option>
                                        @foreach ($modules as $module)
                                            <option {{ $edit->module_id == $module->id ? 'selected' : '' }}
                                                value="{{ $module->id }}"> {{ $module->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Category')</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $edit->category_id == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Subcategory')</label>
                                    <select name="subcategory_id" id="getSubcatagory" class="form-control" required>
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="selectedSubcategoryId" value="{{ $edit->subcategory_id }}">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Exam Name')</label>
                                    <input type="text" name="exam_name" value="{{ $edit->exam_name }}"
                                        class="form-control" placeholder="@lang('Exam Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Issue Date')</label>
                                    <input type="text" name="issue_date" class="form-control"
                                        value=" {{ $edit->issue_date }} " placeholder="@lang('Issue Date')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="last_date" class="font-weight-bold">@lang('Last Date')</label>
                                    <input type="text" name="last_date" class="form-control"
                                        value=" {{ $edit->last_date }} " placeholder="@lang('Last Date')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('URL')</label>
                                    <input type="text" name="url" value="{{ $edit->url }}" class="form-control"
                                        placeholder="@lang('URL')" required>
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.entrance.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadSubcategories(category_id, selectedSubcategoryId = null) {
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.subcategory.getSubcategory') }}',
                    data: {
                        'category_id': category_id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#getSubcatagory').empty();
                        $('#getSubcatagory').html('<option value="">Select Subcategory</option>');
                        $.each(response, function(key, value) {
                            var isSelected = (value.id == selectedSubcategoryId) ? 'selected' :
                                '';
                            $('#getSubcatagory').append('<option value="' + value.id + '" ' +
                                isSelected + '>' + value.title + '</option>');
                        });
                    },
                });
            }

            var selectedSubcategoryId = $('#selectedSubcategoryId').val();

            if ($('#category').val()) {
                loadSubcategories($('#category').val(), selectedSubcategoryId);
            }

            $(document).on('change', '#category', function() {
                var category_id = $(this).val();
                loadSubcategories(category_id);
            });
        });
    </script>
