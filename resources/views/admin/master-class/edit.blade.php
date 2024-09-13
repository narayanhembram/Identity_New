@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.Masterclass.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Category')</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($catagories as $category)
                                            <option value="{{ $category->id }}" {{($edit->category_id==$category->id )? 'selected': ''}}> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="subcategory_id" class="font-weight-bold">@lang('Select Subcategory')</label>
                                    <select name="subcategory_id" id="getSubcatagory" class="form-control" required>
                                        <option value="">Select Subcategory</option>
                                        @foreach ($sub_catagories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{($edit->subcategory_id==$subcategory->id )? 'selected': ''}}> {{ $subcategory->title }} </option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">@lang('MasterClass Title')</label>
                                    <input type="text" name="title" value="{{ old('title',$edit->title) }}" class="form-control"
                                        placeholder="@lang('Enter Title')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="anyother" class="font-weight-bold">@lang('Video Link')</label>
                                    <input type="text" name="link" value="{{ old('link',$edit->link) }}" class="form-control"
                                        placeholder="@lang('Enter Link')">
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
        <a href="{{ route('admin.Masterclass.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
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
