@extends('layouts.home')

@section('title')
    {{ __('auth.Forget_Password') }}
@endsection
@section('content')
    <section>
        <div class="container" style="display: flex; justify-content:center;align-items:center">
            <div style="width: 400px;margin-bottom:80px;margin-top:60px">
                <h1 style="text-align: center;margin:30px">{{ __('auth.Forget_Password') }}</h1>
                <livewire:forgot-password />
            </div>

        </div>

    </section>
@endsection
