<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('../assets/img/custom-logo.jpg') }}" alt="Custom Logo" style="border-radius: 50%; width: 200px; height: 200px;">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Full name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />

            </div>
            <div class="col-4" hidden>
                    <x-jet-label for="suffix" value="{{ __('Suffix (Optional)') }}" />
            <select id="suffix" class="block mt-1 form-control" type="text" name="suffix" :value="old('suffix')" autofocus autocomplete="suffix">
                <option value="">-- Select Suffix (Optional) --</option>
                <option value="Jr">Jr</option>
                <option value="Sr">Sr</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
            </select>

            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone (Sample: 9XXXXXXXXX)') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-jet-label for="age" value="{{ __('Age') }}" />
                <x-jet-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
            </div>

            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <select id="gender" class="block mt-1 form-control" type="text" name="gender" :value="old('gender')" required autofocus autocomplete="gender">
                    <option value="">-- Select gender --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>

            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password2" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <input type="checkbox" id="showPassword2" class="form-checkbox text-gray-400">
                <label for="showPassword" class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</label>
            </div>
            <script>
                document.getElementById('showPassword2').addEventListener('change', function() {
                    var passwordInput2 = document.getElementById('password2');
                    var type = this.checked ? 'text' : 'password';
                    passwordInput2.setAttribute('type', type);
                });

            </script>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
