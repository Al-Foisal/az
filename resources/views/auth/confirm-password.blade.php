
@php
  use App\Models\SiteSetting;
  $setting = SiteSetting::first();
@endphp
<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
        <a href="{{route('dashboard')}}" id="nav-logo-sprites"
                class="nav-logo-link nav-progressive-attribute" aria-label="azprime">
                @if(!@empty($setting->slogo))
                <img style=" width:100px;height:50px;   border-radius: 50%; margin-top: 10px;" 
                src="{{asset($setting->slogo)}}" alt="">
         
  
                @endif
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Confirm') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
