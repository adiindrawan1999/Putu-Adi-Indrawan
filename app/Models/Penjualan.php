<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Penjualan extends Model
{
    use SoftDeletes;

    public $table = 'penjualan';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tanggal',
        'pelanggan_id',
        'pegawai_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
        'pelanggan_id' => 'integer',
        'pegawai_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'pelanggan_id' => 'required',
        'pegawai_id' => 'required',
        'total' => 'required'
    ];

    public function pelanggan()
    {
        return $this->belongsTo('\App\Models\Pelanggan');
    }

    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai');
    }

    public function detail_penjualan(){
        return $this->hasMany('\App\Models\DetailPenjualan');
    }

    public function detail(){
        return $this->belongsToMany(DetailPenjualan::class)->withPivot(['subtotal'])->withTimeStamps();
    }
    
}
