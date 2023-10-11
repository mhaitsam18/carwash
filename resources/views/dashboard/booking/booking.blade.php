@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Booking</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="/booking" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kendaraan_id" class="form-label">Kendaraan</label>
                        <select class="form-select @error('kendaraan_id') is-invalid @enderror" id="kendaraan_id" name="kendaraan_id" required autofocus>
                            <option value="" selected disabled>Pilih Kendaraan</option>
                            @foreach ($kendaraan as $k)
                                @if ($k->id == old('kendaraan_id'))
                                    <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>                        
                                @else
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>                        
                                @endif
                            @endforeach
                        </select>
                        @error('kendaraan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="lokasi_id" id="lokasi_id" value="{{ $lokasi->id }}">
                    <div class="mb-3">
                        <label for="lokasi_id" class="form-label">Lokasi</label>
                        <input class="form-control @error('lokasi_id') is-invalid @enderror" id="lokasi" name="lokasi" readonly value="{{ $lokasi->nama }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="lokasi_id" class="form-label">Lokasi</label>
                        <select class="form-select @error('lokasi_id') is-invalid @enderror" id="lokasi_id" name="lokasi_id" required autofocus>
                            <option value="" selected disabled>Pilih Lokasi</option>
                            @foreach ($lokasi as $l)
                                @if ($l->id == old('lokasi_id'))
                                    <option value="{{ $l->id }}" selected>{{ $l->nama }}</option>                        
                                @else
                                    <option value="{{ $l->id }}">{{ $l->nama }}</option>                        
                                @endif
                            @endforeach
                        </select>
                        @error('lokasi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    
                    <div class="mb-3">
                        <label for="paket_id" class="form-label">Paket</label>
                        <select class="form-select @error('paket_id') is-invalid @enderror" id="paket_id" name="paket_id" required autofocus>
                            <option value="" selected disabled>Pilih paket</option>
                            @foreach ($paket as $p)
                                @if ($p->id == old('paket_id'))
                                    <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>                        
                                @else
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>                        
                                @endif
                            @endforeach
                        </select>
                        @error('paket_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required autofocus>
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="waktu" class="form-label">Waktu Tersedia</label>
                            <select class="form-select @error('waktu') is-invalid @enderror" id="waktu" name="waktu" required autofocus>
                                <option value="">Pilih Waktu</option>
                            </select>
                            @error('waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    
        
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-book"></i>Pesan Sekarang</button>
                    <a href="https://api.whatsapp.com/send?phone=62{{ substr($lokasi->nomor_telepon,1) }}&text=Saya%20Butuh%20Bantuan" class="btn btn-success" target="_blank"><i class="fa-brands fa-whatsapp"></i> Chat WhatsApp</a>
                </form>

            </div>
        </div>

    </div>
    <script>
        const lokasi = document.querySelector('#lokasi_id');
        const paket = document.querySelector('#paket_id');
        const tanggal = document.querySelector('#tanggal');
        // const select = document.getElementById('paket_id');

        // lokasi.addEventListener('change', function() {
        //     fetch('/dashboard/fetchPaket?lokasi_id='+lokasi.value)
        //     .then(response => response.json())
        //     .then(data => {
        //         // console.log(data.paket[1].id);
        //         for(let i = 0; i < data.paket.length; i++){
        //             var opt = document.createElement('option');
        //             opt.value = data.paket[i].id;
        //             opt.innerHTML = data.paket[i].nama;
        //             paket.appendChild(opt);
        //         }
        //     });
 
        // });
        
        tanggal.addEventListener('change', function() {
            fetch('/dashboard/cekSlot?lokasi_id='+lokasi.value+'&tanggal='+tanggal.value)
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                for(let i = 0; i < data.waktu.length; i++){
                    var opt = document.createElement('option');
                    opt.value = data.waktu[i];
                    opt.innerHTML = data.waktu[i] + ' | Sisa ' +data.sisa[i]+ ' slot parkir';
                    waktu.appendChild(opt);
                }
            });
 
        });

    </script>
@endsection