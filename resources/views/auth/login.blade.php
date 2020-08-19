@extends('layouts.app')
@section('page_title')
    Login
@endsection
@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
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

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @include('.partials.forms.form_errors')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-orange active:bg-yellow-700 transition duration-150 ease-in-out">
              {{ __('Login') }}
            </button>
          </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
