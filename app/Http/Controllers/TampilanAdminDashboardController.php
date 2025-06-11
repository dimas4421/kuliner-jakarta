<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TampilanAdminDashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user dengan role "admin"
        $jumlahAdmin = User::where('role', 'admin')->count();

        // Kirim data ke view
        return view('admin.dashboard', compact('jumlahAdmin'));
    }
}
