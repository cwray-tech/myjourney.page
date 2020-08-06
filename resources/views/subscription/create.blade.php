@extends('layouts.app')
@section('page_title')
    Subscribe to a Plan
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <div class="flex justify-between items-center">
                <form action="/subscribe" method="post" id="subscription-form" class=" pr-6 w-2/3">
                    <h1 class="text-5xl mb-3">Subscribe to your plan.</h1>
                    <div class="grid md:grid-cols-3 gap-4 mb-4">
                        @csrf
                        <div>
                            <input class="hidden subscription-radio" type="radio" name="plan" value="free-plan"
                                   id="free-plan" >
                            <label class="plan-label p-4 pb-6 text-center font-normal bg-gray-200 rounded" for="free-plan">
                                <div class="text-3xl">Free Plan</div>
                                <div class="font-italic">Post one journey.</div>
                                <div class="font-bold">0$/month</div>
                            </label>
                        </div>
                        <div>
                            <input class="hidden subscription-radio" type="radio" name="plan" value="premium-monthly"
                                   id="premium-monthly" checked>
                            <label class="plan-label p-4 pb-6 text-center font-normal bg-gray-200 rounded" for="premium-monthly">
                                <div class="text-3xl">Premium</div>
                                <div class="font-italic">Post unlimited journeys.</div>
                                <div class="font-bold">5$/month</div>
                            </label>
                        </div>
                        <div>
                            <input class="hidden subscription-radio" type="radio" name="plan" value="premium-yearly-plan"
                                   id="premium-yearly" >
                            <label class="plan-label p-4 pb-6 text-center font-normal bg-gray-200 rounded" for="premium-yearly">
                                <div class="text-3xl">Premium</div>
                                <div class="font-italic">Post unlimited journeys.</div>
                                <div class="font-bold">50$/year</div>
                            </label>
                        </div>

                    </div>
                    <div>
                        <label for="card-element">Credit Card Information</label>
                        <div id="card-element">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-cta block text-center w-full">Subscribe</button>
                </form>

                <div class="w-1/3 rich-text">
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
