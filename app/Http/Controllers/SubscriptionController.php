<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('subscribed')->except('create', 'store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $user->createOrGetStripeCustomer();
        if($user->subscribed()){
            return $user->redirectToBillingPortal();
        }

        return view('.subscription.create', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $user = $request->user();
        $plan = $request->plan;

        $paymentMethod = $request->payment_method;
        // create the subscription
        try {
            $user->newSubscription('default', $plan)
                ->create($paymentMethod, [
                    'name' => $user->name
                ]);
            return redirect('/dashboard')->with('status', 'Sweet job! You have successfully subscribed.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Bummer, there was an issue subscribing.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->user()->createOrGetStripeCustomer();
        return $request->user()->redirectToBillingPortal();
    }
}
