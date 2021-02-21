<?php

namespace App\Http\Controllers;

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

        // Notification::send(request()->user(), new PaymentReceived());

        // alternative syntax which reads better
        // makes more sense when sending a notificaiton to 1 use
        request()->user()->notify(new PaymentReceived());
    }
}
