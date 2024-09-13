<style>
    .radio-group {
        display: flex;
        align-items: center;
    }

    .radio-group input[type="radio"] {
        margin-right: 5px;
    }

    .radio-group label {
        margin-right: 15px;
    }
</style>
@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.module.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Name')</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="@lang('Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('email')</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        placeholder="@lang('email')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Phone Number')</label>
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control"
                                        placeholder="@lang('Phone Number')" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Education')</label>
                                    <input type="text" name="education" value="{{ old('education') }}"
                                        class="form-control" placeholder="@lang('Education')" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Experience')</label>
                                    <input type="text" name="experience" value="{{ old('experience') }}"
                                        class="form-control" placeholder="@lang('Experience')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Specialization')</label>
                                    <input type="text" name="specialization" value="{{ old('specialization') }}"
                                        class="form-control" placeholder="@lang('Specialization')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Permanent address')</label>
                                    <input type="text" name="permanent_address" value="{{ old('permanent_address') }}"
                                        class="form-control" placeholder="@lang('Permanent Address')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Permanent address')</label>
                                    <input type="text" name="current_address" value="{{ old('current_address') }}"
                                        class="form-control" placeholder="@lang('Current Address')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Father Name')</label>
                                    <input type="text" name="father_name" value="{{ old('father_name') }}"
                                        class="form-control" placeholder="@lang('Father Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Mother Name')</label>
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                                        class="form-control" placeholder="@lang('Mother Name')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Date of Birth')</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}"
                                        class="form-control" placeholder="@lang('D.O.B')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Select Gender')</label>
                                    <div class="radio-group">
                                        <input type="radio" id="male" name="gender" value="male">
                                        <label for="male">Male</label>

                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Female</label>

                                        <input type="radio" id="other" name="gender" value="other">
                                        <label for="other">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Nationality')</label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}"
                                        class="form-control" placeholder="@lang('Indian')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Religion')</label>
                                    <input type="text" name="religion" value="{{ old('religion') }}"
                                        class="form-control" placeholder="@lang('e.g. Hindu')" required>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Religion')</label>
                                    <input type="text" name="religion" value="{{ old('religion') }}"
                                        class="form-control" placeholder="@lang('e.g. Hindu')" required>
                                </div>
                            </div>Certificate upload --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Joining Date')</label>
                                    <input type="date" name="joining_date" value="{{ old('joining_date') }}"
                                        class="form-control" placeholder="@lang('Joining Date')" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Emergency Contact')</label>
                                    <input type="number" name="emergency_contact" value="{{ old('emergency_contact') }}"
                                        class="form-control" placeholder="@lang('Emergency Contact')" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('status')</label>
                                    <input type="text" name="status" value="{{ old('status') }}"
                                        class="form-control" placeholder="@lang('status')" required>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="position" class="font-weight-bold">@lang('POSITION')</label>
                                    <input type="number" name="position" value="{{ old('position') }}" class="form-control"
                                        placeholder="@lang('POSITION')" required>
                                        @error('position')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror --}}
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
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.module.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush
