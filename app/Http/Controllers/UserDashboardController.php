<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UserDashboardController extends Controller
{
   public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $lokasi = $request->input('lokasi');

    $query = Upload::query();

    if ($keyword) {
        $query->where('name', 'like', '%' . $keyword . '%');
    }

    if ($lokasi) {
        $query->where('address', 'like', '%' . $lokasi . '%'); // Kolom address
    }

    $uploads = $query->get();

    return view('user.dashboard', compact('uploads', 'keyword', 'lokasi'));
}

}
