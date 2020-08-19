@extends('layouts.app')
@section('page_title')
    Start Sharing Journeys
@endsection
@section('content')
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-lg">
            <img class="mx-auto h-12 w-auto" src="/images/devjourney.svg" alt="MyJourney">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Register to start sharing journeys
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                Or
                <a href="{{ route('login') }}"
                   class="font-medium text-yellow-600 hover:text-yellow-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    login to your account.
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @include('.partials.forms.form_errors')
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <label for="name"
                               class="block text-sm font-medium leading-5 text-gray-700">{{ __('Name') }}</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="name" type="text" placeholder="Your Name"
                                   name="name" value="{{ old('name') }}" required autocomplete="name"
                                   class="input"
                                   autofocus>
                        </div>
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            {{ __('E-Mail Address') }}
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input placeholder="youremail@website.com" id="email" type="email" name="email"
                                   value="{{ old('email') }}" required
                                   class="input">
                        </div>
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            {{ __('Password') }}
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input placeholder="***********" id="password" type="password" name="password" required
                                   class="input">
                        </div>

                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" placeholder="***********" type="password" class="input"
                               name="password_confirmation"
                               required autocomplete="new-password">
                    <p class="text-sm leading-5 text-gray-600 mb-3">By signing up, you agree to our <a href="/terms" class="underline">terms and
                            conditions</a> and <a href="/privacy-policy" class="underline">privacy policy</a>.</p>


                    <span class="block w-full rounded-md shadow-sm">
            <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-orange active:bg-yellow-700 transition duration-150 ease-in-out">
              {{ __('Register') }}
            </button>
          </span>
                </form>

            </div>
        </div>
    </div>
@endsection
