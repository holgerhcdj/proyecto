<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTiposRequest;
use App\Http\Requests\UpdateTiposRequest;
use App\Repositories\TiposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TiposController extends AppBaseController
{
    /** @var  TiposRepository */
    private $tiposRepository;

    public function __construct(TiposRepository $tiposRepo)
    {
        $this->tiposRepository = $tiposRepo;
    }

    /**
     * Display a listing of the Tipos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipos = $this->tiposRepository->all();///SELECT * FROM tipos

        return view('tipos.index')///Carpeta Tipos index.blade.php
            ->with('tipos', $tipos) ;//LLevando la variable
    }

    /**
     * Show the form for creating a new Tipos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created Tipos in storage.
     *
     * @param CreateTiposRequest $request
     *
     * @return Response
     */
    public function store(CreateTiposRequest $request)
    {
        $input = $request->all();

        $tipos = $this->tiposRepository->create($input); //INSERT INTO 

        Flash::success('Tipos saved successfully.');

        return redirect(route('tipos.index'));
    }

    /**
     * Display the specified Tipos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipos = $this->tiposRepository->find($id);

        if (empty($tipos)) {
            Flash::error('Tipos not found');

            return redirect(route('tipos.index'));
        }

        return view('tipos.show')->with('tipos', $tipos);
    }

    /**
     * Show the form for editing the specified Tipos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipos = $this->tiposRepository->find($id);

        if (empty($tipos)) {
            Flash::error('Tipos not found');

            return redirect(route('tipos.index'));
        }

        return view('tipos.edit')->with('tipos', $tipos);
    }

    /**
     * Update the specified Tipos in storage.
     *
     * @param int $id
     * @param UpdateTiposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTiposRequest $request)
    {
        $tipos = $this->tiposRepository->find($id);

        if (empty($tipos)) {
            Flash::error('Tipos not found');
            return redirect(route('tipos.index'));
        }

        $tipos = $this->tiposRepository->update($request->all(), $id);//UPDATE 

        Flash::success('Tipos updated successfully.');

        return redirect(route('tipos.index'));
    }

    /**
     * Remove the specified Tipos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipos = $this->tiposRepository->find($id);

        if (empty($tipos)) {
            Flash::error('Tipos not found');

            return redirect(route('tipos.index'));
        }

        $this->tiposRepository->delete($id);

        Flash::success('Tipos deleted successfully.');

        return redirect(route('tipos.index'));
    }
}
