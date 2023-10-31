<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsStoreRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy("created_at","desc")->paginate(6);
        return view("events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("events.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsStoreRequest $request)
    {
        $formFields = $request->validated();

        Event::create($formFields);
        return redirect()->route("events.index")->with("success","Event created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view("events.edit", compact("event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventsStoreRequest $request, Event $event)
    {
        $formFields = $request->validated();
        $event->update($formFields);
        return redirect()->to($request->last_url)->with("success","Event updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
