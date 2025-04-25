<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\DataTables\SemesterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Repositories\SemesterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Response;



class SemesterController extends AppBaseController
{
    /** @var  SemesterRepository */
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepo)
    {
        $this->semesterRepository = $semesterRepo;
    }
   
    /**
     * Display a listing of the Semester.
     *
     * @param SemesterDataTable $semesterDataTable
     * @return Response
     */
    

    // public function index()
    // {
    //     $semesters = Semester::all(); // Fetch all semesters from the database
    //     return view('semesters.index', compact('semesters')); // Pass data to view
    // }
    

    public function index()
{
    $semesters = Semester::with(['user', 'program'])
                        ->orderBy('created_at', 'desc') // Order by newest first
                        ->get();
    // Eager load the 'user' relationship to avoid N+1 query problem
    // $semesters = Semester::with('user','program')->get(); 

    return view('semesters.index', compact('semesters'));

    
}


    /**
     * Show the form for creating a new Semester.
     *
     * @return Response
     */
    public function create()
    {
        $programs = Program::all();  // Get all programs
        return view('semesters.create', compact( 'programs'));
        // return view('semesters.create');
    }

    /**
     * Store a newly created Semester in storage.
     *
     * @param CreateSemesterRequest $request
     *
     * @return Response
     */
    public function store(CreateSemesterRequest $request)
    {
        

        $input = $request->all();

        // Add the currently logged-in user's ID to the input array
        $input['created_by'] = Auth::id();

        $semester = $this->semesterRepository->create($input);

        Flash::success('Semester saved successfully.');

        return redirect(route('semesters.index'));
    }

    /**
     * Display the specified Semester.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        return view('semesters.show')->with('semester', $semester);
    }

    /**
     * Show the form for editing the specified Semester.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }
        

        return view('semesters.edit')->with('semester', $semester);
    }

    /**
     * Update the specified Semester in storage.
     *
     * @param  int              $id
     * @param UpdateSemesterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSemesterRequest $request)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        $semester = $this->semesterRepository->update($request->all(), $id);

        Flash::success('Semester updated successfully.');

        return redirect(route('semesters.index'));
    }

    /**
     * Remove the specified Semester from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        $this->semesterRepository->delete($id);

        Flash::success('Semester deleted successfully.');

        return redirect(route('semesters.index'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
    
        if (!$ids) {
            return redirect()->back()->with('error', 'No semesters selected.');
        }
    
        Semester::whereIn('id', $ids)->delete();
    
        return redirect()->back()->with('success', 'Selected semesters deleted successfully.');
    }
    
}
