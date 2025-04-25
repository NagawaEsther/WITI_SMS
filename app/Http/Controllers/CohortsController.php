<?php

namespace App\Http\Controllers;

use App\DataTables\CohortsDataTable;
 // Add this line at the top of your controller
 use Illuminate\Http\Request;  // Add this at the top of your controller file

use App\Models\Cohorts;
use App\Models\User;

use App\Http\Requests;
use App\Http\Requests\CreateCohortsRequest;
use App\Http\Requests\UpdateCohortsRequest;
use App\Repositories\CohortsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CohortsController extends AppBaseController
{
    /** @var  CohortsRepository */
    private $cohortsRepository;

    public function __construct(CohortsRepository $cohortsRepo)
    {
        $this->cohortsRepository = $cohortsRepo;
    }

    /**
     * Display a listing of the Cohorts.
     *
     * @param CohortsDataTable $cohortsDataTable
     * @return Response
     */
    // public function index(CohortsDataTable $cohortsDataTable)
    // {
    //     return $cohortsDataTable->render('cohorts.index');
    // }
    public function index()
{
    $cohorts = Cohorts::all(); // Fetch all cohorts from database
    return view('cohorts.index', compact('cohorts')); // Pass it to the view
}

    /**
     * Show the form for creating a new Cohorts.
     *
     * @return Response
     */
    public function create()
    {
        return view('cohorts.create');
    }

    /**
     * Store a newly created Cohorts in storage.
     *
     * @param CreateCohortsRequest $request
     *
     * @return Response
     */
    // public function store(CreateCohortsRequest $request)
    // {
    //     $input = $request->all();

    //     $cohorts = $this->cohortsRepository->create($input);

        

    //     Flash::success('Cohorts saved successfully.');

    //     return redirect(route('cohorts.index'));
    // }

//     public function store(CreateCohortsRequest $request)
// {
//     $input = $request->all();

//     $cohort = $this->cohortsRepository->create($input);

//     // Use the cohort name in the success message
//     Flash::success("{$cohort->name} has been created successfully.");

//     return redirect(route('cohorts.index'));
// }

public function store(CreateCohortsRequest $request)
{
    $input = $request->all();

    $cohort = $this->cohortsRepository->create($input);

    // Ensure the cohort has a 'name' field before accessing it
    $cohortName = $cohort->name ?? 'Cohort';

    // Use session flash message
    session()->flash('success', "{$cohortName} has been created successfully.");

    return redirect(route('cohorts.index'));
}




    /**
     * Display the specified Cohorts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cohorts = $this->cohortsRepository->find($id);

        if (empty($cohorts)) {
            Flash::error('Cohorts not found');

            return redirect(route('cohorts.index'));
        }

        return view('cohorts.show')->with('cohorts', $cohorts);
    }

    

    /**
     * Show the form for editing the specified Cohorts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cohorts = $this->cohortsRepository->find($id);

        if (empty($cohorts)) {
            Flash::error('Cohorts not found');

            return redirect(route('cohorts.index'));
        }

    

        return view('cohorts.edit')->with('cohorts', $cohorts);
    }

    /**
     * Update the specified Cohorts in storage.
     *
     * @param  int              $id
     * @param UpdateCohortsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateCohortsRequest $request)
    // {
    //     $cohorts = $this->cohortsRepository->find($id);

    //     if (empty($cohorts)) {
    //         Flash::error('Cohorts not found');

    //         return redirect(route('cohorts.index'));
    //     }

    //     $cohorts = $this->cohortsRepository->update($request->all(), $id);

    //     Flash::success('Cohorts updated successfully.');

    //     return redirect(route('cohorts.index'));
    // }

    public function update(Request $request, $id)
{
    // Define validation rules
    $request->validate([
        'name' => 'required|string|max:255|unique:cohorts,name,' . $id, // Ensure name is unique except for the current record
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date', // Ensure end date is after start date
        'status' => 'required|in:active,inactive', // Only allow "active" or "inactive"
        'expected_graduation_date' => 'nullable|date', // Make sure the expected graduation date is valid (nullable if optional)
        'curriculum' => 'required|in:old,new', // Ensure curriculum is either 'old' or 'new'
        'number_of_students' => 'required|integer', // Ensure number of students is an integer
    ]);

    // Find the cohort and update
    $cohort = Cohorts::findOrFail($id);
    $cohort->update($request->all());

    return redirect()->route('cohorts.index')->with('success', 'Cohort updated successfully.');
}

     /**
     * Remove the specified Cohorts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cohorts = $this->cohortsRepository->find($id);

        if (empty($cohorts)) {
            Flash::error('Cohorts not found');

            return redirect(route('cohorts.index'));
        }

        $this->cohortsRepository->delete($id);

        Flash::success('Cohorts deleted successfully.');

        return redirect(route('cohorts.index'));
    }

    public function bulkDelete(Request $request)
    {
        $ids = explode(',', $request->input('ids'));

        Cohorts::destroy($ids);

        return redirect()->route('cohorts.index')->with('success', 'Selected cohorts deleted successfully.');
    }
}
