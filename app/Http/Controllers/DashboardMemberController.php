<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Lokasi;
use App\Models\Paket;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardMemberController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Wetlook Carwash',
            'kendaraan' => Kendaraan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function booking()
    {
        return view('dashboard.booking.index', [
            'title' => 'Booking | Wetlook Carwash',
            'kendaraan' => Kendaraan::where('user_id', auth()->user()->id)->get(),
            'lokasi' => Lokasi::all()
        ]);
    }

    public function fetchPaketByLokasi(Request $request)
    {
        $paket = Paket::where('lokasi_id', $request->lokasi_id)->get();
        return response()->json(['paket' => $paket]);
    }

    public function cekSlot(Request $request)
    {
        // $slot_terisi = Booking::join('paket', 'paket.id', '=', 'booking.paket_id')
        //     ->join('lokasi', 'lokasi.id', '=', 'paket.lokasi_id')
        //     ->where('lokasi_id', $request->lokasi_id)
        //     ->where('tanggal', $request->tanggal)
        //     ->get();
        $slot_terisi = DB::table('booking')
            ->join('paket', 'paket.id', '=', 'booking.paket_id')
            ->join('lokasi', 'lokasi.id', '=', 'paket.lokasi_id')
            ->where('lokasi_id', $request->lokasi_id)
            ->where('tanggal', $request->tanggal)
            ->get();

        $lokasi = Lokasi::where('id', $request->lokasi_id)->first();

        $slot = $lokasi->slot_parkir;
        $waktu = [
            '09:00:00',
            '10:00:00',
            '11:00:00',
            '12:00:00',
            '13:00:00',
            '14:00:00',
            '15:00:00',
            '16:00:00',
            '17:00:00',
            '18:00:00',
            '19:00:00',
            '20:00:00'
        ];
        $waktu_loop = $waktu;
        $sisa = [];
        foreach ($waktu_loop as $key => $value) {
            $slot_terisi = DB::table('booking')
                ->join('paket', 'paket.id', '=', 'booking.paket_id')
                ->join('lokasi', 'lokasi.id', '=', 'paket.lokasi_id')
                ->where('lokasi_id', $request->lokasi_id)
                ->where('tanggal', $request->tanggal)
                ->where('waktu', $value)
                ->count();
            $sisa[$key] = $slot - $slot_terisi;
            if ($slot_terisi >= $slot) {
                unset($waktu[$key]);
                unset($sisa[$key]);
            }
        }
        return response()->json([
            'waktu' => $waktu,
            'sisa' => $sisa,
        ]);
    }
}
