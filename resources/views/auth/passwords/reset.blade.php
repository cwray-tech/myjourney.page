@extends('layouts.app')
@section('page_title')
    Reset your Password
@endsection
@section('content')
    <section class="py-16 min-h-screen justify-center flex flex-col">
        <div class="container px-8 md:flex md:flex-row-reverse md:align-items-center mx-auto">
            <img class="md:w-1/4 w-1/2" src="/images/devjourney.svg" alt="Dev journey">

            <div class="lg:w-3/4 md:pr-16 md:pt-0 pt-5">
                <h1 class="text-5xl">Reset Password</h1>
                <form method="POST" class="lg:w-3/4 mt-6" action="{{ route('password.update') }}">
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

                        <input placeholder="************" id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                            <input placeholder="************" id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">


                    <div class="flex">
                        <button type="submit" class="btn btn-primary mr-3">
                            {{ __('Reset Password') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
