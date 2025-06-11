<?php

namespace App\Http\Controllers;

use App\Models\Upload; // Pastikan model yang digunakan sesuai dengan struktur tabel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function edit($id)
    {
        // Ambil tempat kuliner berdasarkan ID
        $upload = Auth::user()->uploads()->findOrFail($id);

        // Tampilkan halaman edit
        return view('user.edit', compact('upload'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price_range' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Cari tempat kuliner yang akan diperbarui
        $upload = Auth::user()->uploads()->findOrFail($id);

        // Persiapkan data untuk update
        $dataToUpdate = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price_range' => $validated['price_range'],
            'address' => $validated['address'],
        ];

        // Jika ada gambar baru, perbarui gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($upload->image && Storage::exists('public/uploads/' . $upload->image)) {
                Storage::delete('public/uploads/' . $upload->image);
            }

           // Simpan gambar langsung ke public/uploads
$imageName = time() . '.' . $request->image->extension();
$request->image->move(public_path('uploads'), $imageName);
$dataToUpdate['image'] = $imageName;

        }

        // Update data tempat kuliner
        $upload->update($dataToUpdate);

        return redirect()->route('user.profil')->with('success', 'Tempat kuliner berhasil diperbarui!');
    }
}
