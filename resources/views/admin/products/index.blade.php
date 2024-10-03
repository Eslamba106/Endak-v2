@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('products.products') }}
@endsection

@section('page_name')
    {{ __('products.products') }}
@endsection
@section('content')
    <?php $lang = config('app.locale'); ?>
    <form action="" method="get">

        <div class="col-md-12 ">
            <div class="input-group mb-3 d-flex justify-content-end">
                {{-- <div class="remv_control mr-2">
                    <select name="status" class="mr-3 mt-3 form-control remv_focus">
                        <option value="">{{__('products.set_status')}}</option>
                        <option value="1" {{selected('1', request('status'))}}>{{__('products.active')}}</option>
                        <option value="4" {{selected('4', request('status'))}}>{{__('products.inactive')}}</option>
                    </select>
                </div> --}}

                <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-3 mr-2" data-toggle="tooltip"
                    title="@lang('general.add')"> <i class="la la-plus"></i> </a>

                {{-- <a href="{{route('admin.departments.create')}}" class=" ml-1 mb-2 btn btn-primary btn-xl" data-toggle="tooltip" title="@lang('general.add')"> <i class="la la-plus"></i> </a> --}}

                {{-- <button type="submit" name="bulk_action_btn" value="update_status" class="btn btn-primary mt-3 mr-2">
                    <i class="la la-refresh"></i> {{__('general.update')}}
                </button> --}}

                <button type="submit" name="bulk_action_btn" value="delete" class="btn btn-danger delete_confirm mt-3 mr-2">
                    <i class="la la-trash"></i> {{ __('general.delete') }}</button>
            </div>
        </div>

        <div class="col-sm-12">
            @if ($products->count())
                <div class="cls_table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input class="bulk_check_all" type="checkbox" /></th>
                                <th>@lang('department.name_ar')</th>
                                <th>@lang('department.name_en')</th>
                                <th>@lang('department.description_ar')</th>
                                <th>@lang('department.description_en')</th>
                                <th>{{ __('department.image') }}</th>
                                <th>@lang('general.actions')</th>
                            </tr>
                        </thead>

                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <label>
                                        <input class="check_bulk_item" name="bulk_ids[]" type="checkbox"
                                            value="{{ $product->id }}" />
                                        <span class="text-muted">#{{ $product->id }}</span>
                                    </label>
                                </td>
                                <td>{{ $product->name_ar }} </td>
                                <td>{{ $product->name_en }} </td>
                                <td>{{ $product->description_ar }} </td>
                                <td>{{ $product->description_en }} </td>
                                <td> <img src="{{ $product->image_url }}" alt="" width="200px" height="150px" />
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.show', $product->slug) }}" class="btn btn-purple"><i
                                            class="la la-eye" title="@lang('general.show')"></i> </a>
                                    <a href="{{ route('admin.products.edit', $product->slug) }}"
                                        class="btn btn-primary btn-sm"><i class="la la-pencil"></i> </a>
                                    <a href="{{ route('admin.products.delete', $product->slug) }}"
                                        class="btn btn-danger btn-sm" title="@lang('general.delete')"><i
                                            class="la la-trash-o"></i> </a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                {!! no_data() !!}
            @endif

            {!! $products->links() !!}

        </div>
    </form>

    @if (Session::has('success'))
        <script>
            swal("Message", "{{ Session::get('success') }}", 'success', {
                button: true,
                button: "Ok",
                timer: 3000,
            })
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            swal("Message", "{{ Session::get('info') }}", 'info', {
                button: true,
                button: "Ok",
                timer: 3000,
            })
        </script>
    @endif
@endsection
