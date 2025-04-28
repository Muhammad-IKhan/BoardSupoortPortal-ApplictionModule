@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="container-fluid">
            <!-- Main Header -->
            <div class="row main-header">
                {{-- <div class="col-2 ms-auto"> --}}
                    <img src="{{ asset('images/biseb.png') }}" alt="BISE Bannu Logo" class="header-logo">
                {{-- </div> --}}
                <div class="col-10 text-start">
                    <h1 class="board-title ">BOARD OF INTERMEDIATE AND SECONDARY EDUCATION BANNU KPK</h1>
                    <h6 class="text-muted mt-0 ms-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kohat Road Township Bannu, Tel:0928-123123  Website: www.biseb.edu.pk Email: admin@biseb.edu.pk </h6>
                    <h3 class="display-7 pt-2 mb-0 text-center font-weight-bold">@yield('office_section')</h3>
                </div>
            </div>  
        </div>  

        <div class="col-10 text-center">
            <div class="border-bottom border-2 pb-2 text-success large-bold-text"> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Application For 
                    {{ session('Application', 'BISE Bannu') }}
                <span><h6 class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>AFTER FILLING THE APPLICATION ATTACH RECEIPT AND REQUIRED DOCUMENTS MENTIONED BELOW</u></h6></span>
            </div>
        </div>
        <div class="col-2">
        <!-- Reserved for additional header content -->
        </div>
    {{-- </div> --}}
        <div>
        `   <hr>
            <div class="application-content">
                @yield('applicationContent') 
            </div>            
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-logo {
            width: 202px;
            height: 202px;
            object-fit: contain;
            position: absolute;
            top: 5px;
            left: 80px; 
        }
        
        .main-header {
            padding-top: 20px;
            position: relative;
            background-color: rgb(82, 129, 179);
        }
        
        .board-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 5px;
        }
        
        .section-title {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .content-section {
            margin-bottom: 7px;
            padding: 10px;
            border: 1px solid green;
            border-radius: 5px;
        }

        .large-bold-text {
            font-size: 1.5rem; 
            font-weight: bold;
        }
        
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
@endsection