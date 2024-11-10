<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlahBuku = Buku::count();
        $bukuSampul = Buku::take(100)->get(); 
        
        return view('dashboard', compact('jumlahBuku', 'bukuSampul'));
    }
}
