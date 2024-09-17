@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('page.pages') }}
@endsection

@section('page_name')
    {{ __('page.pages') }}
@endsection
@section('content')

    <form action="" method="get">
           <a href="{{ route('admin.pages.create') }}" class=" ml-1 mb-2 btn btn-primary btn-xl"
                    data-toggle="tooltip" title="@lang('general.add')"> <i class="la la-plus"></i> </a>

        {{-- <div class="row mb-4"> --}}

        {{-- <div class="col-md-12">
            <div class="input-group">
     
                <select name="status" class="mr-3 form-control mr-auto" style="flex: 0 0 200px;border-radius: 8px;">
                    <option value="">{{ __('set_status') }}</option>

                    <option value="1">{{ __('publish') }}</option>
                    <option value="2">{{ __('unpublish') }}</option>
                </select>

                <button type="submit" name="bulk_action_btn" value="update_status" class="btn btn-primary mr-2">
                    <i class="la la-refresh"></i> {{ __('update') }}
                </button>
                <button type="submit" name="bulk_action_btn" value="delete" class="btn btn-danger delete_confirm"> <i
                        class="la la-trash"></i> {{ __('delete') }}</button>

            </div>
        </div> --}}

        {{-- </div> --}}


        {{-- <div class="row"> --}}
        <div class="col-sm-12">

            @if ($posts->count())
                <div class="cls_table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input class="bulk_check_all" type="checkbox" /></th>
                                <th>@lang('category.title_ar')</th>
                                <th>@lang('category.title_en')</th>
                                <th>{{ __('page.published_time') }}</th>
                                <th>@lang('general.actions')</th>
                            </tr>
                        </thead>

                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <label>
                                        <input class="check_bulk_item" name="bulk_ids[]" type="checkbox"
                                            value="{{ $post->id }}" />
                                        <span class="text-muted">#{{ $post->id }}</span>
                                    </label>
                                </td>
                                <td>{{ $post->title_ar }} {!! $post->status_context !!}</td>
                                <td>{{ $post->title_en }} {!! $post->status_context !!}</td>
                                <td>{{ $post->published_time }}</td>

                                <td>
                                    <a href="{{ route('admin.pages.edit', $post->id) }}" class="btn btn-primary">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.pages.show', $post->slug) }}" class="btn btn-purple"><i
                                            class="la la-eye"></i> </a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            @else
                {{-- {!! no_data() !!} --}}
            @endif

            {!! $posts->links() !!}

        </div>
        {{-- </div> --}}

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
