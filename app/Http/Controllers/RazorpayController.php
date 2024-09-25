<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function razorpay(Request $request){
        //dd($request->all());
        if(isset($request->razorpay_payment_id) && $request->razorpay_payment_id!=""){
            $api = new Api(env('RAZORPAY_KEY_ID'),env('RAZORPAY_KEY_SECRET'));
            $payment = $api->payment->fetch($request->razorpay->payment_id);
            //dd($payment);
            $response= $payment->capture(array('amount'=>$payment->amount));
            //dd($respone);
            $payment=new payment();
            $payment->payment_id=$response['id'];
            $payment->product_name=$response['notes']['product_name'];
            $payment->amount=$response['amount']/100;
            $payment->currency=$response['currency'];
            $payment->customer_name=$response['notes']['customer_name'];
            $payment->customer_email=$response['notes']['customer_email'];
            $payment->payment_status=$response['status'];
            $payment->payment_method="Razorpay";
            $payment->save();
            return redirect()->route('success');

        }
    }
    public function razorpaySuccess(){
        return "payment successful";
    }
    public function cancelSuccess(){
        return "payment failed";
    }
}
