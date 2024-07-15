<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store()
    {
        $categorys = Category::all();
        return view('admin.kategori.kategori', compact('categorys'));
    }

    public function create(Request $request)
    {
        $rules = [
            'kategori' => 'required',
        ];

        $messages = [
            'kategori.required' => 'Input category nama!',
        ];

        $this->validate($request, $rules, $messages);

        Category::create([
            'kategori' => $request->kategori,
        ]);
        return back()->with('success', 'Data berhasil disimpan');
    }


    // Operasi link ke index about (admin)
    public function update(Request $request,$id)
    {
        $category = Category::find($id);

        $rules = [
            'kategori' => 'required',
        ];

        $messages = [
            'kategori.required' => 'Input category nama!',
        ];

        $this->validate($request, $rules, $messages);

        $category->update([
            'kategori' => $request->kategori,
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
