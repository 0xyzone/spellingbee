<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventsStoreRequest;

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
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        };
        if($request->hasFile('banner')){
            $formFields['banner'] = $request->file('banner')->store('banners','public');
        }

        Event::create($formFields);
        return redirect()->route("events.index")->with("success","Event created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("events.show", compact("event"));
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
        // dd($request);
        $formFields = $request->validated();
        if($request->hasFile('logo')){
            $path = $request->file('logo')->store('logos','public');
            if($oldLogo = $event->logo){
                Storage::disk('public')->delete($oldLogo);
            };
            $formFields['logo'] = $path;
        };
        if($request->hasFile('banner')){
            $path2 = $request->file('banner')->store('banners','public');
            if($oldBanner = $event->banner){
                Storage::disk('public')->delete($oldBanner);
            };
            $formFields['banner'] = $path2;
        }
        $event->update($formFields);
        return back()->with(["status" => "event-updated"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
