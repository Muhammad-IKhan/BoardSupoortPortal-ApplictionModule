<?php

namespace App\Services;

use App\Models\{Year, Head, Student, Breakdown, Receipt, Application};
use Carbon\Carbon;

class RGeneratingService 
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Generate a receipt number within a specified range
     * 
     * @param int $start Starting number of the range
     * @param int $end Ending number of the range
     * @return string
     */
    public function generateReceiptNumber($start = 100000, $end = 999999)
    {
        // First check if there are any existing receipt numbers
        $lastReceipt = Receipt::orderBy('id', 'desc')->first();
        
        if ($lastReceipt) {
            // Extract the numeric part from the last receipt
            $lastNumber = intval(substr($lastReceipt->receipt_number, -6));
            
            // Increment the last number by 1
            $nextNumber = $lastNumber + 1;
            
            // If next number exceeds the range, start from beginning
            if ($nextNumber > $end) {
                $nextNumber = $start;
            }
        } else {
            // If no receipts exist, start from the beginning of range
            $nextNumber = $start;
        }

        // Format the date part
        $datePrefix = Carbon::now()->format('ymd');
        
        // Combine date and sequential number
        // The number will be padded with zeros to maintain consistent length
        return $datePrefix . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
    }
}