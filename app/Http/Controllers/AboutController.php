<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    //
    public function store()
    {
        $abouts = About::all();
        return view('admin.about.about', compact('abouts'));
    }

    public function create(Request $request)
    {
        $rules = [
            'ab_judul' => 'required',
            'ab_foto' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'ab_tag' => 'required',
            'ab_desc' => 'required',
        ];

        $messages = [
            'ab_judul.required' => 'Nama judul diisi!',
            'ab_foto.required' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'ab_tag.required' => 'Tag diisi!',
            'ab_desc.required' => 'Deksripsi diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Menyimpan gambar dengan nama file unik
        if ($request->hasFile('ab_foto')) {
            $fileName = time() . '.' . $request->ab_foto->extension();
            $request->file('ab_foto')->storeAs('public/about', $fileName);

            About::create([
                'ab_judul' => $request->ab_judul,
                'ab_foto' => $fileName,
                'ab_tag' => $request->ab_tag,
                'ab_desc' => $request->ab_desc,
            ]);

            return redirect('/abouta')->with('success', 'Data berhasil disimpan');
        } else {
            return back()->with('error', 'Gagal mengupload gambar.');
        }
    }


    // Operasi link ke index about (admin)
    public function update(Request $request,$id)
    {
        $about = About::find($id);

        # Jika ada image baru
        if ($request->hasFile('ab_foto')) {
            $fileCheck = 'required|max:10000|mimes:jpg,jpeg,png,webp';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'ab_judul' => 'required',
            'ab_foto' => $fileCheck,
            'ab_tag' => 'required',
            'ab_desc' => 'required',
        ];

        $messages = [
            'ab_judul.required' => 'Nama judul diisi!',
            'ab_foto.required' => 'required|max:10000|mimes:jpg,jpeg,png,webp',
            'ab_tag.required' => 'Tag diisi!',
            'ab_desc.required' => 'Deksripsi diisi!',
        ];

        $this->validate($request, $rules, $messages);

        if ($request->hasFile('ab_foto')) {
            // Hapus gambar lama jika ada
            if (\File::exists('storage/about/' . $about->ab_foto)) {
                \File::delete('storage/about/' . $about->ab_foto);
            }
            // Simpan gambar baru
            $fileName = time() . '.' . $request->ab_foto->extension();
            $request->file('ab_foto')->storeAs('public/about', $fileName);
        } else {
            $fileName = $about->ab_foto; // Tetap gunakan gambar lama jika tidak ada gambar baru diunggah
        }

        $about->update([
            'ab_judul' => $request->ab_judul,
            'ab_foto' => $fileName,
            'ab_tag' => $request->ab_tag,
            'ab_desc' => $request->ab_desc,
        ]);

        return redirect('abouta')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $abouts = About::find($id);
        if (\File::exists('storage/about/' . $abouts->ab_foto)) {
            \File::delete('storage/about/' . $abouts->ab_foto);
        }

        $abouts->delete();

        return redirect()->route('abouta')->with('success', 'Data berhasil di hapus');
    }

}
