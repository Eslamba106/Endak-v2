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

    <form wire:submit.prevent="login">
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.Email_Or_Phone') }}</label>
            <input class="form-control" type="text" placeholder="{{ __('auth.Email_Or_Phone') }}" wire:model.lazy="email">
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="" class="m-2">{{ __('auth.password') }}</label>
            <input class="form-control" type="password" placeholder="{{ __('auth.password') }}" wire:model.lazy="password">
            @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg w-100 btn-primary mt-2 mb-2">{{ __('auth.login') }}</button>
            <a href="{{ route('forgot-password') }}" class="m-5">{{ __('auth.Forget_Password') }}</a>
            <p class="m-2 d-inline">
                <a href="{{ route('register-page') }}">{{ __('auth.register') }}</a>
            </p>
        </div>
    </form>
    
        {{-- <div>
            <label for="email">Email</label>
            <input type="email" id="email" wire:model.lazy="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" wire:model.lazy="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Login</button> --}}
    {{-- </form> --}}
</div>
