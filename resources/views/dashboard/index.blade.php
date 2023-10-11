@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->nama }}</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row mb-3">
        <!-- Button trigger modal -->
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createKendaraanModal">
                Tambah Data Kendaraan
            </button>
            <a href="booking" class="btn btn-success">
                Booking
            </a>
        </div>
    </div>
    <div class="card">
        <h4 class="card-header">Kendaraan Saya</h4>
        <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Warna</th>
                        <th scope="col">Plat Nomor</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kendaraan as $k)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->merk }}</td>
                            <td>{{ $k->warna }}</td>
                            <td>{{ $k->plat_nomor }}</td>
                            <td>
                                <a href="/dashboard/kendaraan/{{ $k->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/dashboard/kendaraan/{{ $k->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are Your Sure?')"><span data-feather="x-circle"></span></button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createKendaraanModal" tabindex="-1" aria-labelledby="createKendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createKendaraanModalLabel">Form Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/kendaraan" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kendaraan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk Kendaraan</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" required autofocus value="{{ old('merk') }}">
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna Kendaraan</label>
                            <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" required autofocus value="{{ old('warna') }}">
                            @error('warna')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="plat_nomor" class="form-label">Plat Nomor</label>
                            <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="plat_nomor" name="plat_nomor" required autofocus value="{{ old('plat_nomor') }}">
                            @error('plat_nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection