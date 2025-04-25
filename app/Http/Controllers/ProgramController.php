<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Repositories\ProgramRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Program;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Auth;


class ProgramController extends AppBaseController
{
    /** @var  ProgramRepository */
    private $programRepository;

    public function __construct(ProgramRepository $programRepo)
    {
        $this->programRepository = $programRepo;
    }

    /**
     * Display a listing of the Program.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $programs = Program::with(['user'])
        ->orderBy('created_at', 'desc') // Order by newest first
        ->get();
        return view('programs.index', compact('programs'));
        // $programs = $this->programRepository->all();

        // return view('programs.index')
        //     ->with('programs', $programs);
    }

    /**
     * Show the form for creating a new Program.
     *
     * @return Response
     */
    public function create()
    {
        return view('programs.create');
    }

//     public function showApplyForm()
// {
//     $programs = Program::all(); // Fetch all programs
//     return view('apply', compact('programs')); // Pass it to the view
// }

    /**
     * Store a newly created Program in storage.
     *
     * @param CreateProgramRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramRequest $request)
    {
        $input = $request->all();

        // Add the currently logged-in user's ID to the input array
         $input['created_by'] = Auth::id();

        $program = $this->programRepository->create($input);

        Flash::success('Program saved successfully.');

        return redirect(route('programs.index'));
    }

    /**
     * Display the specified Program.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('programs.index'));
        }

        return view('programs.show')->with('program', $program);
    }

    /**
     * Show the form for editing the specified Program.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('programs.index'));
        }

        return view('programs.edit')->with('program', $program);
    }

    /**
     * Update the specified Program in storage.
     *
     * @param int $id
     * @param UpdateProgramRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramRequest $request)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('programs.index'));
        }

        $program = $this->programRepository->update($request->all(), $id);

        Flash::success('Program updated successfully.');

        return redirect(route('programs.index'));
    }

    /**
     * Remove the specified Program from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('programs.index'));
        }

        $this->programRepository->delete($id);

        Flash::success('Program deleted successfully.');

        return redirect(route('programs.index'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = explode(',', $request->input('ids'));

        Program::destroy($ids);

        return redirect()->route('programs.index')->with('success', 'Selected programs deleted successfully.');
    }
}


