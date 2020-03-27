<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Repositories\PelangganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PelangganController extends AppBaseController
{
    /** @var  PelangganRepository */
    private $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepo)
    {
        $this->pelangganRepository = $pelangganRepo;
    }

    /**
     * Display a listing of the Pelanggan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pelanggan = Pelanggan::all();

        return view('pelanggan.index')
            ->with('pelanggan', $pelanggan);
    }

    /**
     * Show the form for creating a new Pelanggan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created Pelanggan in storage.
     *
     * @param CreatePelangganRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganRequest $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required'
    	]);
 
        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
    		'telp' => $request->telp
        ]);

        Flash::success('Pelanggan saved successfully.');

        return redirect(route('pelanggan.index'));
    }

    /**
     * Display the specified Pelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        return view('pelanggan.show')->with('pelanggan', $pelanggan);
    }

    /**
     * Show the form for editing the specified Pelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        return view('pelanggan.edit')->with('pelanggan', $pelanggan);
    }

    /**
     * Update the specified Pelanggan in storage.
     *
     * @param  int              $id
     * @param UpdatePelangganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganRequest $request)
    {
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        $pelanggan = $this->pelangganRepository->update($request->all(), $id);

        Flash::success('Pelanggan updated successfully.');

        return redirect(route('pelanggan.index'));
    }

    /**
     * Remove the specified Pelanggan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        $this->pelangganRepository->delete($id);

        Flash::success('Pelanggan deleted successfully.');

        return redirect(route('pelanggan.index'));
    }
}
