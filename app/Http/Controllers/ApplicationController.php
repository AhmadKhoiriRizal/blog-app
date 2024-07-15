<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store()
    {
        $apps = Application::all();
        return view('admin.applications.applications', compact('apps'));
    }

    public function create(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'foto' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'tanggal_upload' => 'required|date',
            'judul' => 'required',
            'link_download' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        $messages = [
            'nama.required' => 'Input nama!',
            'foto.required' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'tanggal_upload.required' => 'required|date',
            'judul.required' => 'Input title!',
            'link_download' => 'Input link',
            'deskripsi.required' => 'Input description!',
            'category_id.required' => 'Select category!',
        ];

        $this->validate($request, $rules, $messages);

        // Menyimpan gambar dengan nama file unik
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->file('foto')->storeAs('public/app', $fileName);

            Application::create([
                'nama' => $request->nama,
                'foto' => $fileName,
                'tanggal_upload' => $request->tanggal_upload,
                'judul' => $request->judul,
                'link_download' => $request->link_download,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        } else {
            return back()->with('error', 'Gagal mengupload gambar.');
        }
    }


    // Operasi link ke index about (admin)
    public function update(Request $request,$id)
    {
        $app = Application::find($id);

        # Jika ada image baru
        if ($request->hasFile('foto')) {
            $fileCheck = 'required|max:10000|mimes:jpg,jpeg,png,webp';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'nama' => 'required',
            'foto' => $fileCheck,
            'tanggal_upload' => 'required|date',
            'judul' => 'required',
            'link_download' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        $messages = [
            'nama.required' => 'Input nama!',
            'foto.required' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'tanggal_upload.required' => 'required|date',
            'judul.required' => 'Input title!',
            'link_download' => 'Input link',
            'deskripsi.required' => 'Input description!',
            'category_id.required' => 'Select category!',
        ];

        $this->validate($request, $rules, $messages);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if (\File::exists('storage/app/' . $app->foto)) {
                \File::delete('storage/app/' . $app->foto);
            }
            // Simpan gambar baru
            $fileName = time() . '.' . $request->foto->extension();
            $request->file('foto')->storeAs('public/app', $fileName);
        } else {
            $fileName = $app->foto; // Tetap gunakan gambar lama jika tidak ada gambar baru diunggah
        }

        $app->update([
            'foto' => $fileName,
            'nama' => $request->nama,
            'tanggal_upload' => $request->tanggal_upload,
            'judul' => $request->judul,
            'link_download' => $request->link_download,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $app = Application::find($id);
        if (\File::exists('storage/app/' . $app->foto)) {
            \File::delete('storage/app/' . $app->foto);
        }

        $app->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
