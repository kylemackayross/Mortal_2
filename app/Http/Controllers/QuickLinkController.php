<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quicklinks = QuickLink::all();
        return view('quicklinks.index')->with('quicklinks',$quicklinks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quicklink = new QuickLink;

        $quicklink->name = $request->name;
        $quicklink->url = $request->url;
        $quicklink->save();

        return redirect()->back()->with('message', 'Quicklink saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function show(QuickLink $quickLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function edit(QuickLink $quickLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuickLink $quickLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuickLink  $quickLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuickLink $quickLink)
    {
        //
    }
}
