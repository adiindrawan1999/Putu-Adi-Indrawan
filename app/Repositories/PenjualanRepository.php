<?php

namespace App\Repositories;

use App\Models\Penjualan;
use InfyOm\Generator\Common\BaseRepository;


class PenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'pelanggan_id',
        'pegawai_id',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penjualan::class;
    }
}
