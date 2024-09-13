@extends('layouts.home')

@section('title')
    {{ __('login') }}
@endsection
@section('content')
    <section>
        <div class="container" style="display: flex; justify-content:center;align-items:center">
            <div style="width: 400px;margin-bottom:80px;margin-top:60px">
                <h1 style="text-align: center;margin:30px">{{ __('auth.register') }}</h1>
                <livewire:register />
            </div>

        </div>

    </section>
@endsection
