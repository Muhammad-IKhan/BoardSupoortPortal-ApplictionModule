<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Request $request): void
    {
        view()->composer('abc', function ($view) {
            // You can share static data here
            $view->with('staticData', 'Static data for abc view');
        });

         // Retrieve data from the request
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
         $feeInWords = $this->convertNumberToWords($fee); // Assuming this method is defined
 
         // Share each variable with all views
         View::share('name', $name);
         View::share('father_name', $father_name);
         View::share('roll_number', $roll_number);
         View::share('class', $class);
         View::share('session', $session);
         View::share('year', $year);
         View::share('application', $application);
         View::share('Application', $Application);
         View::share('doc_paper_custom_amount', $doc_paper_custom_amount);
         View::share('fee', $fee);
         View::share('feeInWords', $feeInWords);
    }
 
    private function convertNumberToWords($number)
    {
        // Implement your conversion logic here
        return '...'; // Return the converted words
    }
    
}



