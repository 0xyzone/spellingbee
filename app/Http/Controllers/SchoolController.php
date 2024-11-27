<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolStoreRequest;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::paginate(6);

        return view("schools.index", compact("schools"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("schools.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolStoreRequest $request)
    {
        $formFields = $request->validated();

        School::create($formFields);

        return redirect()->route("schools.index")->with("success","School created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view("schools.edit", compact("school"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolStoreRequest $request, School $school)
    {
        $formFields = $request->validated();
        $school->update($formFields);

        return redirect()->to($request->last_url)->with("success","School updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
