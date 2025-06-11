<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;


class UploadController extends Controller
{
    public function create()
    {
        return view('user.create');   // Menampilkan form upload
    }

    public function store(Request $request)
    {
        // Validasi data yang diinputkan
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_range' => 'required|string',
            'address' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
        ]);

        $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('uploads'), $imageName);

        // Menyimpan data kuliner ke database
        Upload::create([
            'name' => $request->name,
            'description' => $request->description,
            'price_range' => $request->price_range,
            'address' => $request->address,
            'image' => $imageName,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Tempat kuliner berhasil diupload!');
    }

    // app/Http/Controllers/UploadController.php
public function update(Request $request, $id)
{
    // Logika untuk memperbarui data kuliner berdasarkan ID
    $kuliner = Upload::findOrFail($id);
    $kuliner->name = $request->input('name');
    $kuliner->description = $request->input('description');
    $kuliner->price_range = $request->input('price_range');
    $kuliner->save();

    // Redirect ke halaman profil atau tempat lain setelah berhasil update
    return redirect()->route('user.profile');
}

}

