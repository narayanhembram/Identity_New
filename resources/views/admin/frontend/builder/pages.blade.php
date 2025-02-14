@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-6">
            <div class="card b-radius--10 ">
                <div class="card-header text-right">
                    @lang('Main Pages') <button type="button" class="btn btn-sm btn--primary addBtn"><i
                            class="las la-plus"></i>@lang('Add
                                                                                                                                    New')</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Slug')</th>
                                    <th>@lang('Parent Menu')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pdata as $k => $data)
                                    <tr>
                                        <td>{{ __($data->name) }}</td>
                                        <td>{{ __($data->slug) }}</td>
                                        <td>
                                            @if ($data->getMenu)
                                                {{ __($data->getMenu->name) }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="button--group">
                                                <a title="@lang('Edit')"
                                                    href="{{ route('admin.frontend.manage.section', $data->id) }}"
                                                    class="btn btn-sm btn--primary"><i class="la la-pen"></i>
                                                </a>
                                                @if ($data->is_default == 0)
                                                    <button title="@lang('Delete')"
                                                        class="btn btn-sm btn--danger confirmationBtn"
                                                        data-action="{{ route('admin.frontend.manage.pages.delete', $data->id) }}"
                                                        data-question="@lang('Are you sure to remove this page?')">
                                                        <i class="las la-trash"></i>
                                                    </button>
                                                @endif
                                            </div>
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
            </div><!-- card end -->
        </div>
        <div class="col-lg-6">
            <div class="card b-radius--10 ">
                <div class="card-header text-right">
                    @lang('Policy Pages') <a href="{{ route('admin.frontend.sections.element', $key) }}"
                        class="btn btn-sm btn--primary"><i class="las la-plus"></i>@lang('Add New')</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    @if (@$section->element->images)
                                        <th>@lang('Image')</th>
                                    @endif
                                    @foreach ($section->element as $k => $type)
                                        @if ($k != 'modal')
                                            @if ($type == 'text' || $type == 'icon')
                                                <th>{{ __(keyToTitle($k)) }}</th>
                                            @elseif($k == 'select')
                                                <th>{{ keyToTitle(@$section->element->$k->name) }}</th>
                                            @endif
                                        @endif
                                    @endforeach
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <tr>
                                    <td>1</td>
                                    <td>@lang('Cookie Policy')</td>
                                    <td><a title="@lang('Edit')" href="{{ route('admin.setting.cookie') }}"
                                            class="btn btn-sm btn--primary"><i class="la la-pencil-alt"></i>
                                        </a></td>
                                </tr>
                                @forelse($elements as $data)
                                    <tr>
                                        <td>{{ $loop->iteration + 1 }}</td>
                                        @if (@$section->element->images)
                                            @php $firstKey = collect($section->element->images)->keys()[0]; @endphp
                                            <td>
                                                <div class="customer-details d-block">
                                                    <a href="javascript:void(0)" class="thumb">
                                                        <img src="{{ getImage('assets/images/frontend/' . $key . '/' . @$data->data_values->$firstKey, @$section->element->images->$firstKey->size) }}"
                                                            alt="@lang('image')">
                                                    </a>
                                                </div>
                                            </td>
                                        @endif
                                        @foreach ($section->element as $k => $type)
                                            @if ($k != 'modal')
                                                @if ($type == 'text' || $type == 'icon')
                                                    @if ($type == 'icon')
                                                        <td>@php echo @$data->data_values->$k; @endphp</td>
                                                    @else
                                                        <td>{{ __(@$data->data_values->$k) }}</td>
                                                    @endif
                                                @elseif($k == 'select')
                                                    @php
                                                        $dataVal = @$section->element->$k->name;
                                                    @endphp
                                                    <td>{{ @$data->data_values->$dataVal }}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>
                                            <div class="button--group">
                                                @if ($section->element->modal)
                                                    @php
                                                        $images = [];
                                                        if (@$section->element->images) {
                                                            foreach ($section->element->images as $imgKey => $imgs) {
                                                                $images[] = getImage(
                                                                    'assets/images/frontend/' .
                                                                        $key .
                                                                        '/' .
                                                                        @$data->data_values->$imgKey,
                                                                    @$section->element->images->$imgKey->size,
                                                                );
                                                            }
                                                        }
                                                    @endphp
                                                    <button title="@lang('Edit')"
                                                        class="btn btn-sm btn--primary updateBtn"
                                                        data-id="{{ $data->id }}"
                                                        data-all="{{ json_encode($data->data_values) }}"
                                                        @if (@$section->element->images) data-images="{{ json_encode($images) }}" @endif>
                                                        <i class="la la-pencil-alt"></i>
                                                    </button>
                                                @else
                                                    <a title="@lang('Edit')"
                                                        href="{{ route('admin.frontend.sections.element', [$key, $data->id]) }}"
                                                        class="btn btn-sm btn--primary"><i class="la la-pencil-alt"></i>
                                                    </a>
                                                @endif
                                                <button title="@lang('Remove')"
                                                    class="btn btn-sm btn--danger confirmationBtn"
                                                    data-action="{{ route('admin.frontend.remove', $data->id) }}"
                                                    data-question="@lang('Are you sure to remove this item?')"><i class="la la-trash"></i></button>
                                            </div>
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
            </div><!-- card end -->
        </div>
    </div>

    {{-- Add METHOD MODAL --}}
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Add New Page')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="{{ route('admin.frontend.manage.pages.save') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label> @lang('Page Name')</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label> @lang('Slug')</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" required>
                        </div>

                        <div class="form-group">
                            <label> @lang('Choose Parent Menu')</label>
                            <select name="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-confirmation-modal></x-confirmation-modal>
@endsection

@push('breadcrumb-plugins')
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            $('.addBtn').on('click', function() {
                var modal = $('#addModal');
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush
