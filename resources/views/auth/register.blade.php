<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('images/racra.png')}}" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required />
                </div>
            <!-- Addresa -->
            <div class="mt-4">
                <x-label for="adresa" :value="__('Adresa')" />

                <x-input id="adresa" class="block mt-1 w-full" type="text" name="adresa" :value="old('adresa')" required />
            </div>

            <!-- CNP -->
        <div class="mt-4">
            <x-label for="cnp" :value="__('CNP')" />

            <x-input id="cnp" class="block mt-1 w-full" type="text" name="cnp" :value="old('cnp')" required />
        </div>

{{--                Nume intreg--}}
        <div class="mt-4">
            <x-label for="nume_intreg" :value="__('Nume Intreg')" />

            <x-input id="nume_intreg" class="block mt-1 w-full" type="text" name="nume_intreg" :value="old('nume_intreg')" required />
        </div>
{{--                Telefon--}}
        <div class="mt-4">
            <x-label for="telefon" :value="__('Telefon')" />

            <x-input id="telefon" class="block mt-1 w-full" type="text" name="telefon" :value="old('telefon')" required />
        </div>



            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
