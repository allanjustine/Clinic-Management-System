<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('../assets/img/custom-logo.jpg') }}" alt="Custom Logo"
                style="border-radius: 50%; width: 200px; height: 200px;">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <input type="checkbox" id="showPassword" class="form-checkbox text-gray-400">
                <label for="showPassword" class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</label>
            </div>
            <script>
                document.getElementById('showPassword').addEventListener('change', function() {
                    var passwordInput = document.getElementById('password');
                    var type = this.checked ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                });
            </script>


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/register">
                    {{ __('Register an account') }}
                </a>
            </div>
            @if (Route::has('password.request'))
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
            @endif

            <x-jet-button class="ml-4">
                {{ __('Login') }}
            </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
