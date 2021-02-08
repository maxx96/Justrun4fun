<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicOpinion;
use App\Models\Event;
use Session;

class AdminPublicOpinionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author' => 'required|max:30',
            'author_description' => 'required|max:60',
            'content' => 'required|max:200',
        ]);
        PublicOpinion::create($request->all());
        $event = Event::findOrFail($request->event_id);
        $public_opinions = PublicOpinion::where('id', '=', $request->event_id)->get();
        Session::flash('add_references', "Referencja $request->author została dodana.");
        return view('admin/referencje/show', compact('event', 'public_opinions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $public_opinions = PublicOpinion::where('event_id', '=', $id)->get();
        return view('admin/referencje/show', compact('event', 'public_opinions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $public_opinion = PublicOpinion::findOrFail($id);
        $event = Event::findOrFail($public_opinion->event_id);
        return view('admin/referencje/edit', compact('public_opinion', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $public_opinions = PublicOpinion::findOrFail($id);
        $validated = $request->validate([
            'author' => 'required|max:30',
            'author_description' => 'required|max:60',
            'content' => 'required|max:200',
        ]);
        $public_opinions->update($request->all());
        Session::flash('update_references', "Dane referencji zostały zaktualizowane pomyślnie.");
        return redirect()->route('referencje.show', [$public_opinions->event_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PublicOpinion::findOrFail($id)->delete();
        Session::flash('delete_references', "Referencja została usunięta.");
        return redirect()->back();
    }
}
