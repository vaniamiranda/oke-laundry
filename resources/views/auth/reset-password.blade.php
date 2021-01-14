<x-guest-layout>
    <div class="flex justify-center items-center mt-5 px-4 py-2 md:px-12">
        <div class="flex w-full bg-gradient-to-br from-gray-900 via-blue-700 to-blue-300 rounded py-5 md:p-5 justify-center items-center min-h-screen">
            <div class="hidden md:block w-1/2 md:p-0 lg:p-16">
                <img src="{{ asset('logo.png') }}">
            </div>
            <div class="w-full md:w-1/2 py-8 md:px-16">
                <x-jet-authentication-card>
                    <x-slot name="logo">
                        <div class="flex flex-wrap justify-center text-center">
                            <x-jet-authentication-card-logo />
                            <x-jet-validation-errors class="mt-2 mb-1" />
                        </div>
                    </x-slot>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="block">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button>
                                {{ __('Reset Password') }}
                            </x-jet-button>
                        </div>
                    </form>
                </x-jet-authentication-card>
            </div>
        </div>
    </div>
</x-guest-layout>