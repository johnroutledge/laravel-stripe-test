<?php

namespace App\Http\Controllers;

use http\QueryString;
use Illuminate\Http\Request;
use App\Models\Order;
//use Stripe;
use Stripe\Stripe;
use Stripe\StripeClient;


class PaymentsController extends Controller
{
    public function getCheckoutSession($name, $price) {

        $price = $price*100;
//        $stripe = new StripeClient(
//            env('STRIPE_SECRET')
//        );
        $stripe = new StripeClient(
            'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        );
        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'http://127.0.0.1:8000/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://127.0.0.1:8000/products',
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

        $stripeUrl = $checkout["url"];
        return redirect()->away($stripeUrl);
    }


    public function stripeWebhook(Request $request) {

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
            // handle purchase and create order

            $order = new Order();
            $order->product_id = 1;
            $order->stripe_id = $event->data->object->id;
            $order->total = $event->data->object->amount;
            $order->save();

        }

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
    public function create(Request $request)
    {

        $stripe = new StripeClient(
            'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        );
//        $stripe = new StripeClient(
//            env('STRIPE_SECRET')
//        );
        $checkoutSession = $stripe->checkout->sessions->retrieve(
            ($request->query('session_id'))
        );

//        dd($checkoutSession->customer_details);
        $customerDetails = $checkoutSession->customer_details;
        $orderTotal = $checkoutSession->amount_total / 100;

        $order = new Order();
        $order->product_id = 1;
        $order->stripe_id = $checkoutSession->payment_intent;
        $order->total = $orderTotal;
        $order->save();

        return view('payments/create', ['customerDetails' => $customerDetails]);

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
