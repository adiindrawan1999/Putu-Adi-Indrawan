<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Repositories\BarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Barang;
use DB;
class BarangController extends AppBaseController
{
    /** @var  BarangRepository */
    private $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Barang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangs = barang::all();
        return view('barangs.index')->with('barangs', $barangs);
    }

    /**
     * Show the form for creating a new Barang.
     *
     * @return Response
     */
    public function create()
    {
        return view('barangs.create');
    }

    /**
     * Store a newly created Barang in storage.
     *
     * @param CreateBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangRequest $request)
    {
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'harga' => 'required'
    	]);
 
        Barang::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
    		'keterangan' => $request->keterangan,
            'stock' => $request->stock,
            'harga' => $request->harga
        ]);

        Flash::success('Barang saved successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Display the specified Barang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        return view('barangs.show')->with('barang', $barang);
    }

    /**
     * Show the form for editing the specified Barang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
       
        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        return view('barangs.edit')->with('barang', $barang);
    }

    /**
     * Update the specified Barang in storage.
     *
     * @param  int              $id
     * @param UpdateBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangRequest $request)
    {
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);

        $barang = Barang::find($id);
        $barang->kode = $request->kode;
        $barang->nama = $request->nama;
        $barang->keterangan =  $request->keterangan;
        $barang->stock = $request->stock;
        $barang->harga = $request->harga;
        $barang->save();

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $barang = $this->barangRepository->update($request->all(), $id);

        Flash::success('Barang updated successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Remove the specified Barang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $barang = Barang::find($id);
        $barang->delete();

        Flash::success('Barang deleted successfully.');

        return redirect(route('barangs.index'));
    }
    
    public function search($id){
        $barang = Barang::find($id);
        return $barang;
    }
}
