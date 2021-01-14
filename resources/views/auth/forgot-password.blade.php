<x-guest-layout>
    <div class="justify-center items-center mt-5 px-4 py-2 md:px-12">
        <div class="flex w-full bg-gradient-to-br from-gray-900 via-blue-700 to-blue-300 rounded py-5 md:p-5 justify-center items-center min-h-screen">
            <div class="hidden md:block w-1/2 md:p-0 lg:p-16">
                <img src="{{ asset('logo.png') }}">
            </div>
            <div class="w-full md:w-1/2 py-8 md:px-16">
                <x-jet-authentication-card>
                    <x-slot name="logo">
                        <div class="flex flex-wrap justify-center text-center">
                            <x-jet-authentication-card-logo />
                        </div>
                    </x-slot>

                    <div class="mb-4 text-sm text-gray-600">
                        {{-- {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }} --}}
                    </div>

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-white">
                        {{ session('status') }}
                    </div>
                    @endif

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="block">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button>
                                {{ __('Email Password Reset Link') }}
                            </x-jet-button>
                        </div>
                    </form>
                </x-jet-authentication-card>
            </div>
        </div>
</x-guest-layout>