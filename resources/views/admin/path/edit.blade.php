@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.path.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{$edit->id}}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Module')</label>
                                    <select name="module_id" class="form-control" required>
                                        <option value="">Select Module</option>
                                        @foreach ($modules as $module)
                                            <option {{($edit->module_id == $module->id)? 'selected': ''}} value="{{ $module->id }}"> {{ $module->title }} </option>
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
                                            <option {{($edit->category_id == $category->id)? 'selected': ''}} value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Subcategory')</label>
                                    <select name="subcategory_id" id="getSubcatagory" class="form-control" required>
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                        <option {{ ($edit->subcategory_id == $subcategory->id) ? 'selected': '' }} value="{{$subcategory->id}}"> {{ $subcategory->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pathtype_id" class="font-weight-bold">@lang('Select Path')</label>
                                    <select name="pathtype_id" class="form-control" required>
                                        <option value="">Select Path</option>
                                        @foreach ($pathtypes as $pathtype)
                                            <option {{($edit->pathtype_id ==$pathtype->id)? 'selected': '' }} value=" {{ $pathtype->id }} "> {{ $pathtype->title }} </option>
                                        @endforeach
                                    </select>
                                    @error('pathtype_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="stream" class="font-weight-bold">@lang('Stream')</label>
                                    <input type="text" name="stream" value="{{ $edit->stream }}" class="form-control"
                                        placeholder="@lang('Stream')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="graduation" class="font-weight-bold">@lang('Graduation')</label>
                                    <input type="text" name="graduation" value="{{ $edit->graduation }}"
                                        class="form-control" placeholder="@lang('Graduation')" >
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="after_graduation" class="font-weight-bold">@lang('After Graduation')</label>
                                    <input type="text" name="after_graduation" value="{{ $edit->after_graduation }}"
                                        class="form-control" placeholder="@lang('After Graduation')" >
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="after_pgraduation" class="font-weight-bold">@lang('After Post Graduation')</label>
                                    <input type="text" name="after_pgraduation" value="{{ $edit->after_pgraduation }}"
                                        class="form-control" placeholder="@lang('After Post Graduation')" >
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="anyother" class="font-weight-bold">@lang('Any Other')</label>
                                    <input type="text" name="anyother" value="{{ $edit->anyother }}" class="form-control"
                                        placeholder="@lang('Any Other')" >
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="form-group float-end p-3">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Create')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('breadcrumb-plugins')
        <a href="{{ route('admin.path.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="las la-angle-double-left"></i>@lang('Go Back')</a>
    @endpush

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#category', function() {
                var category_id = $(this).val();
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
                        $('#getSubcatagory').html(
                            '<option value="">Select Subcategory</option>');
                        $.each(response, function(key, value) {
                            $('#getSubcatagory').append('<option value="' + value.id +
                                '">' + value.title + '</option>');
                        });
                    },
                });
            });
        });
    </script>
