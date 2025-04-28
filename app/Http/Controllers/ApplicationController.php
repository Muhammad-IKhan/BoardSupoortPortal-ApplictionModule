<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ConversionService;

class ApplicationController extends Controller
{
    protected $conversionService;

    public function __construct(ConversionService $conversionService)
    {
        $this->conversionService = $conversionService;
    }

    public function create(Request $request)
    {
        // Retrieve data/parameters from the request
        $name = $request->query('name');
        $father_name = $request->query('father_name');
        $roll_number = $request->query('roll_number');
        $class = $request->query('class');
        $session = $request->query('session');
        $year = $request->query('year');
        $application = $request->query('application');
        $Application = $request->query('Application');
        $doc_paper_custom_amount = $request->query('doc_paper_custom_amount');
        $fee = $request->query('fee');
        $feeInWords = $this->conversionService->convert_number_to_words($fee);

        // Store data in session
        session(compact('name', 'father_name', 'roll_number', 'class', 'session', 'year', 'application', 'Application', 'doc_paper_custom_amount', 'fee', 'feeInWords'));

        // Redirect to renderApplicationFilling
        return redirect()->route('applicationFilling.render');
    }

    public function renderApplicationFilling(Request $request): \Illuminate\View\View
    {
        $storeSessionData = session()->only([
            'name', 'father_name', 'roll_number', 'class', 'session', 
            'year', 'application', 'Application', 'doc_paper_custom_amount', 
            'fee', 'feeInWords', 'receiptNumber',
        ]);
    
        // Determine the application type and office section
        $applicationType = $storeSessionData['Application'] ?? null;
        $officeSection = $this->getOfficeSection($applicationType);
    
        // Store officeSection in session
        session(['officeSection' => $officeSection]);
    
        // Retrieve all session data, including officeSection, for the view
        $storeSessionData = session()->all();
    
        // Determine the view based on application type
        $applicationView = $this->getApplicationView($applicationType);
    
        // Return the view with session data
        return view($applicationView, $storeSessionData);
    }

    private function getApplicationView(string $applicationType): string
    {
        $views = [
            'Migration' => 'applications.migration-form',
            'Verification' => 'applications.verification-form',
            'IBCC Verification' => 'applications.ibcc-verification-form',
            'Duplicate DMC' => 'applications.duplicate-dmc-form',
            'Revised DMC' => 'applications.revised-dmc-form',
            'Duplicate Certificate' => 'applications.duplicate-certificate-form',
            'Revised Certificate' => 'applications.revised-certificate-form',
            'UFM Appeal' => 'applications.ufm-appeal-form',
            'Centre Change' => 'applications.centre-change-form',
            'Re-totalling' => 'applications.re-totalling-form',
            'Result / Gazette Fee' => 'applications.result-gazette-fee-form',
            'Centre Creation Fee' => 'applications.centre-creation-fee-form',
            'Correction by Court Degree' => 'applications.correction-by-court-degree-form',
            'Un-natural Gap Correction' => 'applications.un-natural-gap-correction-form',
            'Spelling / Vowel Correction' => 'applications.spelling-vowel-correction-form',
            'Correction by AWR' => 'applications.correction-by-awr-form',
            'Miscellaneous Fee' => 'applications.miscellaneous-fee-form',
            'Papers Cancellation' => 'applications.papers-cancellation-form',
            'Grace Marks' => 'applications.grace-marks-form',
            'Jury Appeal' => 'applications.jury-appeal-form',
            'Migration Cancellation' => 'applications.migration-cancellation-form',
        ];

        return $views[$applicationType] ?? 'applications.default';
    }

    protected function getOfficeSection($applicationType)
    {
        $mapping = config('application-mapping.application_to_office_mapping');
        return $mapping[$applicationType] ?? 'One Window Section';
    }
}

