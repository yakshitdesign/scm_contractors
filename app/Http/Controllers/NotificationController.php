<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications.
     */
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('notifications.index', compact('notifications'));
    }

    // Optional: Method to mark notifications as read
    public function markAsRead(Notification $notification)
    {
        $notification->update(['read_at' => now()]);
        return redirect()->back();
    }
}
