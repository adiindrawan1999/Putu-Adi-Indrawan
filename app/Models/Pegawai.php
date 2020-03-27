<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pegawai extends Model
{
    use SoftDeletes;

    public $table = 'pegawai';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'telp',
        'foto'
    ];
    // protected $dateFormat = 'Y-m-d';
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik' => 'string',
        'nama' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'string',
        'alamat' => 'string',
        'email' => 'string',
        'telp' => 'string',
        'foto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required|min:3',
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'email' => 'required|min:3|email',
        'telp' => 'required|between:5,20',
        'foto' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

    public function penjualan()
    {
        return $this->hasMany('\App\Models\Penjualan');
    }  
    
}
