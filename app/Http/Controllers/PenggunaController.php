<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Upload;



class PenggunaController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        // Ambil uploads berdasarkan relasi
        $uploads = $user->uploads;

        return view('user.pengguna', compact('user', 'uploads'));
    }

    public function destroy($id)
    {
        $upload = Upload::findOrFail($id);
        // Opsional: Hapus file gambar sebelum menghapus data dari database
        if (file_exists(public_path('uploads/' . $upload->image))) {
            unlink(public_path('uploads/' . $upload->image));
        }
        $upload->delete();
        return redirect()->route('user.profil')->with('success', 'Tempat kuliner berhasil dihapus.');
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|confirmed|min:8', // Password wajib minimal 8 karakter
        ]);

        // Ambil pengguna yang sedang terautentikasi
        $user = auth()->user();

        // Persiapkan data yang ingin diupdate
        $data = [
            'email' => $request->email,
        ];

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Gunakan query builder untuk update
        DB::table('users')

            ->where('id', $user->id)
            ->update($data);

        // Kembalikan response dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    public function dashboard()
{
    $user = auth()->user();
    $uploads = $user->uploads; // Pastikan relasi sudah didefinisikan

    return view('user.dashboard', compact('user', 'uploads'));
}
public function show($id)
{
    $upload = Upload::with('reviews.user')->findOrFail($id);
    $reviews = $upload->reviews;

    return view('user.show', compact('upload', 'reviews'));
}


}
