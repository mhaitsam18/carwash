<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'booking';
    protected $with = ['paket', 'kendaraan'];

    public function scopeAntrean($query, $lokasi_id)
    {
        // $query->when($lokasi_id ?? false, function ($query, $lokasi_id) {
        //     return $query->whereHas('paket', function ($query) use ($lokasi_id) {
        //         $query->where('lokasi_id', $lokasi_id);
        //     });
        // });
        $query->when(
            $lokasi_id ?? false,
            fn ($query, $lokasi_id) =>
            $query->whereHas(
                'paket',
                fn ($query) =>
                $query->where('lokasi_id', $lokasi_id)
            )
        );
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }


    // public function lokasi()
    // {
    //     return $this->belongsTo(Lokasi::class);
    // }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
