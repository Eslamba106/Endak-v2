@extends('layouts.dashboard.dashboard')
@section('title')
{{ __('roles.Roles') }}
@endsection

@section('page_name')
{{ __('roles.Create_Admin_Roles') }}
@endsection
{{-- @section('css')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}">


<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 


<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

@endsection --}}
@section('content')

    <section class="section">
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="section-body">

            {{-- <div class="row"> --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form
                                action="{{ getAdminPanelUrl() }}/roles/{{ !empty($role) ? $role->id . '/update' : 'store' }}"
                                method="Post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">

                                        @if (empty($role))
                                            <div class="form-group @error('name') is-invalid @enderror">
                                                <label>{{ trans('roles.Name') }}</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ !empty($role) ? $role->name : old('name') }}"
                                                    placeholder="" />

                                                {{-- <p class="mt-1 text-muted">{{ trans('update.role_name_hint') }}</p> --}}
                                            </div>

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif

                                        <div class="form-group @error('caption') is-invalid @enderror">
                                            <label>{{ trans('roles.Caption') }}</label>
                                            <input type="text" name="caption" class="form-control"
                                                value="{{ !empty($role) ? $role->caption : old('caption') }}"
                                                placeholder="" />

                                            @error('caption')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        

                                    </div>
                                </div>


                                <div class="form-group" id="sections">

                                    {{-- <h2 class="section-title">{{ trans('admin/main.permission') }}</h2>
                                        <p class="section-lead">
                                            {{ trans('admin/main.permission_description') }}
                                        </p> --}}
                                    @can('Create_Admin_Roles')
                                        <div class="row">
                                            @foreach ($sections as $section)
                                                <div
                                                    class="section-card is_{{ $section->type }} col-12 col-md-6 col-lg-4 {{ (!empty($role) and $role->is_admin and $section->type == 'panel') ? 'd-none' : '' }} {{ (!empty($role) and !$role->is_admin and $section->type == 'admin') ? 'd-none' : '' }} {{ (empty($role) and $section->type == 'admin') ? 'd-none' : '' }}">
                                                    <div class="card card-primary section-box">
                                                        <div class="card-header">
                                                            <input type="checkbox" name="permissions[]"
                                                                id="permissions_{{ $section->id }}"
                                                                value="{{ $section->id }}"
                                                                {{ isset($permissions[$section->id]) ? 'checked' : '' }}
                                                                class="form-check-input mt-0 section-parent">
                                                            <label
                                                                class="form-check-label font-16 font-weight-bold cursor-pointer"
                                                                for="permissions_{{ $section->id }}">
                                                                {{ __('roles.'.$section->caption) }}
                                                            </label>
                                                        </div>

                                                        @if (!empty($section->children))
                                                            <div class="card-body">

                                                                @foreach ($section->children as $key => $child)
                                                                    <div class="form-check mt-1">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="permissions_{{ $child->id }}"
                                                                            value="{{ $child->id }}"
                                                                            {{ isset($permissions[$child->id]) ? 'checked' : '' }}
                                                                            class="form-check-input section-child">
                                                                        <label class="form-check-label cursor-pointer mt-0"
                                                                            for="permissions_{{ $child->id }}">
                                                                            {{ __('roles.'.$child->caption) }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endcan
                                </div>

                                <div class=" mt-4">
                                    <button class="btn btn-primary">{{ trans('Save') }}</button>
                                </div>
                            </form>
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
    {{-- <script src="{{ asset('js/javascript/select2.min.js') }}"></script>

<script src="{{ asset('js/javascript/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/javascript/popper.min.js') }}"></script>
<script src="{{ asset('js/javascript/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/javascript/nicescroll.min.js') }}"></script>
<script src="{{ asset('js/javascript/moment.min.js') }}"></script>
<script src="{{ asset('js/javascript/stisla.js') }}"></script>
<script src="{{ asset('js/javascript/toast.min.js') }}"></script>

<script>
    (function () {
        "use strict";

        window.csrfToken = $('meta[name="csrf-token"]');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        @if (session()->has('toast'))
        $.toast({
            heading: '{{ session()->get('toast')['title'] ?? '' }}',
            text: '{{ session()->get('toast')['msg'] ?? '' }}',
            bgColor: '@if (session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
            textColor: 'white',
            hideAfter: 10000,
            position: 'bottom-right',
            icon: '{{ session()->get('toast')['status'] }}'
        });
        @endif
    })(jQuery);
</script>

<script src="{{ asset('js/javascript/daterangepicker.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/javascript/select2.min.js') }}"></script> --}}
    <script src="{{ asset('js/javascript/stand-alone-button.js') }}"></script>
    {{-- <script src="{{ asset('js/javascript/scripts.js') }}"></script> --}}

    <!-- Template JS File -->

    <script src="{{ asset('js/roles.min.js') }}"></script>
@endsection
