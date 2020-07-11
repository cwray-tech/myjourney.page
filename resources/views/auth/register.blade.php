@extends('layouts.app')

@section('content')
    <section class="py-40 min-h-screen justify-center flex flex-col">
        <div class="container px-8 md:flex md:flex-row-reverse md:align-items-center mx-auto">
            <img class="md:w-1/4 w-1/2" src="/images/devjourney.svg" alt="Dev journey">

            <div class="lg:w-3/4 md:pr-16 md:pt-0 pt-5">
                <h1 class="text-5xl">Start sharing your journeys.</h1>
                <p class="my-3">Already have an account? <a class="underline" href="/login">Login here.</a> </p>
                <form method="POST" class="lg:w-3/4 mt-6" action="{{ route('register') }}">
                    @csrf

                    <label for="name">{{ __('Name') }}</label>

                    <input id="name" type="text" placeholder="Your Name" class="input @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" placeholder="youremail@website.com" class="input @error('email') is-invalid @enderror"
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

                    <input id="password-confirm" placeholder="***********" type="password" class="input" name="password_confirmation"
                           required autocomplete="new-password">

                    <p>By signing up, you agree to our terms and conditions.</p>

                    <button type="submit" class="btn btn-primary mt-8">
                        Start Sharing!
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
