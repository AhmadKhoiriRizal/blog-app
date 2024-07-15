<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function store()
    {
        $blogs = Blog::all();
        return view('admin.blog.blog', compact('blogs'));
    }

    public function create(Request $request)
    {
        $rules = [
            'nama_uploader' => 'required',
            'foto' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'tanggal_upload' => 'required|date',
            'judul' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        $messages = [
            'nama_uploader.required' => 'Input nama!',
            'foto.required' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'tanggal_upload.required' => 'required|date',
            'judul.required' => 'Input title!',
            'deskripsi.required' => 'Input description!',
            'category_id.required' => 'Select category!',
        ];

        $this->validate($request, $rules, $messages);

        // Menyimpan gambar dengan nama file unik
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->file('foto')->storeAs('public/blog', $fileName);

            Blog::create([
                'foto' => $fileName,
                'tanggal_upload' => $request->tanggal_upload,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'nama_uploader' => $request->nama_uploader,
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
        $blogs = Blog::find($id);

        # Jika ada image baru
        if ($request->hasFile('foto')) {
            $fileCheck = 'required|max:10000|mimes:jpg,jpeg,png,webp';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'nama_uploader' => 'required',
            'foto' => $fileCheck,
            'tanggal_upload' => 'required|date',
            'judul' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        $messages = [
            'nama_uploader.required' => 'Input nama!',
            'foto.required' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'tanggal_upload.required' => 'required|date',
            'judul.required' => 'Input title!',
            'deskripsi.required' => 'Input description!',
            'category_id.required' => 'Select category!',
        ];

        $this->validate($request, $rules, $messages);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if (\File::exists('storage/blog/' . $blogs->foto)) {
                \File::delete('storage/blog/' . $blogs->foto);
            }
            // Simpan gambar baru
            $fileName = time() . '.' . $request->foto->extension();
            $request->file('foto')->storeAs('public/blog', $fileName);
        } else {
            $fileName = $blogs->foto; // Tetap gunakan gambar lama jika tidak ada gambar baru diunggah
        }

        $blogs->update([
            'foto' => $fileName,
            'tanggal_upload' => $request->tanggal_upload,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama_uploader' => $request->nama_uploader,
            'category_id' => $request->category_id,
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $blogs = Blog::find($id);
        if (\File::exists('storage/blog/' . $blogs->foto)) {
            \File::delete('storage/blog/' . $blogs->foto);
        }

        $blogs->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
