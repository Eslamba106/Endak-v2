<div>
    <div>
        @if ($step == 1)
            <form wire:submit.prevent="sendOtp">
                <div class="form-group">
                    <label for="phone">{{ __('auth.Phone_Number') }}</label>
                    <input type="text" class="form-control" wire:model.lazy="phone">
                    @error('phone')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('auth.Send_OTP') }}</button>
            </form>
        @elseif ($step == 2)
            <form wire:submit.prevent="verifyOtp">
                <div class="form-group">
                    <label for="otp">{{ __('auth.OTP') }}</label>
                    <input type="text" class="form-control" wire:model.lazy="otp">
                    @error('otp')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="newPassword">{{ __('auth.New_Password') }}</label>
                    <input type="password" class="form-control" wire:model.lazy="newPassword">
                    @error('newPassword')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('auth.Reset_Password') }}</button>
            </form>
        @elseif ($step == 3)
            <div class="alert alert-success">
                {{ __('auth.Password_Reset_Success') }}
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('auth.Go_to_Login') }}</a>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>
</div>
