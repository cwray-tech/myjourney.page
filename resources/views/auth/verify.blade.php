@extends('layouts.app')
@section('page_title')
    Verify your Email
@endsection
@section('content')
<section class="py-40 min-h-screen justify-center flex flex-col">
    <div class="container mx-auto px-4">
        <div class="">
            <div class="">
                <h1 class="text-5xl">{{ __('Verify Your Email Address') }}</h1>

                <div class="">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
