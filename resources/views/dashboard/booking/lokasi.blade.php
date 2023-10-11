@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lokasi Outlet</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        @foreach ($lokasi as $l)
        <?php 
            $min_harga = DB::table('paket')->where('lokasi_id', $l->id)->min('harga'); 
            $max_harga = DB::table('paket')->where('lokasi_id', $l->id)->max('harga');
         ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://source.unsplash.com/800x1000/?carwash" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $l->nama }}</h5>
                            <p class="card-text">Alamat: {{ $l->alamat }}</p>
                            <p class="card-text"><small class="text-muted">{{ "Rp.".number_format($min_harga,2,',','.').' - '."Rp.".number_format($max_harga,2,',','.') }}</small></p>
                            <a href="/booking/booking?lokasi_id={{ $l->id }}" class="btn btn-success"><i class="fa-solid fa-money-check-pen"></i> Pesan</a>
                            <a href="/booking/daftarAntrean?lokasi_id={{ $l->id }}" class="btn btn-outline-info"><i class="fa-solid fa-list"></i> Daftar Antrean</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection