
{{-- @extends('layouts.formContainer') --}}
@extends('layouts.app')

@section('title', 'Application Form - ' . session('Application', 'BISE Bannu'))

@section('office_section')
    @php
        $officeSection = session('office_section', 'ONE WINDOW SECTION'); 
    @endphp
    {{ $officeSection }}
@endsection
@section('application_type')
    {{ session('Application', 'Duplicate Certificate') }}
@endsection



<form id="applicationForm" method="POST" action="{{ route('prints.create') }}" >
    @csrf

@section('student_details')
<div class="row">
    <h3 class="form-section-title">Student Details</h3>
    <div class="col-md-4 mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ session('name') }}" >
        @if(session('name'))
            <input type="hidden" name="hidden_name" value="{{ session('name') }}">
        @endif
    </div>
    
    <div class="col-md-4 mb-3">
        <label for="father_name" class="form-label">Father's Name</label>
        <input type="text" class="form-control" id="father_name" name="father_name" value="{{ session('father_name') }}" >
        @if(session('father_name'))
            <input type="hidden" name="hidden_father_name" value="{{ session('father_name') }}">
        @endif
    </div>
    
    <div class="col-md-4 mb-3">
        <label for="cnic" class="form-label">CNIC/Form-B Number</label>
        <input type="text" class="form-control" id="cnic" name="cnic" pattern="\d{5}-\d{7}-\d{1}" placeholder="00000-0000000-0" value="{{ session('cnic') }}" required>
        @if(session('cnic'))
            <input type="hidden" name="hidden_cnic" value="{{ session('cnic') }}">
        @endif
    </div>
</div>
@endsection

@section('academic_details')
    <div class="row">
        <h3 class="form-section-title">Academic Details</h3>
        <div class="col-md-3 mb-3">
            <label for="roll_no" class="form-label">Roll Number</label>
            <input type="text" class="form-control" id="roll_number" name="roll_number"  value="{{ session('roll_number') }}">
            @if(session('roll_number'))
                <input type="hidden" name="roll_number" value="{{session('roll_number')}}">
            @endif
        </div>
        
        {{-- <div class="col-md-3 mb-3">
            <label for="registration_no" class="form-label">Registration Number</label>
            <input type="text" class="form-control" id="registration_no" name="registration_no" required>
        </div> --}}
        
        <div class="col-md-3 mb-3">
            <label for="examination" class="form-label">Class</label>
            <select class="form-select" id="examination" name="examination" >
                <option value="">Select Examination</option>
                <option value="9th" {{ session('class') == '9th' ? 'selected' : '' }}>9th (SSC/Matric)</option>
                <option value="10th" {{ session('class') == '10th' ? 'selected' : '' }}>10th (SSC/Matric)</option>
                <option value="11th" {{ session('class') == '11th' ? 'selected' : '' }}>11th (HSSC/Intermediate)</option>
                <option value="12th" {{ session('class') == '12th' ? 'selected' : '' }}>12th (HSSC/Intermediate)</option>
            </select>
            {{-- <input type="hidden" name="selected_examination" value="{{ session('class') }}"> --}}
        </div>

        <div class="col-md-3 mb-3">
            <label for="session" class="form-label">Session</label>
            <select class="form-select" id="session" name="session" >
                <option value="">Select Session</option>
                <option value="A-I" {{ session('session') == 'A-I' ? 'selected' : '' }}>A-I (Annual)</option>
                <option value="A-II" {{ session('session') == 'A-II' ? 'selected' : '' }}>A-II (Suply)</option>
            </select>
            {{-- <input type="hidden" name="selected_session" value="{{ session('session') }}"> --}}
        </div>


        <div class="col-md-3 mb-3">
            <label for="year" class="form-label">Year of Passing</label>
            <input type="text" class="form-control" id="year" name="year"   min="1980" max="{{ date('Y') }}" value="{{ session('year') }}">
            @if(session('year'))
                <input type="hidden" name="year" value="{{ session('year') }}">
            @endif
        </div>
        
        {{-- <div class="col-md-4 mb-3">
            <label for="group" class="form-label">Group</label>
            <select class="form-select" id="group" name="group" required>
                <option value="">Select Group</option>
                <option value="science">Science</option>
                <option value="arts">Arts</option>
                <option value="pre_medical">Pre-Medical</option>
                <option value="pre_engineering">Pre-Engineering</option>
                <option value="commerce">Commerce</option>
            </select>
        </div> --}}
        
        {{-- <div class="col-md-4 mb-3">
            <label for="institute" class="form-label">Institute Name</label>
            <input type="text" class="form-control" id="institute" name="institute" required>
        </div>
        
        <div class="col-md-4 mb-3">
            <label for="marks_obtained" class="form-label">Marks Obtained</label>
            <input type="number" class="form-control" id="marks_obtained" name="marks_obtained" required>
        {{-- </div> --}}
    </div>
@endsection

@section('documents_information')
    <div class="row">
        <div class="col-12">
            <h3 class="form-section-title">Required Documents</h3>
            <ul class="list-group">
                <li class="list-group-item">Original CNIC/Form-B copy</li>
                <li class="list-group-item">Previous DMC/Result Card copy</li>
                <li class="list-group-item">Challan/Receipt of payment</li>
                <li class="list-group-item">Passport size photographs (2 copies)</li>
            </ul>
        </div>
    </div>
@endsection

@section('receipt_details')
    <div class="row">
        <h3 class="form-section-title">Receipt Details</h3>
        
        <div class="col-md-3 mb-3">
            <label for="challan_no" class="form-label">Challan/Receipt Number</label>
            <input type="text" class="form-control" id="challan_no" name="challan_no" value="{{ session('receiptNumber') }}" readonly >
            @if(session('receiptNumber'))
            <input type="hidden" name="hidden_receipt_number" value="{{ session('receiptNumber') }}" >
        @endif
        </div>
        
        <div class="col-md-3 mb-3">
            <label for="amount" class="form-label">Amount Paid</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ session('fee') }}" readonly>
        </div>
        
        <div class="col-md-3 mb-3">
            <label for="payment_bank" class="form-label">Bank</label>
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
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>
    </div>
