<?php

namespace App\Http\Controllers;

use App\Envelopes\Category;
use App\Envelopes\Envelope;
use Illuminate\Http\Request;

class EnvelopesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $envelopes = Envelope::orderBy('category_id')->get();
        $categories = Category::orderBy('name')->get();
        return view('envelopes.index', compact('envelopes','categories'));

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
        $this->validate(request(), [
            'category_id' => 'required',
            'name' => 'required|min:3',
        ]);
        $results = [];
        if($envelope = Envelope::create(request()->all())){
            $envelope->load('category');
            $envelope->icon = 'envelope-o';
            $results['envelope'] = $envelope;
        }
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
        $categories = Category::orderBy('name')->get();
        return view('envelopes.edit',compact('envelope', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Envelopes\Envelope  $envelope
     * @return \Illuminate\Http\Response
     */
    public function update(Envelope $envelope)
    {
        $results = [];
        if($envelope->update(request()->all())){
            $results['status'] = 'success';
            $results['message'] = __('Sobre actualizado');
        }
        return $results;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Envelopes\Envelope  $envelope
     * @return array
     */
    public function destroy(Envelope $envelope)
    {
        $envelope->delete();
        $results = [];
        $results['status'] = 'success';
        $results['category'] = $envelope;
        $results['message'] = __('Sobre eliminado');
        return $results;
    }
}
