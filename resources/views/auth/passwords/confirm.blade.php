@extends('layouts.app')
@section('page_title')
    Confirm your Password
@endsection
@section('content')
    <section class="py-40 min-h-screen justify-center flex flex-col">
        <div class="container px-8 md:flex md:flex-row-reverse md:align-items-center mx-auto">
            <img class="md:w-1/4 w-1/2" src="/images/devjourney.svg" alt="Dev journey">

            <div class="lg:w-3/4 md:pr-16 md:pt-0 pt-5">
                <h1 class="text-5xl">Confirm your password to continue.</h1>
                <form method="POST" class="lg:w-3/4 mt-6" action="{{ route('password.confirm') }}">
                    @csrf

                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" placeholder="***********"
                           class="input @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <div class="flex">
                        <button type="submit" class="btn btn-primary mr-3">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
