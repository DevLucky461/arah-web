<x-guest-layout>
    <x-auth-card>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="email" >{{__('landing.Email')}}</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" :value="old('email')" required autofocus>
                            <small id="emailHelp" class="form-text text-muted">{{__("We'll never share your email with anyone else.")}}</small>
                        </div>
                        <div class="form-group">
                            <label for="password" >{{__('auth.Password')}}</label>
                            <input id="password" type="password" class="form-control"name="password" required placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                            <!--a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a-->
                        @endif
                    </form>
                </div>
            </div>
        </div>
        
    </x-auth-card>
</x-guest-layout>
