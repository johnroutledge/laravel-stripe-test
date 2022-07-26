<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;


class PaymentsController extends Controller
{
    public function getCheckoutSession($name, $price) {

//        dd($name);
        $price = $price*100;
//        $key = config('services.stripe.secret');
//        $stripe = new \Stripe\StripeClient($key);
        $stripe = new \Stripe\StripeClient(
            'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        );
        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'http://127.0.0.1:8001/success',
            'cancel_url' => 'http://127.0.0.1:8001/products',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'GBP',
                        'product_data' => ['name' => $name],
                        'unit_amount' => $price,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

//        dd($checkout["url"]);
        $stripeUrl = $checkout["url"];
//        dd($stripeUrl);
        return redirect()->away($stripeUrl);
    }


    public function stripeWebhook(Request $request) {
        dd('Hey');
        info('stripeWebhook');

        $endpoint_secret = env('WEBHOOK_SECRET');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $payload = @file_get_contents('php://input');
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            echo '⚠️  Webhook error while validating signature.';
            http_response_code(400);
            exit();
        }

        if ($event->type == 'payment_intent.succeeded') {
            // validate purchase
            info('ALL DONE!!!');
            dd('Hey');
        }


        return response()->json(['status'=>'success']);
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
