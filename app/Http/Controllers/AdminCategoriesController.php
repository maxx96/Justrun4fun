<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Session;

class AdminCategoriesController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'name' => 'required|max:15',
            'points' => ['required', 'integer'],
        ],
        [
            'name.required' => 'Nazwa jest wymagana.',
            'name.max' => 'Nazwa może mieć maksymalnie 15 znaków.',
            'points.required' => 'Ilość punktów jest wymagana.',
            'points.integer' => 'Ilość punktów musi być liczbą całkowitą.',
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin/kategorie/index', compact('categories'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Category::create($request->all());
        Session::flash('message', "Kategoria $request->name została dodana.");
        return redirect('/admin/kategorie');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin/kategorie/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validator($request->all())->validate();
        $category->update($request->all());
        Session::flash('message', "Dane kategorii zostały zaktualizowane pomyślnie."); 
        return redirect('/admin/kategorie');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        Session::flash('message', "Kategoria została usunięta."); 
        return redirect('admin/kategorie');
    }
}
