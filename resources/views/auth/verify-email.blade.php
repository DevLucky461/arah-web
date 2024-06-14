@extends('layout')
@section('body')
<div class="arah-white-circle"></div>
<div class="row">
    <div class="container height-verify">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-10 thank-you-register">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
            
            @if (session('status') == 'verification-link-sent')
                <div class="col-12 offset-md-1 col-md-10">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
            <form method="POST" action="{{ route('verification.send') }}" class="col-12 offset-md-2 col-md-5">
                @csrf
                <button type="submit" class="green-btn">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>
            
            <form method="POST" action="{{ route('logout') }}" class="col-12 offset-md-1 col-md-3">
                @csrf
                <button type="submit"  class="green-btn">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection