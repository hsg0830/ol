<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <img src="{{ asset('img/logo/logo_pc_02.png') }}" alt="logo" class="w-20 h-20">
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      {{ __('보안을 위하여 암호를 입력하여주십시오.') }}
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <!-- Password -->
      <div>
        <x-label for="password" :value="__('암호')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <div class="flex justify-end mt-4">
        <x-button>
          {{ __('확인') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
