<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class BrainController extends Controller
{
    public function pay($totalPrice, $order)
    {
        // dd($totalPrice);
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.enviroment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();

        return view('pages.braintree', compact('token', 'totalPrice', 'order'));
    }

    public function checkout(Request $request, $order)
    {
        // dd($order);
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.enviroment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request -> amount;
        $nonce = $request -> payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        $editableOrder = Order::findOrFail($order);
        // dd($editableOrder);

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);

            $editableOrder->status = 'accettato';
            $editableOrder -> save();

            return view('pages.paymentDetails', compact('amount', 'editableOrder'));
        } else {
            $editableOrder->status = 'rifiutato';
            $editableOrder -> save();

            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: " . $baseUrl . "index.php");
            return view('pages.paymentDetails', compact('amount', 'editableOrder'));

        }
    }

    public function paymentDetails()
    {
        return view('pages.paymentDetails');

    }
}
