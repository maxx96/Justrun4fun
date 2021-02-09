<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicOpinion;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Session;

class AdminPublicOpinionsController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'author' => 'required|max:30',
            'author_description' => 'required|max:60',
            'content' => 'required|max:200',
        ],
        [
            'author.required' => 'Autor jest wymagany.',
            'author.max' => 'Autor może mieć maksymalnie 30 znaków.',
            'author_description.required' => 'Opis autora jest wymagany.',
            'author_description.max' => 'Opis autora może mieć maksymalnie 60 znaków.',
            'content.required' => 'Treść referencji jest wymagana.',
            'content.max' => 'Treść referencji może mieć maksymalnie 200 znaków.',
        ]);
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        PublicOpinion::create($request->all());
        $event = Event::findOrFail($request->event_id);
        $public_opinions = PublicOpinion::where('id', '=', $request->event_id)->get();
        Session::flash('message', "Referencja $request->author została dodana.");
        return view('admin/referencje/show', compact('event', 'public_opinions'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $public_opinions = PublicOpinion::where('event_id', '=', $id)->get();
        return view('admin/referencje/show', compact('event', 'public_opinions'));
    }

    public function edit($id)
    {
        $public_opinion = PublicOpinion::findOrFail($id);
        $event = Event::findOrFail($public_opinion->event_id);
        return view('admin/referencje/edit', compact('public_opinion', 'event'));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $public_opinions = PublicOpinion::findOrFail($id);
        $public_opinions->update($request->all());
        Session::flash('message', "Dane referencji zostały zaktualizowane pomyślnie.");
        return redirect()->route('referencje.show', [$public_opinions->event_id]);
    }

    public function destroy($id)
    {
        PublicOpinion::findOrFail($id)->delete();
        Session::flash('message', "Referencja została usunięta.");
        return redirect()->back();
    }
}