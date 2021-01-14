<x-guest-layout>
    <div class="justify-center items-center mt-5 px-4 py-2 md:px-12">
        <div class="flex w-full bg-gradient-to-br from-gray-900 via-blue-700 to-blue-300 rounded py-5 md:p-5 justify-center items-center">
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
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-jet-button type="submit">
                                    {{ __('Resend Verification Email') }}
                                </x-jet-button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </x-jet-authentication-card>
            </div>
        </div>
    </div>
</x-guest-layout>