@endsection

@section('student_contact_information')
    <div class="row">
        <h3 class="form-section-title">Student Contact Information</h3>
        
        <div class="col-md-6 mb-3">
            <label for="permanent_address" class="form-label">Permanent Address</label>
            <textarea class="form-control" id="permanent_address" name="permanent_address" rows="3" required></textarea>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="postal_address" class="form-label">Postal Address</label>
            <textarea class="form-control" id="postal_address" name="postal_address" rows="3" required></textarea>
        </div>
        
        <div class="col-md-4 mb-3">
            <label for="contact_no" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="contact_no" name="contact_no" required>
        </div>
        
        <div class="col-md-4 mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
    </div>
@endsection

@section('instructions')
    <div class="row">
        <div class="col-12">
            <h3 class="form-section-title">Instructions</h3>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item">Fill all mandatory fields marked with asterisk (*)</li>
                <li class="list-group-item">Ensure all information provided is accurate and matches with original documents</li>
                <li class="list-group-item">Attach all required documents with the application form</li>
                <li class="list-group-item">Keep the payment receipt safe for future reference</li>
                <li class="list-group-item">Processing time may take up to 15 working days</li>
            </ol>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary px-5">Submit Application</button>
        </div>
    </div>
</form>    
@endsection

@push('styles')
<style>
    .form-section-title {
        /* background-color: #f8f9fa; */
        background-color: #a8b5d4;
        padding: 7px;
        margin-bottom: 7px;
        /* border-left: 4px solid #0d6efd; */
        border-left: 9px solid #3f76ca;
        font-size: 18px;
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

    
</style>
@endpush

@push('scripts')
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
 
