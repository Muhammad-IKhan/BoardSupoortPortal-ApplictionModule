<?

namespace App\View\Composers;

use Illuminate\View\View;

class SharedDataComposer
{
    public function compose(View $view)
    {
        $view->with([
            'name' => session('name'),
            'father_name' => session('father_name'),
            'roll_number' => session('roll_number'),
            'class' => session('class'),
            'session' => session('session'),
            'year' => session('year'),
            'application' => session('application'),
            'Application' => session('Application'),
            'doc_paper_custom_amount' => session('doc_paper_custom_amount'),
            'fee' => session('fee'),
            'feeInWords' => session('feeInWords'),
        ]);
    }
}
