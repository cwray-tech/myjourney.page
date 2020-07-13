@extends('layouts.app')
@section('page_title')
    Login
@endsection
@section('content')
    <section class="py-40 min-h-screen justify-center flex flex-col">
        <div class="container px-8 md:flex md:flex-row-reverse md:align-items-center mx-auto">
            <img class="md:w-1/4 w-1/2" src="/images/devjourney.svg" alt="Dev journey">

            <div class="lg:w-3/4 md:pr-16 md:pt-0 pt-5">
                <h1 class="text-5xl">Login and share a journey.</h1>
                <p class="my-3">Don't have an account? <a class="underline" href="/register">Register here.</a></p>
                <form method="POST" class="lg:w-3/4 mt-6" action="{{ route('login') }}">
                    @csrf
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
                           autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                    <div>
                        <div class="flex items-center mb-4">
                            <input class="checkbox mr-2 cursor-pointer" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="mb-0 py-2 cursor-pointer" for="remember">
                                {{ __('Stay Logged In') }}
                            </label>
                        </div>
                    </div>
                    <div class="flex">
                        <button type="submit" class="btn btn-primary mr-3">
                            {{ __('Login') }}
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
