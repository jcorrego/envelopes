<?php

namespace App\Http\Controllers;

use App\Envelopes\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $categories = Category::withCount('envelopes')->orderBy('name')->get();
        return view('categories.index', compact('categories'));
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
        if($category = Category::create(request()->all()))$results['category'] = $category;
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Envelopes\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Envelopes\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Envelopes\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $results = [];
        if($category->update(request()->all())){
            $results['status'] = 'success';
            $results['message'] = __('Categoría actualizada');
        }
        return $results;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Envelopes\Category  $category
     * @return array
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $results = [];
        $results['status'] = 'success';
        $results['category'] = $category;
        $results['message'] = __('Categoría eliminada');
        return $results;
    }
}
