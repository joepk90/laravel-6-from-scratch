<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use Illuminate\Http\Request;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {

        // send an email (goes to the mailtrap service)
        // Notification::send(request()->user(), new PaymentReceived());

        // alternative syntax which reads better
        // makes more sense when sending a notificaiton to 1 use
        // request()->user()->notify(new PaymentReceived('900'));

        redirect('/payments/create')
            ->with('message', 'Payment Successful');


        // dispath event 
        ProductPurchased::dispatch('toy'); // identical to: event(new ProductPurchased('toy'));

    }
}
