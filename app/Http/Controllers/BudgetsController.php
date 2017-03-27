<?php

namespace App\Http\Controllers;

use App\Envelopes\Budget;
use App\Envelopes\Category;
use App\Envelopes\Envelope;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentmonth = Carbon::now()->firstOfMonth()->toDateString();
        $month = request()->get('month',date('Y-m-01'));
        $budgets = Budget::where('month',$month)->get()->pluck('value', 'envelope_id');
        $months = [];
        $months[] = $currentmonth;
        for ($i=1;$i<=2;$i++){
            $months[] = Carbon::parse($currentmonth)->addMonth($i)->toDateString();
        }
        $categories = Category::with('envelopes')->orderBy('name')->get();
        return view('budgets.index', compact('budgets', 'month', 'months', 'categories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Envelopes\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Envelopes\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Envelopes\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Envelopes\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        //
    }

    /**
     * Set months budget value for given envelope
     * @param Envelope $envelope
     * @param $month
     * @return array
     */
    public function setValue(Envelope $envelope, $month)
    {
        $value = request()->get('value',0);
        $budget = Budget::firstOrCreate(['month'=>$month, 'envelope_id'=>$envelope->id]);
        $budget->value = $value;
        $budget->save();
        $results = [];
        $results['budget'] = $budget;
        $results['status'] = 'success';
        $results['message'] = 'Presupuesto actualizado';
        return $results;
    }
}
