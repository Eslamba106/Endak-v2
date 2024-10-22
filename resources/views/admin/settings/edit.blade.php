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
                <lable class="" for="">{{ __("settings.website_name_en") }}</lable>
                <input type="text" name="web_name_en" class="form-control mt-2"
                    value="{{ old('web_name_en', $settings->web_name_en) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.website_name_ar") }}</lable>
                <input type="text" name="website_name_ar" class="form-control mt-2"
                    value="{{ old('website_name_ar', $settings->web_name_ar) }}" />
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
                <lable class="" for="">{{ __("settings.address_ar") }}</lable>
                <input type="text" name="address_ar" class="form-control mt-2"
                    value="{{ old('address_ar', $settings->address_ar) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("settings.address_en") }}</lable>
                <input type="text" name="address_en" class="form-control mt-2"
                    value="{{ old('address_en', $settings->address_en) }}" />
            </div>
            <div class="form-group">
                <lable class="" for="">{{ __("general.about_us") }}</lable>
                <textarea name="about_us" class="form-control mt-2" cols="10" rows="5">{{ old('address', $settings->about_us) }}</textarea>
                {{-- <input type="text" name="about_us" class="form-control mt-2"
                    value="{{ old('address', $settings->about_us) }}" /> --}}
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
