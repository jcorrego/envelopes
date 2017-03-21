<?php

namespace App\Http\Controllers;

use App\Envelopes\Envelope;
use Illuminate\Http\Request;

class EnvelopesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $envelopes = Envelope::all();
        return view('envelopes.index', compact('envelopes'));

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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $results = [];
        if($envelope = Envelope::create(request()->all()))$results['envelope'] = $envelope;
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Envelopes\Envelope  $envelope
     * @return \Illuminate\Http\Response
     */
    public function show(Envelope $envelope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Envelopes\Envelope  $envelope
     * @return \Illuminate\Http\Response
     */
    public function edit(Envelope $envelope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Envelopes\Envelope  $envelope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Envelope $envelope)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Envelopes\Envelope  $envelope
     * @return \Illuminate\Http\Response
     */
    public function destroy(Envelope $envelope)
    {
        //
    }
}
