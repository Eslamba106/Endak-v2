@extends('layouts.dashboard.dashboard')
@section('title')
    {{ __('page.pages') }}
@endsection

@section('page_name')
    {{ __('page.pages') }}
@endsection
@section('content')

    <form action="" method="get">



        <div class="col-sm-12">

            @if ($posts->count())
                <div class="cls_table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input class="bulk_check_all" type="checkbox" /></th>
                                <th>@lang('posts.title')</th>
                                <th>@lang('posts.description')</th>
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
                                <td>{{ $post->title }} </td>
                                <td>{{ $post->description }} </td>
                                <td>{{ $post->created_at->shortAbsoluteDiffForHumans() }}</td>

                                <td>

                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-purple"><i
                                            class="la la-eye"></i> </a>
                                    <form action="{{ route('admin.posts.status-update') }}" method="post"
                                        id="post_status{{ $post->id }}_form" class="brand_status_form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $post->id }}">
                                        <label class="switcher mx-auto">
                                            <input type="checkbox" class="switcher_input"
                                                id="brand_status{{ $post->id }}" name="status" value="1"
                                                {{ $post->status == 'active' ? 'checked' : '' }}
                                                onclick="toogleStatusModal(event,'post_status{{ $post->id }}','post-status-on.png','post-status-off.png','{{ __('Want_to_Turn_ON') }}  {{ __('status') }}','{{ __('Want_to_Turn_OFF') }}  {{ __('status') }}',`<p>{{ __('if_enabled_this_brand_will_be_available_on_the_website_and_customer_app') }}</p>`,`<p>{{ __('if_disabled_this_brand_will_be_hidden_from_the_website_and_customer_app') }}</p>`)">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
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

@section('script')
    <script>
        $('.brand_status_form').on('submit', function(event) {
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.posts.status-update') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    if (data.success == true) {
                        toastr.success("{{ __('status_updated_successfully') }}");
                    } else {
                        toastr.error(
                            '{{ __('status_updated_failed.') }} {{ __('Product_must_be_approved') }}'
                            );
                        location.reload();
                    }
                }
            });
        });
    </script>
@endsection
