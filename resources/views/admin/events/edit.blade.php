@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.event.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $edit->id }}">
                                    <label for="price" class="font-weight-bold">@lang('Events Title')</label>
                                    <select class="form-control" name="title_id">
                                        <option value="">Choose Events Title</option>
                                        @foreach ($event_titles as $title)
                                            <option value="{{ $title->id }}" {{ ($title->id == $edit->title_id)? 'selected' : '' }}>{{ $title->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                        placeholder="@lang('Image')">
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang('Create')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.module.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush
