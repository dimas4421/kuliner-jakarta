<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Upload; // Jika kamu ingin menampilkan jumlah tempat kuliner juga
use App\Models\Review;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    // AdminDashboardController
    public function index()
    {
        // Menghitung jumlah admin
        $jumlahAdmin = User::where('role', 'admin')->count();

        // Menghitung jumlah tempat kuliner
        $jumlahTempatKuliner = Upload::count();

        // Menghitung jumlah total user (selain admin)
        $jumlahUser = User::where('role', 'user')->count();

        // Menghitung jumlah review
        $jumlahReview = Review::count();
  // Grafik Pendaftaran User per Bulan (12 bulan terakhir)
  $usersPerMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
  ->where('role', 'user')
  ->whereYear('created_at', Carbon::now()->year)
  ->groupBy('month')
  ->orderBy('month')
  ->pluck('total', 'month')
  ->toArray();

// Data bulan lengkap
$months = [
  'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
  'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

// Format data grafik
$userData = [];
foreach (range(1, 12) as $month) {
  $userData[] = $usersPerMonth[$month] ?? 0;
}  // --- DATA UNTUK PIE CHART REVIEW ---
$ratingCounts = Review::selectRaw('rating, COUNT(*) as total')
    ->groupBy('rating')
    ->orderBy('rating')
    ->pluck('total', 'rating')
    ->toArray();

$ratingLabels = array_keys($ratingCounts);
$ratingData = array_values($ratingCounts);

return view('admin.dashboard', compact(
    'jumlahAdmin', 'jumlahTempatKuliner', 'jumlahUser',
    'jumlahReview', 'months', 'userData',
    'ratingLabels', 'ratingData'
));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
}
