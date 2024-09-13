@extends('layouts.dashboard.dashboard')

@section('title')
{{ __("settings.settings") }}
@endsection

@section('page_name')
{{ __("settings.settings") }}
@endsection

@section('content')
    <div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __("settings.web_settings") }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="width30">{{ __("settings.website_name") }}</td>
                                <td>{{ $settings->web_name ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('general.email') }}</td>
                                <td>{{ $settings->email ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __('settings.phone') }}</td>
                                <td>{{ $settings->phone ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("settings.facebook") }}</td>
                                <td>{{ $settings->facebook ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("settings.twitter") }}</td>
                                <td>{{ $settings->twitter ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("settings.instagram") }}</td>
                                <td>{{ $settings->instagram ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("settings.linkedin") }}</td>
                                <td>{{ $settings->linkedin ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("settings.address") }}</td>
                                <td>{{ $settings->address ?? '#' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">{{ __("settings.logo") }}</td>
                                <td>
                                    <div class="image" >
                                        <img width="100" height="100" src="{{ $settings->image_url ?? "" }}" alt="Not" class="custom_img">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="width30">{{ __("settings.edit_settings") }}</td>
                                <td>
                                    <a href="{{ route('admin.settings.edit' , $settings) }}">
                                        <button class="btn btn-info">
                                            {{ __("settings.edit_settings") }}
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
