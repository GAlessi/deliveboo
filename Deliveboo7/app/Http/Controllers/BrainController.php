<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BrainController extends Controller
{
    public function pay($totalPrice)
    {
        // dd($totalPrice);
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.enviroment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();

        return view('pages.braintree', compact('token', 'totalPrice'));
    }

    public function paymentDetails()
    {
        return view('pages.paymentDetails');

    }
}
