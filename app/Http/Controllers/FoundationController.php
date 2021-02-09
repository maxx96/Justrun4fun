<?php

namespace App\Http\Controllers;

use App\Models\Foundation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class FoundationController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'name' => 'required|max:60',
        ],
        [
            'name.required' => 'Nazwa fundacji jest wymagana.',
            'name.max' => 'Nazwa fundacji może mieć maksymalnie 60 znaków.',
        ]);
    }

    public function index()
    {
        $foundations = Foundation::all();
        return view('admin/fundacje/index', compact('foundations'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Foundation::create($request->all());
        Session::flash('message', "Fundacja $request->name została dodana.");
        return redirect('/admin/fundacje');
    }

    public function show(Foundation $foundation)
    {
    }

    public function edit($id)
    {
        $foundation = Foundation::findOrFail($id);
        return view('admin/fundacje/edit', compact('foundation'));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $foundation = Foundation::findOrFail($id);
        $foundation->update($request->all());
        Session::flash('message', "Dane fundacji zostały zaktualizowane pomyślnie.");
        return redirect('/admin/fundacje');
    }

    public function destroy($id)
    {
        Foundation::findOrFail($id)->delete();
        Session::flash('message', "Fundacja została usunięta.");
        return redirect('admin/fundacje');
    }
}
