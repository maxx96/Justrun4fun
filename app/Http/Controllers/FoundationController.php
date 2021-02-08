<?php

namespace App\Http\Controllers;

use App\Models\Foundation;
use Illuminate\Http\Request;
use Session;

class FoundationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foundations = Foundation::all();
        return view('admin/fundacje/index', compact('foundations'));
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
        Foundation::create($request->all());
        Session::flash('add_foundations', "Fundacja $request->name została dodana.");
        return redirect('/admin/fundacje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function show(Foundation $foundation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foundation = Foundation::findOrFail($id);
        return view('admin/fundacje/edit', compact('foundation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foundation = Foundation::findOrFail($id);
        $foundation->update($request->all());
        Session::flash('update_foundations', "Dane fundacji zostały zaktualizowane pomyślnie.");
        return redirect('/admin/fundacje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foundation  $foundation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Foundation::findOrFail($id)->delete();
        Session::flash('delete_foundations', "Fundacja została usunięta.");
        return redirect('admin/fundacje');
    }
}
