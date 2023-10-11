@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Antrean</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Paket & Harga</th>
                            <th scope="col">Tanggal & Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $b)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $b->paket->lokasi->nama }}</td>
                            <td>{{ $b->paket->nama.' / Rp. '.number_format($b->paket->harga,2,',','.') }}</td>
                            <td>{{ date('d-m-Y', strtotime($b->tanggal)).' '.$b->waktu }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection