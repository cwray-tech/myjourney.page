@extends('layouts.app')
@section('page_title')
    Login
@endsection
@section('content')
    <div class="relative overflow-hidden  min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto">
                <svg class="absolute top-0 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
            </div>
        </div>
        <div class="relative sm:mx-auto sm:w-full sm:max-w-lg">
            <img class="mx-auto h-12 w-auto" src="/images/devjourney.svg" alt="MyJourney">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Sign in and start sharing
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium text-yellow-600 hover:text-yellow-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    register to start sharing journeys.
                </a>
            </p>
        </div>

        <div class="relative mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @include('.partials.forms.form_errors')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @honeypot
                    <div>
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            {{ __('E-Mail Address') }}
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-orange focus:border-yellow-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            {{ __('Password') }}
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" type="password" name="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-orange focus:border-yellow-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <input name="remember" id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-yellow-600 transition duration-150 ease-in-out">
                            <label   for="remember_me" {{ old('remember') ? 'checked' : '' }} class="ml-2 block text-sm leading-5 text-gray-900">
                                {{ __('Stay Logged In') }}
                            </label>
                        </div>

                        <div class="text-sm leading-5">
                            <a href="{{ route('password.request') }}" class="font-medium text-yellow-600 hover:text-yellow-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div class="mt-6">
          <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="btn btn-primary w-full">
              {{ __('Login') }}
            </button>
          </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
