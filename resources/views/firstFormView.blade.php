<!-- this was resources/views/student-entry/create.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Application Portal</title>
       
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- tab-Pic -->
        <link rel="icon" href="{{ asset('images/biseb.ico') }}" type="image/png">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        
        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @stack('styles')
        
        @livewireStyles    

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @stack('header-scripts')
        <script src="{{ asset('js/header/header.js') }}" defer></script> <!-- Include your JS file -->

        <style>
            body {
                background-color: #f8f9fa;
            }
            .form-control:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }
            .card {
                border: none;
                border-radius: 0.5rem;
            }
            .header-bg {
                background-color: #007bff;
                padding: 1.5rem;
                border-radius: 0.5rem 0.5rem 0 0;
            }
            .form-section {
                background-color: #f8f9fa;
                border-radius: 0.5rem;
                padding: 1rem;
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100">
        <!-- Header Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo -->
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-xl font-bold">
                                {{ config('app.name', 'BISE Bannu') }}
                            </a>
                        </div>
                    </div>
    
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        @include('partials.navigation')
                    </div>
    
                    <!-- User Menu -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        @auth
                            @include('partials.user-menu')
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                            <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-gray-900">Register</a>
                        @endauth
                    </div>
    
                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" class="mobile-menu-button">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- Mobile menu -->
            <div class="sm:hidden hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    @include('partials.mobile-navigation')
                </div>
            </div>
        </nav>
    
    
        <!-- Main Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Flash Messages -->
                @if(session()->has('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif
    
                @if(session()->has('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="min-vh-90 py-0">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card shadow">
                                    <!-- Header -->
                                    <div class="header-bg text-center">
                                        <h4 class="h4 text-white mb-0">Generate Receipt and Application</h4>
                                        {{-- <p class="text-white-50 mb-0">Generate Receipt and Application</p> --}}
                                    </div>

                                    <div class="card-body">
                                        <form id="applicationForm" method="POST" action="{{ route('index-page-inputs.store') }}" >
                                        @csrf
                                        <!-- Desktop Layout -->
                                            <div class="row d-none d-md-flex">
                                                <!-- Left Column - Student Details -->
                                                <div class="col-md-4">
                                                    <div class="form-section">
                                                        <h2 class="h5 mb-4">
                                                            <i class="fas fa-user-graduate mr-2"></i>Student Details
                                                        </h2>
                                                        
                                                        <div class="form-group">
                                                            <label class="font-weight-medium" for="name" >Student Name (In Block Letters)</label>
                                                            <input autocomplete="on" type="text" name="name" class="form-control" placeholder="Enter full name" value="Muhammad">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="font-weight-medium" for="father_name" >Father's Name (In Block Letters)</label>
                                                            <input autocomplete="on" type="text" name="father_name" class="form-control" placeholder="Enter father's name" value="Abd Ullah">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="font-weight-medium" for="roll_number" >Roll Number</label>
                                                            <input autocomplete="on" type="text" name="roll_number" class="form-control" placeholder="Enter roll number" value="987654">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="font-weight-medium" for="class" >Class</label>
                                                            <select name="class" class="form-control">
                                                                <option value="">Select Class</option>
                                                                <option value="9th" selected>9th(SSC/Matric)</option>
                                                                <option value="10th">10th (SSC/Matric)</option>
                                                                <option value="11th">11th (HSSC/Intermediate)</option>
                                                                <option value="12th">12th (HSSC/Intermediate)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Middle Column - Academic Details -->
                                                <div class="col-md-4">
                                                    <div class="form-section">
                                                        <h2 class="h5 mb-4">
                                                    <!-- Option 1: Clipboard icon -->
                                                    <i class="fas fa-clipboard mr-2"></i>Acadimic Details                                            </h2>
                                                        
                                                        <div class="form-group">
                                                            <label class="font-weight-medium" for="session" >Session</label>
                                                            <select name="session" class="form-control">
                                                                <option value="">Select Session</option>
                                                                <option value="A-I" selected>A-I (Annual)</option>
                                                                <option value="A-II">A-II (Supply)</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="font-weight-medium" for="year" >Year</label>
                                                            <select name="year" class="form-control">
                                                                <option value="">Select Year</option>
                                                                @foreach ($years as $year)
                                                                <option value="{{ $year->year }}" selected>{{ $year->year }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-section">
                                                        <h2 class="h5 mb-4">
                                                        <!-- Option 3: File with text -->
                                                        <i class="fas fa-file-signature mr-2"></i>Application Type
                                                            </h2>
                                                        <label class="font-weight-medium" for="application" >Application Type</label>
                                                        <select class="form-control @error('application') is-invalid @enderror" 
                                                                id="applicationSelect" 
                                                                name="application" 
                                                                required
                                                                aria-describedby="applicationSelectHelp">
                                                            <option value="">Select Application</option>
                                                            <optgroup label="Migration">
                                                                <option value="1" selected>Migration</option>
                                                                <option value="21">Migration Cancellation</option>
                                                            </optgroup>
                                                            <optgroup label="Verification">
                                                                <option value="2">Verification</option>
                                                                <option value="3">IBCC Verification</option>
                                                            </optgroup>
                                                            <optgroup label="Original Documents">
                                                                <option value="4">Duplicate DMC</option>
                                                                <option value="5">Revised DMC</option>
                                                                <option value="6">Duplicate Certificate</option>
                                                                <option value="7">Revised Certificate</option>
                                                            </optgroup>
                                                            <optgroup label="Corrections">
                                                                <option value="13">Correction by Degree</option>
                                                                <option value="14">Unnatural Gap Correction</option>
                                                                <option value="15">Spelling/Vowel Correction</option>
                                                                <option value="16">Correction by AWR</option>
                                                            </optgroup>
                                                            <optgroup label="Examination">
                                                                <option value="9">Centre Change</option>
                                                                <option value="11">Result/Gazette</option>
                                                                <option value="12">Creation of Center</option>
                                                            </optgroup>
                                                            <optgroup label="Results">
                                                                <option value="20">Jury Appeal</option>
                                                                <option value="8">UFM Appeal</option>
                                                                <option value="10">Re-totalling</option>
                                                                <option value="19">Grace Marks</option>
                                                                <option value="18">Cancellation of Paper</option>
                                                            </optgroup>
                                                            <optgroup label="Others">
                                                                <option value="17">custom_amount Fee</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Right Column - Conditional Fields -->
                                                <div class="col-md-4">
                                                    <div class="form-section">
                                                        <h2 class="h5 mb-4">
                                                            <i class="fas fa-file-alt mr-2"></i>Additional Details
                                                        </h2>
                                                        
                                                        <div id="verificationGroup" class="d-none">
                                                            <div class="form-group">
                                                                <label class="font-weight-medium" for="document_count">Number of Documents</label>
                                                                <select name="document_count" class="form-control">
                                                                    <option value="1">1 Document</option>
                                                                    <option value="2">2 Documents</option>
                                                                    <option value="3">3 Documents</option>
                                                                    <option value="4">4 Documents</option>
                                                                </select>
                                                                <small class="form-text text-muted">One document means one Original DMC/Certificate with one copy</small>
                                                            </div>
                                                        </div>

                                                        <div id="papersGroup" class="d-none">
                                                            <div class="form-group">
                                                                <label class="font-weight-medium" for="paper_count">Number of Papers</label>
                                                                <select name="paper_count" class="form-control">
                                                                    <option value="1">1 Paper</option>
                                                                    <option value="2">2 Papers</option>
                                                                    <option value="3">3 Papers</option>
                                                                    <option value="4">4 Papers</option>
                                                                    <option value="5">5 Papers</option>
                                                                    <option value="6">6 Papers</option>
                                                                    <option value="7">7 Papers</option>
                                                                    <option value="8">8 Papers</option>
                                                                    <option value="9">9 Papers</option>
                                                                    <option value="10">10 Papers</option>
                                                                    <option value="11">11 Papers</option>
                                                                    <option value="12">12 Papers</option>
                                                                    <option value="13">13 Papers</option>
                                                                    <option value="14">14 Papers</option>
                                                                    <option value="15">15 Papers</option>
                                                                    <option value="16">16 Papers</option>
                                                                    <option value="17">17 Papers</option>
                                                                    <option value="18">18 Papers</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="custom_amountGroup" class="d-none">
                                                            <div class="form-group">
                                                                <label class="font-weight-medium" for="custom_amount">Amount</label>
                                                                <input autocomplete="on" type="number" name="custom_amount" class="form-control" placeholder="Enter amount">
                                                            </div>
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="text-center mt-8 pt-8">
                                                            <button type="submit" class="btn btn-primary px-5 py-2">
                                                                <i class="fas fa-print mr-2"></i>Submit to Proceed
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Mobile Layout -->
                                            <div class="d-md-none">
                                                <!-- Mobile sections would go here, following the same structure but stacked -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </main>
    
        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="text-center text-gray-500">
                    &copy; {{ date('Y') }} {{ config('app.name', 'BISE Bannu') }}. All rights reserved.
                </div>
            </div>
        </footer>
    
        <!-- Scripts -->
        @stack('scripts')

        @livewireScripts

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                // Application type change handler
                $('#applicationSelect').change(function() {
                    const selectedValue = $(this).val();
                    
                    // Hide all conditional groups first
                    $('#verificationGroup, #papersGroup, #custom_amountGroup').addClass('d-none');
                    
                    // Show relevant group based on selection
                    if (selectedValue === '2' || selectedValue === '3') {
                        $('#verificationGroup').removeClass('d-none');
                    } else if (selectedValue === '10' || selectedValue === '19') {
                        $('#papersGroup').removeClass('d-none');
                    } else if (selectedValue === '17') {
                        $('#custom_amountGroup').removeClass('d-none');
                    }
                });
        
                // Form validation
                $('#applicationForm').on('submit', function(e) {
                    // Prevent default submission
                    e.preventDefault();
                    
                    // Define required fields
                    const requiredFields = ['name', 'father_name', 'roll_number', 'class', 'application'];
                    let isValid = true;
                    
                    // Validate each required field
                    requiredFields.forEach(field => {
                        const value = $(`[name="${field}"]`).val();
                        if (!value) {
                            isValid = false;
                            $(`[name="${field}"]`).addClass('is-invalid');
                        } else {
                            $(`[name="${field}"]`).removeClass('is-invalid');
                        }
                    });
                    
                    // If validation fails, show alert and stop
                    if (!isValid) {
                        alert('Please fill in all required fields');
                        return false;
                    }
                    
                    // Reset hidden fields before submission
                    if ($('#verificationGroup').hasClass('d-none')) {
                        $('[name="document_count"]').val('');
                    }
                    if ($('#papersGroup').hasClass('d-none')) {
                        $('[name="paper_count"]').val('');
                    }
                    if ($('#custom_amountGroup').hasClass('d-none')) {
                        $('[name="custom_amount"]').val('');
                    }
                    
                    // Submit form directly
                    document.getElementById('applicationForm').submit();
                });
        
                // Clear invalid state on input change
                $('input, select').on('change', function() {
                    $(this).removeClass('is-invalid');
                });
            });
        </script>            
        <script>
            document.querySelector('.mobile-menu-button').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        </script>
        
    </body>
</html>    

<!-- ---------------------------------------------------------------------------------------------- -->

    <!-- <script>
    document.getElementById('application_type').addEventListener('change', function() {
        document.querySelector('.scholarship-fields').style.display = 'none';
        document.querySelector('.admission-fields').style.display = 'none';
        document.querySelector('.transfer-fields').style.display = 'none';

        var selectedType = this.value;
        document.querySelector('.' + selectedType + '-fields').style.display = 'block';
    });
    </script> -->

 <!-- ---------------------------------------------------------------------------------------------- -->

 <!-- Scripts -->
 <script>
    // ???????????????????????????????????????????
    // Existing navigation scripts remain the same
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    let navOpen = false;

    function toggleNav() {
        if (navOpen) {
            closeNav();
            navOpen = false;
        } else {
            openNav();
            navOpen = true;
        }
    }

    function openNav() {
        const sidebar = document.getElementById("mySidebar");
        const sidebar2 = document.getElementById("mySidebar2");

        sidebar.style.width = "43%";
        sidebar2.style.marginRight = "50%";
        sidebar.style.paddingLeft = "50px";

        sidebar.style.transition = "width 0.5s ease, padding-left 0.5s ease";
        sidebar2.style.transition = "margin-right 0.5s ease";
    }

    function closeNav() {
        const sidebar = document.getElementById("mySidebar");
        const sidebar2 = document.getElementById("mySidebar2");

        sidebar.style.width = "0";
        sidebar2.style.marginRight = "0";
        sidebar.style.paddingLeft = "0";

        sidebar.style.transition = "width 0.5s ease, padding-left 0.5s ease";
        sidebar2.style.transition = "margin-right 0.5s ease";
    }
</script>







 