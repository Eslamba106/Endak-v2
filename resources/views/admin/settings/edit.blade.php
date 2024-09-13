@extends('layouts.dashboard.dashboard')

@section('title')
{{ __("settings.edit_settings") }}
@endsection

@section('page_name')
    {{ __("settings.edit_settings") }}
@endsection

@section('content')
<?php $settings = $setting ; ?>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h3>Error Occured!</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.settings.update', $settings) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <lable class="" for="">{{ __("settings.website_name") }}</lable>
                <input type="text" name="web_name" class="form-control mt-2"
                    value="{{ old('web_name', $settings->web_name) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __('general.email') }}</lable>
                <input type="text" name="email" class="form-control mt-2"
                    value="{{ old('email', $settings->email) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.facebook") }}</lable>
                <input type="text" name="facebook" class="form-control mt-2"
                    value="{{ old('facebook', $settings->facebook) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.twitter") }}</lable>
                <input type="text" name="twitter" class="form-control mt-2"
                    value="{{ old('twitter', $settings->twitter) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.instagram") }}</lable>
                <input type="text" name="instagram" class="form-control mt-2"
                    value="{{ old('instagram', $settings->instagram) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.linkedin") }}</lable>
                <input type="text" name="linkedin" class="form-control mt-2"
                    value="{{ old('linkedin', $settings->linkedin) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.address") }}</lable>
                <input type="text" name="address" class="form-control mt-2"
                    value="{{ old('address', $settings->address) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.logo") }}</lable>
                <input type="file" name="logo" class="form-control mt-2"
                    value="{{ old('logo', $settings->logo) }}" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">{{ __("general.save") }}</button>
            </div>
        </form>
    </div>
@endsection
