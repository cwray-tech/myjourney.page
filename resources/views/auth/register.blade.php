@extends('layouts.app')
@section('page_title')
    Start Sharing Journeys
@endsection
@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-12 w-auto" src="/images/devjourney.svg" alt="MyJourney">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Register to start sharing journeys
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                Or
                <a href="{{ route('register') }}"
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
    <section class="py-16 min-h-screen justify-center flex flex-col">
        <div class="container px-8 md:flex md:flex-row-reverse md:align-items-center mx-auto">
            <img class="md:w-1/4 w-1/2" src="/images/devjourney.svg" alt="Dev journey">

            <div class="lg:w-3/4 md:pr-16 md:pt-0 pt-5">
                <h1 class="text-5xl">Start sharing your journeys.</h1>
                <p class="my-3">Already have an account? <a class="underline" href="/login">Login here.</a></p>
                <form method="POST" class="lg:w-3/4 mt-6" action="{{ route('register') }}">
                    @csrf

                    <label for="name">{{ __('Name') }}</label>

                    <input id="name" type="text" placeholder="Your Name"
                           class="input @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" placeholder="youremail@website.com"
                           class="input @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" placeholder="***********"
                           class="input @error('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" placeholder="***********" type="password" class="input"
                           name="password_confirmation"
                           required autocomplete="new-password">

                    <p>By signing up, you agree to abide by our <a href="/terms" class="underline">terms and
                            conditions</a> and <a href="/privacy-policy" class="underline">privacy policy</a>.</p>

                    <button type="submit" class="btn btn-primary mt-8">
                        Start Sharing!
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
