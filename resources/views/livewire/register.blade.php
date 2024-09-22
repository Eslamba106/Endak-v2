<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <form wire:submit.prevent="register" enctype="multipart/form-data">

        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.first_name') }}</label>
            <input class="form-control" wire:model.lazy="first_name" type="text" placeholder="{{ __('auth.first_name') }}">
            @error('first_name') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.last_name') }}</label>
            <input class="form-control" wire:model.lazy="last_name" type="text" placeholder="{{ __('auth.last_name') }}">
            @error('last_name') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.phone') }}</label>
            <input class="form-control" wire:model.lazy="phone" type="text" placeholder="{{ __('auth.phone') }}">
            @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.email') }}</label>
            <input class="form-control" wire:model.lazy="email" type="text" placeholder="{{ __('auth.Email') }}">
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.password') }}</label>
            <input class="form-control" wire:model.lazy="password" type="password" placeholder="{{ __('auth.password') }}">
            @error('password') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.password') }}</label>
            <input class="form-control" wire:model.lazy="password" type="password" placeholder="{{ __('auth.password') }}">
            @error('password') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('general.image') }}</label>
            <input class="form-control" wire:model.lazy="image" type="file" placeholder="{{ __('general.image') }}">
            @error('image') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg w-100 btn-primary mt-2 mb-2">{{ __('auth.register') }}</button>
           
            {{-- <a href="" class="m-5">{{ __('auth.Forget_Password') }}</a> --}}
            <p class="m-2 d-inline">
                <a href="{{ route('login-page') }}">{{ __('auth.Do_You_Have_Account') }}</a>
            </p>
            
        </div>
    </form>
</div>
