<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class KulinerAdminController extends Controller
{
    public function index()
    {// Ambil semua data kuliner beserta user yang mengupload
    $kuliners = Upload::with('user')->get();

    // Kirim data ke view
    return view('admin.kuliner', compact('kuliners'));
    }

    public function destroy($id)
    {
        // Cari data kuliner berdasarkan ID
        $kuliner = Upload::findOrFail($id);

        // Hapus gambar terkait jika ada
        if (file_exists(public_path('uploads/' . $kuliner->image))) {
            unlink(public_path('uploads/' . $kuliner->image));
        }

        // Hapus data kuliner dari database
        $kuliner->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.kuliner.index')->with('success', 'Tempat kuliner berhasil dihapus.');
    }
}
