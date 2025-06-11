<?php

namespace App\Http\Controllers;
use App\Models\Upload;

class TempatKulinerController extends Controller
{
    public function show($id)
    {
        $upload = Upload::findOrFail($id);
        $reviews = $upload->reviews; // Pastikan ada relasi untuk reviews
    
        return view('user.show', compact('upload', 'reviews'));
    }
    
}