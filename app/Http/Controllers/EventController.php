<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventsStoreRequest;

class EventController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:admin']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy("created_at", "desc")->paginate(6);

        return view("events.index", compact("events"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        if (Auth::guest()) {
            $registered = null;
            $status = null;
        } else {
            $registered = Registration::where('user_id', Auth::user()->id)->first();
            if ($registered) {
                if ($registered->count() > 0) {
                    if ($registered->status == 'approved') {
                        $status = 'Completed';
                    } elseif ($registered->status == 'declined') {
                        $status = 'Declined';
                    } else {
                        $status = 'Pending';
                    }
                } else {
                    $status = null;
                }
            } else {
                $status = null;
            }
            ;
        }
        $contestants = Registration::where('event_id', $event->id)->where('status', 'approved')->paginate(3);
        return view("events.show", compact("event", "registered", "status", "contestants"));
    }
}
