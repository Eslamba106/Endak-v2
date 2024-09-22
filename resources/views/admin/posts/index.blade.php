@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('posts.posts') }}
@endsection

@section('page_name')
    {{ __('posts.posts') }}
@endsection
@section('content')
<?php $lang = config('app.locale'); ?>
    <form action="" method="get">

        <div class="col-md-12 ">
            <div class="input-group mb-3 d-flex justify-content-end">
                <div class="remv_control mr-2">
                    <select name="status" class="mr-3 mt-3 form-control remv_focus">
                        <option value="">{{__('posts.set_status')}}</option>
                        <option value="1" {{selected('1', request('status'))}}>{{__('posts.active')}}</option>
                        <option value="4" {{selected('4', request('status'))}}>{{__('posts.inactive')}}</option>
                    </select>
                </div>

                {{-- <a href="{{route('offer_create')}}" class="btn btn-primary mt-3 mr-2" data-toggle="tooltip" title="@lang('admin.offer_add')"> <i class="la la-plus"></i> </a> --}}


                <button type="submit" name="bulk_action_btn" value="update_status" class="btn btn-primary mt-3 mr-2">
                    <i class="la la-refresh"></i> {{__('general.update')}}
                </button>

                <button type="submit" name="bulk_action_btn" value="delete" class="btn btn-danger delete_confirm mt-3 mr-2"> <i class="la la-trash"></i> {{__('general.delete')}}</button>
            </div>
        </div>
        <div class="col-sm-12">
            @if ($posts->count())
                <div class="cls_table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input class="bulk_check_all" type="checkbox" /></th>
                                <th>@lang('posts.title')</th>
                                <th>@lang('posts.description')</th>
                                <th>{{ __('posts.published_time') }}</th>
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
                                <td>{{ $post->title }} </td>
                                <td>{{ $post->description }} </td>
                                <td>{{ $post->created_at->shortAbsoluteDiffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('web.posts.show', $post->id) }}" class="btn btn-purple"><i
                                            class="la la-eye" title="@lang('general.show')"></i> </a>
                                    
                                 
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                {!! no_data() !!}
            @endif

            {!! $posts->links() !!}

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

