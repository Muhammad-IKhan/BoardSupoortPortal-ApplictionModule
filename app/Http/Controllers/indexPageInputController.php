<?php

namespace App\Http\Controllers;

use App\Models\{Year, Head, Student, BasicInfoBreakdown};
use App\Http\Requests\IndexPageRequest;
use App\Helpers\{StuBasicInfoHelper, RctAppHelper};
use App\Services\RGeneratingService;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Support\Facades\{DB, Log};
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;
use Exception;



class IndexPageInputController extends Controller
{
    private $stuBasicInfoHelper;

    public function __construct(StuBasicInfoHelper $stuBasicInfoHelper)
    {
        $this->stuBasicInfoHelper = $stuBasicInfoHelper;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the application creation form
     *
     */
     public function create()
    { 
        //
    }

    /**
     * Store the.....
     * @param abc $abc
     * @param xyz $xyz
     *  @treturn \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(IndexPageRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $requestId = uniqid('req_');

        Log::info('Starting student creation process', [
            'request_id' => $requestId,
            'data' => $validatedData
        ]);

        try {
            DB::beginTransaction();   // Optionally start a transaction


            [$student, $basicInfoBreakdown] = $this->stuBasicInfoHelper->createStuWithBasicInfo($validatedData);

            // In your service provider or controller:
            $rGeneratingService = new RGeneratingService();
            $rctAppHelper = new RctAppHelper($rGeneratingService);

            // Then use it:
            [$Receipt, $Application] = $rctAppHelper->createRctWithApplication($student, $basicInfoBreakdown, $validatedData);

            DB::commit();  // Commit the transaction if used


            Log::info('Student creation successful', [
                'request_id' => $requestId,
                'student_id' => $student->id,
                'breakdown_id' => $basicInfoBreakdown->id
            ]);
            $application = Head::findOrFail($validatedData['application']);
            $application_code = $application->head_code;

            return redirect()->route('applications.create', [
                'name' => $validatedData['name'],
                'father_name' => $validatedData['father_name'],
                'roll_number' => $validatedData['roll_number'],
                'class' => $validatedData['class'],
                'session' => $validatedData['session'],
                'year' => $validatedData['year'],
                //its appliction code or head_code
                'application' => $application_code,
                'Application' => $validatedData['Application'],
                'doc_paper_custom_amount' => $validatedData['doc_paper_custom_amount'],
                'fee' => $validatedData['fee'],
            ])->with('success', 'Student information saved successfully');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Student creation failed', [
                'request_id' => $requestId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withErrors(['error' => $this->getErrorMessage($e)])
                ->withInput();
        }
    }

    private function getErrorMessage(\Exception $e): string
    {
        return match(true) {
            $e instanceof \PDOException => 'Database error occurred. Please try again.',
            $e instanceof \InvalidArgumentException => $e->getMessage(),
            default => 'An unexpected error occurred. Please try again.'
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
