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

                    <div x-data="{ recovery: false }">
                        <div class="mb-4 text-sm text-white" x-show="! recovery">
                            {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                        </div>

                        <div class="mb-4 text-sm text-white" x-show="recovery">
                            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                        </div>

                        <x-jet-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf

                            <div class="mt-4" x-show="! recovery">
                                <x-jet-label for="code" value="{{ __('Code') }}" />
                                <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                            </div>

                            <div class="mt-4" x-show="recovery">
                                <x-jet-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                                <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="button" class="text-sm text-white hover:text-gray-900 underline cursor-pointer" x-show="! recovery" x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                                    {{ __('Use a recovery code') }}
                                </button>

                                <button type="button" class="text-sm text-white hover:text-gray-900 underline cursor-pointer" x-show="recovery" x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                                    {{ __('Use an authentication code') }}
                                </button>

                                <x-jet-button class="ml-4">
                                    {{ __('Login') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </x-jet-authentication-card>
            </div>
        </div>
    </div>
</x-guest-layout>