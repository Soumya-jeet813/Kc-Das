<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Razorpay\Api\Api;
use Exception;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'address'    => 'required|string',
            'city'       => 'required|string',
            'pincode'    => 'required|numeric',
            'phone'      => 'required',
        ]);

        // 2. Create the Order in your database first
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $order = Order::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'address'    => $request->address,
            'city'       => $request->city,
            'pincode'    => $request->pincode,
            'phone'      => $request->phone,
            'amount'     => $total, 
            'status'     => 'pending',
        ]);

        // 2. Handle UPI/Razorpay Payment
        if ($request->has('razorpay_payment_id')) {
            try {
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                $payment = $api->payment->fetch($request->razorpay_payment_id);
                
                // Capture the payment
                $payment->capture(['amount' => $payment->amount]);
                
                // Update Order Status
                $order->update([
                    'payment_id' => $request->razorpay_payment_id,
                    'status' => 'completed'
                ]);

                session()->forget('cart'); // Clear the cart
                return redirect()->route('order.success', $order->id);
            } catch (Exception $e) {
                return back()->with('error', 'Payment failed: ' . $e->getMessage());
            }
        }

        // Handle Cash on Delivery
        $order->update(['status' => 'processing (COD)']);
        session()->forget('cart');
        return redirect()->route('order.success', $order->id);
    }
    public function success($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        return view('order-success', compact('order'));
    }
}
