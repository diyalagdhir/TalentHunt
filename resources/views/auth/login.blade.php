@extends('layouts.app')
@section('content')
<div class="flex justify-start items-center min-h-screen bg-cover bg-center" 
     style=" background-size:cover; background-image: url('{{ asset('images/login1.jpg') }}');">
    <div class="bg-white ml-5 mt-0 justify-center dark:bg-gray-800 shadow-lg rounded-lg p-6 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg">

        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6" style="font-size: 30px">
            <b>{{ __('Login') }}</b>
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('register') }}">
                    {{ __('New to TalentHunt?') }}
                </a>

                <x-primary-button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection