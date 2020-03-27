<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class barangCont extends Controller
{
    public function index(){
        // Mengambil data barang
        $barang = barang::all();
    
        // Mengirim data barang ke view barang
        return view('barangs.index', ['barang' => $barang]);
    }

    public function tambah()
    {
        // Menampilkan view tambah barang
    	return view('barangTambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'id' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'harga' => 'required'
    	]);
 
        barang::create([
    		'id' => $request->id,
            'kode' => $request->kode,
            'nama' => $request->nama,
    		'keterangan' => $request->keterangan,
            'stock' => $request->stock,
            'harga' => $request->harga
        ]);
 
    	return redirect('/barang');
    }

    public function edit($id)
    {
        $barang = barang::find($id);

        return view('barangs.edit', ['barang' => $barang]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);

        $barang = barang::find($id);
        $barang->nama = $request->nama;
        $barang->keterangan =  $request->keterangan;
        $barang->stock = $request->stock;
        $barang->harga = $request->harga;
        $barang->save();

        return redirect('/barang');
    }

    public function delete($id)
    {
        $barang = barang::find($id);
        $barang->delete();
        
        return redirect('/barang');
    }
}
