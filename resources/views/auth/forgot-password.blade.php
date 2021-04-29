<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
        <img src="{{ asset('img/logo_pc_02.png') }}" alt="logo" class="w-20 h-20">
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      {{-- {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }} --}}
      {{ __('암호가 기억나지 않으십니까? 등록하신 메일주소를 입력하시면 해당 메일주소앞으로 암호재설정용 링크를 보내드리겠습니다.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('메일주소')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button>
          {{ __('암호재설정용 링크 받기') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
