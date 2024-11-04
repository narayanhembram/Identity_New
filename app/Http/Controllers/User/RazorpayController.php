<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->all();
        $booking = Booking::where('id', $request->booking_id)->first();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $payment = Payment::create([
                    'booking_id' => $booking->id,
                    'amount' => $response['amount'] / 100,
                    'transation_date' => date('Y-m-d H:i:s'),
                    'transaction_number' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'json_response' => json_encode((array)$response)
                ]);

                $booking->status = 1;
                $booking->save();

                Session::put('success', 'Payment successful');
                return redirect()->route('user.mysession.thankyou',$booking->team_id);
            } catch (Exception $e) {

                dd($e);
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
    }
}
