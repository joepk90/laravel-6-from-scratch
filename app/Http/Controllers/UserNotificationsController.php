<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show()
    {

        $notifications = auth()->user()->unreadNotifications;

        // slow method to update notifications - not advised.
        // foreach ($notifications as $notification) {
        //     $notifications->markAsRead();
        // }

        // thenotifications extends the elequint collection class but with some extra helpers (markAsRead)
        $notifications->markAsRead();

        return view('notifications.show', [
            'notifications' => $notifications
        ]);
    }
}
