@extends('layouts.dashboard.dashboard')

@section('title')
    {{ __('roles.Roles') }}
@endsection


@section('page_name')
    {{ __('roles.All_Roles') }}
@endsection
@section('content')


    <div class="modal fade" id="delete_section" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('roles.delete_role') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.roles.delete') }}" method="post">
                        @method('delete')
                        @csrf

                        <div class="modal-body">
                            {{ __('general.are_you') }}
                            <input type="hidden" name="id" id="delete_section" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('general.cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('general.delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="section">

        <div class="section-body">

            {{-- <div class="row"> --}}
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">{{ trans('roles.Title') }}</th>
                                    <th>{{ trans('roles.User_Count') }}</th>
                                    <th>{{ trans('roles.Is_Admin') }}</th>
                                    <th>{{ trans('roles.Created_At') }}</th>
                                    <th>{{ trans('roles.Actions') }}</th>
                                </tr>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td class="text-left">{{ $role->caption }}</td>
                                        <td>{{ $role->users->count() }}</td>
                                        <td>
                                            @if ($role->is_admin)
                                                <span class="text-success fas fa-check"></span>
                                            @else
                                                <span class="text-danger fas fa-times"></span>
                                            @endif
                                        </td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>
                                            {{-- @can('admin_roles_edit') --}}
                                            <a href="{{ getAdminPanelUrl() }}/roles/{{ $role->id }}/edit"
                                                class="btn-transparent text-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($role->name == 'admin' || $role->name == 'user')
                                                {{-- <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                    data-section_id="{{ $role->id }}" data-target="#delete_section"><i
                                                        class="fa fa-trash"></i></a> --}}
                                            @else 
                                                <a href="" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                    data-section_id="{{ $role->id }}" data-target="#delete_section"><i
                                                        class="fa fa-trash"></i></a>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        {{ $roles->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </section>


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
@section('js')
    <script>
        $('#delete_section').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var section_id = button.data('section_id')
            var modal = $(this)
            modal.find('.modal-body #delete_section').val(section_id);
        })
    </script>
@endsection
