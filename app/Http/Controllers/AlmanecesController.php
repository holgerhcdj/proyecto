<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlmanecesRequest;
use App\Http\Requests\UpdateAlmanecesRequest;
use App\Repositories\AlmanecesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AlmanecesController extends AppBaseController
{
    /** @var  AlmanecesRepository */
    private $almanecesRepository;

    public function __construct(AlmanecesRepository $almanecesRepo)
    {
        $this->almanecesRepository = $almanecesRepo;
    }

    /**
     * Display a listing of the Almaneces.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $almaneces = $this->almanecesRepository->all();

        return view('almaneces.index')
            ->with('almaneces', $almaneces);
    }

    /**
     * Show the form for creating a new Almaneces.
     *
     * @return Response
     */
    public function create()
    {
        return view('almaneces.create');
    }

    /**
     * Store a newly created Almaneces in storage.
     *
     * @param CreateAlmanecesRequest $request
     *
     * @return Response
     */
    public function store(CreateAlmanecesRequest $request)
    {
        $input = $request->all();

        $almaneces = $this->almanecesRepository->create($input);

        Flash::success('Almaneces saved successfully.');

        return redirect(route('almaneces.index'));
    }

    /**
     * Display the specified Almaneces.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $almaneces = $this->almanecesRepository->find($id);

        if (empty($almaneces)) {
            Flash::error('Almaneces not found');

            return redirect(route('almaneces.index'));
        }

        return view('almaneces.show')->with('almaneces', $almaneces);
    }

    /**
     * Show the form for editing the specified Almaneces.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $almaneces = $this->almanecesRepository->find($id);

        if (empty($almaneces)) {
            Flash::error('Almaneces not found');

            return redirect(route('almaneces.index'));
        }

        return view('almaneces.edit')->with('almaneces', $almaneces);
    }

    /**
     * Update the specified Almaneces in storage.
     *
     * @param int $id
     * @param UpdateAlmanecesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlmanecesRequest $request)
    {
        $almaneces = $this->almanecesRepository->find($id);

        if (empty($almaneces)) {
            Flash::error('Almaneces not found');

            return redirect(route('almaneces.index'));
        }

        $almaneces = $this->almanecesRepository->update($request->all(), $id);

        Flash::success('Almaneces updated successfully.');

        return redirect(route('almaneces.index'));
    }

    /**
     * Remove the specified Almaneces from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $almaneces = $this->almanecesRepository->find($id);

        if (empty($almaneces)) {
            Flash::error('Almaneces not found');

            return redirect(route('almaneces.index'));
        }

        $this->almanecesRepository->delete($id);

        Flash::success('Almaneces deleted successfully.');

        return redirect(route('almaneces.index'));
    }
}
