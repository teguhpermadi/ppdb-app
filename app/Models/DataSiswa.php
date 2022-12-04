<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

}
