<?php

return [
    'documents' => [
        'Duplicate Certificate' => [
            ['text' => 'Original CNIC/Form-B copy', 'icon' => 'fa-id-card'],
            ['text' => 'Previous DMC/Result Card copy', 'icon' => 'fa-file-alt'],
            ['text' => 'Challan/Receipt of payment', 'icon' => 'fa-receipt'],
            ['text' => 'Passport size photographs (2 copies)', 'icon' => 'fa-images'],
            ['text' => 'FIR Copy (in case of lost certificate)', 'icon' => 'fa-file-contract'],
        ],
        'Migration Certificate' => [
            ['text' => 'Original CNIC/Form-B copy', 'icon' => 'fa-id-card'],
            ['text' => 'Original DMC/Result Card', 'icon' => 'fa-file-alt'],
            ['text' => 'Challan/Receipt of payment', 'icon' => 'fa-receipt'],
            ['text' => 'NOC from previous institution', 'icon' => 'fa-file-contract'],
            ['text' => 'Character Certificate', 'icon' => 'fa-certificate'],
        ],
    ],
    
    'instructions' => [
        'Duplicate Certificate' => [
            ['text' => 'Fill all mandatory fields marked with asterisk (*)', 'icon' => 'fa-asterisk'],
            ['text' => 'Ensure all information provided is accurate and matches with original documents', 'icon' => 'fa-check-circle'],
            ['text' => 'Attach all required documents with the application form', 'icon' => 'fa-paperclip'],
            ['text' => 'All documents must be attested by a gazetted officer', 'icon' => 'fa-stamp'],
            ['text' => 'School Principal stamp is required on the application form', 'icon' => 'fa-building'],
            ['text' => 'Keep the payment receipt safe for future reference', 'icon' => 'fa-receipt'],
            ['text' => 'Processing time may take up to 15 working days', 'icon' => 'fa-clock'],
            ['text' => 'Track your application status using the receipt number', 'icon' => 'fa-search'],
        ],
        'Migration Certificate' => [
            ['text' => 'Fill all mandatory fields marked with asterisk (*)', 'icon' => 'fa-asterisk'],
            ['text' => 'Ensure all information provided is accurate and matches with original documents', 'icon' => 'fa-check-circle'],
            ['text' => 'Attach all required documents with the application form', 'icon' => 'fa-paperclip'],
            ['text' => 'All documents must be attested by a gazetted officer', 'icon' => 'fa-stamp'],
            ['text' => 'School Principal stamp is required on the application form', 'icon' => 'fa-building'],
            ['text' => 'NOC must be signed by the institution head', 'icon' => 'fa-signature'],
            ['text' => 'Processing time may take up to 7 working days', 'icon' => 'fa-clock'],
            ['text' => 'Track your application status using the receipt number', 'icon' => 'fa-search'],
        ],
    ],
];