@extends('layouts.app')
@section('page_title')
    Subscribe to a Plan
@endsection
@section('content')
    <section class="py-16 ">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <form action="/subscribe" method="post" id="subscribe-form" class="lg:col-span-2 my-6">
                    <h1 class="text-5xl mb-3">Subscribe to your plan.</h1>
                    @include('.partials.forms.form_errors')
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="h-full">
                            <input class="hidden subscription-radio" type="radio" name="plan" value="price_1HFoWlDuOMuGSHqKxrglTNZI"
                                   id="premium-monthly" checked>
                            <label class="plan-label p-4 py-6 text-center font-normal bg-gray-200 border-2 border-gray-200 rounded h-full" for="premium-monthly">
                                <div class="text-3xl">Premium</div>
                                <div class="font-italic">Post unlimited journeys.</div>
                                <div class="font-bold">5$/month</div>
                            </label>
                        </div>
                        <div class="h-full">
                            <input class="hidden subscription-radio" type="radio" name="plan" value="price_1HDEDCDuOMuGSHqKwu7MufSn"
                                   id="premium-yearly" >
                            <label class="plan-label p-4 py-6 text-center font-normal bg-gray-200 border-2 border-gray-200 rounded h-full" for="premium-yearly">
                                <div class="text-3xl">Premium</div>
                                <div class="font-italic">Post unlimited journeys.</div>
                                <div class="font-bold">50$/year</div>
                            </label>
                        </div>

                    </div>
                    <div>
                        <label for="card-holder-name">Card Holder Name</label>
                        <input id="card-holder-name" type="text" class="input" placeholder="John Doe" required>
                        <label for="card-element">Credit Card Information</label>
                        <div id="card-element">

                        </div>
                        <input type="hidden" name="payment_method" id="payment-method">
                    </div>
                    <div class="stripe-errors" id="stripe-errors"></div>
                    <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-cta block text-center w-full bg-black text-white opacity-100 disabled:opacity-25">Subscribe</button>
                </form>

                <div class="rich-text lg:pt-20">
                    <h2>Why do we require a subscription?</h2>
                    <p>It costs a lot of money to develop, maintain and host a website like this one.</p>
                    <p>Unlike, Facebook, Instagram, and other popular social sharing websites, we don't sell ads or your information to make money.</p>
                    <p>In order to keep this website online, and help make it better, we require a small subscription. It is much cheaper than it would be to host a website, and makes sharing journeys fun and easy, so we think it is worth it.</p>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('body_code')
    <script src="/js/subscribe.js"></script>
@endsection
