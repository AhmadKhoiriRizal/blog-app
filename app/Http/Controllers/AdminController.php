<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;
use App\Models\About;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil data artikel dari database
        $blogCount = Blog::Count();
        $aboutCount = About::Count();
        $applicationCount = Application::Count();
        $categoryCount = Category::Count();
        $adminCount = User::Count();

        // Kirim data artikel ke view
        return view('admin.index', compact('adminCount', 'categoryCount', 'applicationCount', 'blogCount','aboutCount'));
    }

    public function store()
    {
        $akuns = User::all();
        return view('admin.akun.akun', compact('akuns'));
    }

    public function create(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'confirm-password' => 'required|min:8|same:password'
        ]);
        $data = $request->except('confirm-password', 'password');
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect('/akun')->with('success', 'Data berhasil di tambahkan');
    }

    // public function edit($id)
    // {
    //     $akunu = User::find($id);
    //     return view('admin.akun.akun',compact('akunu'));
    // }

    public function update(Request $request, $id)
    {
        // Validasi data dari form (jika diperlukan)
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password'
        ]);

        // Ambil data user dari database
        $akun = User::find($id);

        // $data = $request->except('confirm-password', 'password');
        // $data['password'] = Hash::make($request->password);

        // Ganti data sesuai dengan input dari form
        $akun->name = $request->name;
        $akun->email = $request->email;
        // $akun->$request->except('confirm-password', 'password');
        $akun->password = Hash::make($request->password);

        // Simpan perubahan
        $akun->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $akun = User::findOrFail($id);

        $akun->delete();

        return redirect()->route('akun')->with('success', 'Data berhasil di hapus');
    }
}
