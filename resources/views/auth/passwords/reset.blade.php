@extends('layouts.app')
@section('page_title')
    Reset your Password
@endsection
@section('content')
    <div class="relative overflow-hidden  min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto">
                <svg class="absolute top-0 left-full transform translate-x-32" width="404" height="384" fill="none"
                     viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)"/>
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404"
                     height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
                </svg>
            </div>
        </div>
        <div class="relative sm:mx-auto sm:w-full sm:max-w-lg">
            <img class="mx-auto h-12 w-auto" src="/images/devjourney.svg" alt="MyJourney">
            <h1 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">{{ __('Reset your password') }}</h1>
        </div>
        <div class="relative mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <form method="POST" class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10"
                  action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" placeholder="youremail@website.com"
                       class="input @error('email') is-invalid @enderror" name="email" required
                       autocomplete="current-email" value="{{ $email ?? old('email') }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label for="password">{{ __('New Password') }}</label>

                <input placeholder="************" id="password" type="password"
                       class="input @error('password') is-invalid @enderror" name="password" required
                       autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input placeholder="************" id="password-confirm" type="password" class="input"
                       name="password_confirmation" required autocomplete="new-password">


                <div class="flex">
                    <button type="submit" class="btn btn-primary w-full">
                        {{ __('Reset Password') }}
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection
