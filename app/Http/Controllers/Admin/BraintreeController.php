<?php

namespace App\Http\Controllers\Admin;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Promotion;
use Psy\Readline\Hoa\Console;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {
        $doctor = Doctor::where('slug', $request->all())->firstOrFail();
        $promotions = Promotion::all();
        // dd($doctor);

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
        $clientToken = $gateway->clientToken()->generate();
        return view('admin.doctors.payment', compact('doctor', 'promotions'), ['token' => $clientToken]);
    }

    public function pay(Request $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
        // dd($data);
        $nonceFromTheClient  = $request['payment_method_nonce'];
        $promotion = Promotion::find($request['promotion-plan']);
        $doctor = Doctor::where('slug', $request['doctor'])->firstOrFail();
        // dd($request);


        $result = $gateway->transaction()->sale([
            'amount' => $promotion->price,
            // 'amount' => 2500,
            'paymentMethodNonce' => $nonceFromTheClient,
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        // dd($result);
        if ($result->success) {
            // Transazione avvenuta con successo, ora possiamo associare il dottore all'abbonamento
            $doctor->promotions()->attach($promotion->id, [
                'subscription_date' => now() // Imposta la data corrente
            ]);

            return to_route('admin.doctors.payment')->with('transition_success', $result);
        } else {
            return redirect()->route('admin.doctors.payment')->with('transition_error', $result->message);
        }
    }
}