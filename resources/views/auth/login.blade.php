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
              <x-jet-validation-errors class="mt-2 mb-1" />
            </div>
          </x-slot>
          
          <form class="-mt-10" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-5">
              <x-jet-label for="email" value="{{ __('Email') }}" />
              <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
              <x-jet-label for="password" value="{{ __('Password') }}" />
              <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
              <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
              </label>
            </div>
            <div class="block mt-4">
              <label for="remember_me" class="flex">
                <div class="ml-2 text-sm text-white w-full text-center">{{ __('Belum menjadi member? daftar ') }}
                  <a class="text-white font-bold" href="{{ route('register') }}">Disini</a>
                </div>
              </label>
            </div>

            <div class="flex flex-wrap items-center justify-center mt-4">
              @if (Route::has('password.request'))
              <a class="underline text-sm text-white hover:text-white w-full text-center" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
              </a>
              @endif

              <x-jet-button class="mt-4 text-center">
                {{ __('Login') }}
              </x-jet-button>
            </div>
          </form>
        </x-jet-authentication-card>
      </div>
    </div>
  </div>
</x-guest-layout>