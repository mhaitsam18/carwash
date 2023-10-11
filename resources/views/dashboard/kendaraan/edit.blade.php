@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kendaraan</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <form action="/dashboard/kendaraan/{{ $kendaraan->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kendaraan</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $kendaraan->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk Kendaraan</label>
                <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" required autofocus value="{{ old('merk', $kendaraan->merk) }}">
                @error('merk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="warna" class="form-label">Warna Kendaraan</label>
                <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" required autofocus value="{{ old('warna', $kendaraan->warna) }}">
                @error('warna')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="plat_nomor" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="plat_nomor" name="plat_nomor" required autofocus value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}">
                @error('plat_nomor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            

            <button type="submit" class="btn btn-primary">Update Kendaraan</button>
        </form>

    </div>
@endsection