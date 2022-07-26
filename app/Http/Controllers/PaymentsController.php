<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $stripe = new \Stripe\StripeClient('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
//        $customer = $stripe->customers->create([
//            'description' => 'example customer',
//            'email' => 'email@example.com',
//            'payment_method' => 'pm_card_visa',
//        ]);
//        dd($customer);
//        echo $customer;
//        $priceInPence = $price;
        $stripe = new \Stripe\StripeClient(
            'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        );
        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'GBP',
                        'product_data' => ['name' => 'Shoes'],
                        'unit_amount' => 555,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

//        dd($checkout);
        return view ('payments/index');
//        return view('payments/index', ['price' => $priceInPence, 'name' => $productName]);

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
        $stripe = new \Stripe\StripeClient(
            'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        );
        $customer = $stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => [
                [
                    'price' => $request->input('price'),
                    'quantity' => 2,
                ],
            ],
            'mode' => 'payment',
        ]);
        echo $customer;

//        $stripe = new \Stripe\StripeClient('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
//        $customer = $stripe->customers->create([
//            'description' => 'example customer',
//            'email' => 'email@example.com',
//            'payment_method' => 'pm_card_visa',
//        ]);
//        dd($customer);
//        echo $customer;



//        Stripe\Stripe::setApiKey(config('STRIPE_SECRET'));
//        Stripe\Charge::create ([
//            "amount" => 100 * 100,
//            "currency" => "usd",
//            "source" => $request->stripeToken,
//            "description" => "This payment is tested purpose"
//        ]);
//
//        Session::flash('success', 'Payment successful!');
//
//        return back();
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
