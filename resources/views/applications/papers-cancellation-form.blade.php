@extends('layouts.app')


@section('title', 'Application Form - ' . session('Application', 'BISE Bannu'))

@section('content')
    <div class="container-fluid">
        <!-- Main Header -->
        <div class="row main-header">
            <div class="col-2 ms-auto">
                <img src="{{ asset('images/biseb.png') }}" alt="BISE Bannu Logo" class="header-logo">
            </div>
            <div class="col-10 text-start">
                <h1 class="board-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BOARD OF INTERMEDIATE AND SECONDARY EDUCATION BANNU KPK</h1>
                <h6 class="text-muted mt-0 ms-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kohat Road Township Bannu, Tel:0928-123123  Website: www.biseb.edu.pk Email: admin@biseb.edu.pk</h6>
                <h3 class="display-7 pt-2 mb-0 text-center font-weight-bold">
                    @php
                        $officeSection = session('officeSection', 'ONE WINDOW SECTION');
                    @endphp
                    {{ $officeSection }}
                </h3>                
            </div>
        </div>

        <div class="col-12 text-center">
            <div class="border-bottom border-2 pb-2 text-success large-bold-text"> 
                <div class="pt-5"></div>

               <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Application For {{ session('Application', 'BISE Bannu') }}</h2>
                <span><h6 class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>AFTER FILLING THE APPLICATION ATTACH RECEIPT AND REQUIRED DOCUMENTS MENTIONED BELOW</u></h6></span>
            </div>
        </div>

        <hr>

        <!-- Application Form -->
        <form id="applicationForm" method="POST" action="{{ route('prints.create') }}">
            @csrf
            
            <!-- Student Details Section -->
            <div class="content-section">
                <div class="row">
                    <h3 class="form-section-title">Student Details</h3>
                    <div class="col-md-4 mb-3">
                        <label for="name" class="form-label required">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ session('name') }}" required>
                        @if(session('name'))
                            <input type="hidden" name="hidden_name" value="{{ session('name') }}">
                        @endif
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="father_name" class="form-label required">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="{{ session('father_name') }}" required>
                        @if(session('father_name'))
                            <input type="hidden" name="hidden_father_name" value="{{ session('father_name') }}">
                        @endif
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="cnic" class="form-label required">CNIC/Form-B Number</label>
                        <input type="text" class="form-control" id="cnic" name="cnic" pattern="\d{5}-\d{7}-\d{1}" placeholder="00000-0000000-0" value="{{ session('cnic') }}" required>
                        @if(session('cnic'))
                            <input type="hidden" name="hidden_cnic" value="{{ session('cnic') }}">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Academic Details Section -->
            <div class="content-section">
                <div class="row">
                    <h3 class="form-section-title">Academic Details</h3>
                    <div class="col-md-3 mb-3">
                        <label for="roll_number" class="form-label required">Roll Number</label>
                        <input type="text" class="form-control" id="roll_number" name="roll_number" value="{{ session('roll_number') }}" required>
                        @if(session('roll_number'))
                            <input type="hidden" name="hidden_roll_number" value="{{ session('roll_number') }}">
                        @endif
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="examination" class="form-label required">Class</label>
                        <select class="form-select" id="examination" name="examination" required>
                            <option value="">Select Examination</option>
                            <option value="9th" {{ session('class') == '9th' ? 'selected' : '' }}>9th (SSC/Matric)</option>
                            <option value="10th" {{ session('class') == '10th' ? 'selected' : '' }}>10th (SSC/Matric)</option>
                            <option value="11th" {{ session('class') == '11th' ? 'selected' : '' }}>11th (HSSC/Intermediate)</option>
                            <option value="12th" {{ session('class') == '12th' ? 'selected' : '' }}>12th (HSSC/Intermediate)</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="session" class="form-label required">Session</label>
                        <select class="form-select" id="session" name="session" required>
                            <option value="">Select Session</option>
                            <option value="A-I" {{ session('session') == 'A-I' ? 'selected' : '' }}>A-I (Annual)</option>
                            <option value="A-II" {{ session('session') == 'A-II' ? 'selected' : '' }}>A-II (Supply)</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="year" class="form-label required">Year of Passing</label>
                        <input type="text" class="form-control" id="year" name="year" min="1980" max="{{ date('Y') }}" value="{{ session('year') }}" required>
                        @if(session('year'))
                            <input type="hidden" name="hidden_year" value="{{ session('year') }}">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Receipt Details Section -->
            <div class="content-section">
                <div class="row">
                    <h3 class="form-section-title">Receipt Details</h3>
                    <div class="col-md-3 mb-3">
                        <label for="challan_no" class="form-label">Challan/Receipt Number</label>
                        <input type="text" class="form-control" id="challan_no" name="challan_no" value="{{ session('receiptNumber') }}" readonly>
                        @if(session('receiptNumber'))
                            <input type="hidden" name="hidden_receipt_number" value="{{ session('receiptNumber') }}">
                        @endif
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="amount" class="form-label">Amount Paid</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ session('fee') }}" readonly>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="payment_bank" class="form-label required">Bank</label>
                        <select class="form-select" id="payment_bank" name="payment_bank" required>
                            <option value="">Select Bank</option>
                            <option value="bank-1">Bank 1</option>
                            <option value="bank-2">Bank 2</option>
                            <option value="bank-3">Bank 3</option>
                            <option value="bank-4">Bank 4</option>
                            <option value="bank-5">Bank 5</option>
                            <option value="bank-6">Bank 6</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="payment_date" class="form-label required">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                    </div>
                </div>
            </div>


            <!-- Documents 1 -->
            <div class="content-section">
                <div class="row">
                    <div class="col-12">
                        <h3 class="form-section-title">Required Documents 1st Sample</h3>
                        <ul class="list-group">
                            @php
                                $applicationType = session('Application', 'Duplicate Certificate');
                                $documents = config('documents.documents.' . $applicationType, [
                                    'Original CNIC/Form-B copy',
                                    'Previous DMC/Result Card copy',
                                    'Challan/Receipt of payment',
                                    'Passport size photographs (2 copies)'
                                ]);
                            @endphp
                            
                            @foreach($documents as $document)
                                <li class="list-group-item">{{ $document }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Required Documents 2 Information Section -->
            <div class="content-section">
                <div class="row">
                    <div class="col-12">
                        <h3 class="form-section-title">
                            <i class="fas fa-file-alt me-2"></i>Required Documents 2st Sample
                        </h3>
                        <ul class="list-group document-list"> 
                            @php
                                $applicationType = session('Application', 'Duplicate Certificate');
                                // Check if documents exist in config, otherwise use default
                                $documents = config('documents.documents.' . $applicationType);
                                
                                if (empty($documents)) {
                                    $documents = [
                                    ['text' => 'Original CNIC/Form-B copy', 'icon' => 'fa-id-card'],
                                    ['text' => 'Previous DMC/Result Card copy', 'icon' => 'fa-file-alt'],
                                    ['text' => 'Challan/Receipt of payment', 'icon' => 'fa-receipt'],
                                    ['text' => 'Passport size photographs (2 copies)', 'icon' => 'fa-images']
                                    ];
                                }
                            @endphp
                            
                            @foreach($documents as $document)
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas {{ $document['icon'] }} text-primary me-3"></i>
                                {{ $document['text'] }}
                            </li>
                            @endforeach
                        </ul>
                        
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle"></i>
                            <strong>Note:</strong> All documents must be attested by a gazetted officer.
                        </div>

                        <div class="attestation-box mt-4 p-3 border rounded bg-light">
                            <div class="attestation-item mb-2">
                                <i class="fas fa-stamp text-danger me-2"></i>
                                <strong>Attestation Required:</strong> All documents must be attested by a gazetted officer
                            </div>
                            <div class="attestation-item">
                                <i class="fas fa-building text-primary me-2"></i>
                                <strong>School Verification:</strong> Principal stamp is mandatory on the application form
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <!-- Required Documents  Section  3-->
            <div class="content-section">
            <div class="row">
            <div class="col-12">
                <h3 class="form-section-title">
                    <i class="fas fa-file-alt me-2"></i>Required Documents 3rd Sample
                </h3>
                <div class="row">
                    <!-- Stack Icons for Attestation -->
                    <div class="col-md-3">
                        <div class="attestation-stack p-4 text-center">
                            <div class="stack-icon mb-3">
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fas fa-stamp fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h5 class="stack-title">Attestation Required</h5>
                            <p class="stack-text">All documents must be attested by a gazetted officer</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="attestation-stack p-4 text-center">
                            <div class="stack-icon mb-3">
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fas fa-stamp fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h5 class="stack-title">Attestation Required</h5>
                            <p class="stack-text">All documents must be attested by a gazetted officer</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="attestation-stack p-4 text-center">
                            <div class="stack-icon mb-3">
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x text-success"></i>
                                    <i class="fas fa-building fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h5 class="stack-title">School Verification</h5>
                            <p class="stack-text">Principal stamp is mandatory on the application form</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="attestation-stack p-4 text-center">
                            <div class="stack-icon mb-3">
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x text-success"></i>
                                    <i class="fas fa-building fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h5 class="stack-title">School Verification</h5>
                            <p class="stack-text">Principal stamp is mandatory on the application form</p>
                        </div>
                    </div>
                </div>

                <!-- Required Documents List - Smaller Version -->
                <div class="required-docs mt-0">
                    <div class="row">
                        @php
                            $applicationType = session('Application', 'Duplicate Certificate');
                            $documents = config('documents.documents.' . $applicationType);
                            
                            if (empty($documents)) {
                                $documents = [
                                    ['text' => 'Original CNIC/Form-B copy', 'icon' => 'fa-id-card'],
                                    ['text' => 'Previous DMC/Result Card copy', 'icon' => 'fa-file-alt'],
                                    ['text' => 'Challan/Receipt of payment', 'icon' => 'fa-receipt'],
                                    ['text' => 'Passport size photographs (2 copies)', 'icon' => 'fa-images']
                                ];
                            }
                        @endphp
                        
                        @foreach($documents as $document)
                        <div class="col-md-6">
                            <div class="document-item d-flex align-items-center mb-2 p-2">
                                <div class="doc-icon me-3">
                                    <i class="fas {{ $document['icon'] }} text-primary"></i>
                                </div>
                                <div class="doc-text">{{ $document['text'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
            </div>

            <!-- Student Contact Information Section -->
            <div class="content-section">
                <div class="row">
                    <h3 class="form-section-title">Student Contact Information</h3>
                    
                    <div class="col-md-6 mb-3">
                        <label for="permanent_address" class="form-label required">Permanent Address</label>
                        <textarea class="form-control" id="permanent_address" name="permanent_address" rows="3" required></textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="postal_address" class="form-label required">Postal Address</label>
                        <textarea class="form-control" id="postal_address" name="postal_address" rows="3" required></textarea>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="same_as_permanent">
                            <label class="form-check-label" for="same_as_permanent">Same as Permanent Address</label>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="contact_no" class="form-label required">Contact Number</label>
                        <input type="tel" class="form-control" id="contact_no" name="contact_no" required>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>

            <!-- Instructions Section -->
            <div class="content-section">
                <div class="row">
                    <div class="col-12">
                        <h3 class="form-section-title">
                            <i class="fas fa-info-circle me-2"></i>Instructions
                        </h3>
                        @php
                            $instructions = config('documents.instructions.' . $applicationType, [
                                ['text' => 'Fill all mandatory fields marked with asterisk (*)', 'icon' => 'fa-asterisk'],
                                ['text' => 'Ensure all information provided is accurate', 'icon' => 'fa-check-circle'],
                                ['text' => 'Attach all required documents', 'icon' => 'fa-paperclip'],
                                ['text' => 'Keep the payment receipt safe', 'icon' => 'fa-receipt'],
                                ['text' => 'Processing time may take up to 15 working days', 'icon' => 'fa-clock']
                            ]);
                        @endphp
                        
                        <div class="instruction-list">
                            @foreach($instructions as $index => $instruction)
                                <div class="instruction-item d-flex align-items-start mb-3">
                                    <div class="instruction-icon me-3">
                                        <span class="fa-stack">
                                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fas {{ $instruction['icon'] }} fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="instruction-text">
                                        {{ $instruction['text'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-5">Submit Application</button>
                </div>
            </div>
            </div>
        </form>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    .header-logo {
        width: 23 0px;
        height: 230px;
        object-fit: contain;
        position: absolute;
        top: 4px;
        left: 40px;
    }
    
    .main-header {
        padding-top: 40px;
        padding-bottom: 20px;
        Margin-bottom: 1px;
        position: relative;
        background-color: rgb(82, 129, 179);
    }
    
    .board-title {
        font-size: 27px;
        font-weight: bold;
        text-align: start;
        margin-bottom: 5px;
    }
    
    .section-title {
        font-size: 18px;
        text-align: center;
        margin-bottom: 20px;
    }
    

    .large-bold-text {
        font-size: 1.5rem;
        font-weight: bold;
    }

 
    .list-group-item {
        border-left: none;
        border-right: none;
    }
    
    .form-check-inline {
        margin-right: 10px;
    }
    
    .required:after {
        content: " *";
        color: red;
    }

    .document-list .list-group-item {
    transition: background-color 0.3s;
    border-left: 4px solid transparent;
    }

    .document-list .list-group-item:hover {
        background-color: #f8f9fa;
        border-left-color: #0d6efd;
    }
    
    .attestation-box {
        border-left: 4px solid #dc3545 !important;
    }
    
    .instruction-list {
        padding: 1rem;
    }
    
    .instruction-icon {
        flex-shrink: 0;
    }
    
    .instruction-item {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.5rem;
        transition: transform 0.3s;
    }
    
    .instruction-item:hover {
        transform: translateX(10px);
        background-color: #e9ecef;
    }
    
    .fa-stack {
        font-size: 1.2rem;
    }
    
    /* Animated hover effects */
    .list-group-item i,
    .attestation-item i {
        transition: transform 0.3s;
    }
    
    .list-group-item:hover i,
    .attestation-item:hover i {
        transform: scale(1.2);
    }

    .content-section {
    margin-bottom: 1.5rem;
    padding: 1.7rem;
    border: 2px solid #28a745;
    border-radius: 8px;
    background-color: #ffffff;
    }

    .attestation-stack {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 100%;
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .attestation-stack:hover {
        transform: translateY(-5px);
    }

    .stack-icon {
        margin-bottom: 1.5rem;
    }

    .stack-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .stack-text {
        color: #6c757d;
        font-size: 0.95rem;
    }

    .required-docs {
        margin-top: 2rem;
    }

    .document-item {
        background-color: #f8f9fa;
        border-radius: 6px;
        border-left: 3px solid #007bff;
        transition: all 0.3s ease;
    }

    .document-item:hover {
        background-color: #e9ecef;
        transform: translateX(5px);
    }

    .doc-icon {
        font-size: 1.2rem;
        width: 40px;
        text-align: center;
    }

    .doc-text {
        font-size: 0.9rem;
        color: #495057;
    }

    .form-section-title {
        background-color: #a8b5d4;
        padding: 10px 15px;
        margin-bottom: 3rem;
        border-left: 9px solid #3f76ca;
        font-size: 1.2rem;
        border-radius: 4px;
    }
        </style>
        @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });

            // Auto-copy permanent address to postal address if checked
            const permanentAddress = document.getElementById('permanent_address');
            const postalAddress = document.getElementById('postal_address');
            const sameAsPermCheckbox = document.getElementById('same_as_permanent');
            
            if (sameAsPermCheckbox) {
                sameAsPermCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        postalAddress.value = permanentAddress.value;
                        postalAddress.disabled = true;
                    } else {
                        postalAddress.disabled = false;
                    }
                });
            }
        });
    </script>
    @endpush
@endsection