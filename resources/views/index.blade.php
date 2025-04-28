<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Application Portal</title>
       
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Tab Icon -->
        <link rel="icon" href="{{ asset('images/biseb.ico') }}" type="image/png">
        
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        
        <!-- Bootstrap 4 CSS (optional, if needed) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        
        <!-- Scripts --> 
        <!-- Bootstrap, jQuery, EasyTicker and other CDNs -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-easy-ticker@3.1.0/dist/jquery.easy-ticker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
             
        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @stack('styles')
        @livewireStyles  
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/header.js') }}" defer></script> <!-- Include your JS file -->
        <style>
            /* Custom animations */
            @keyframes slideIn {
                from { 
                    transform: translateY(-100%);
                    opacity: 0;
                }
                to { 
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            .nav-item {
                animation: slideIn 0.5s ease-out forwards;
                opacity: 0;
            }

            .nav-item:nth-child(1) { animation-delay: 0.1s; }
            .nav-item:nth-child(2) { animation-delay: 0.2s; }
            .nav-item:nth-child(3) { animation-delay: 0.3s; }
            .nav-item:nth-child(4) { animation-delay: 0.4s; }
        </style>

        <style>  
            main {
                padding-top: 0 !important;
            }
            .nav-pills {
                position: sticky;
                top: 0;
                background-color: white; /* Ensures visibility */
                z-index: 60; /* Slightly higher than the sidebar */
                padding-top: 0;
                margin-top: 0;
                margin-bottom: 20px; /* Adds space below the nav-pills */
                padding-bottom: 0px; /* Alternative approach */
            }

            .sidebar {
            height: 100%;
            width: 0%;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: width 0.5s ease;
            padding-top: 15px;
            margin-top: 67px;
            z-index: 50; /* Slightly higher than Bootstrap's default z-index */
            padding-top: 0 !important;    
            }

            /* Ensure tab content respects the navbar */
            .tab-content {
                position: relative;
                z-index: 40;
                /* If you want to specifically control the content below */
                margin-top: 20px; /* Adds space above the tab content */
            }
    
            #mySidebar {
            width: 0;
            position: fixed;
            height: 100%;
            /* background: linear-gradient(to bottom, rgba(17, 17, 17, 0.9), rgba(17, 17, 17, 0.5)); */
            background: linear-gradient(to bottom, rgba(200, 200, 200, 1) 45%, rgba(200, 200, 200, 1.9) 50%, rgba(200, 200, 200, 0.7) 75%, rgba(200, 200, 200, 0.6) 87%, rgba(200, 200, 200, 0.5) 100%);
 
            overflow-x: hidden;
            transition: width 0.5s ease, padding-left 0.5s ease;
            }


            #sidebar2 {
            transition: margin-right 0.5s ease;
            padding: 16px;
            }

            .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
            }

            .sidebar a:hover {
            color: #f1f1f1;
            }

            .sidebar .closebtn {
            position: absolute;
            top: 0;
            left: 25px;
            font-size: 36px;
            margin-right: 50px;
            }

            .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
            }

            .openbtn:hover {
            background-color: #444;
            }

            /* Style page content - use this if you want to push the page content to the left when you open the side navigation */
            #main {
            transition: margin-right .5s; /* If you want a transition effect */
            padding: 20px;
            }


            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
            }        
    
      
            .news-ticker, .videos-ticker, .contact-ticker, .downloads-ticker, .services-ticker,
            .abc-ticker{
                height: 100px; /* Adjusts height to fit content */
                max-height: 100%; /* Limit maximum height for scrolling */
                overflow: show; /* Ensure proper scrolling behavior */
                position: relative;
                margin-top: 0px;
                top: 0px;
                height: 565px;
            }


            
            .news-ticker-wrapper, .videos-ticker-wrapper, .contact-ticker-wrapper, .services-ticker-wrapper 
            , .abc-ticker-wrapper{
                position: absolute;
                padding-top: 0px;
                margin-top: 0px;
                width: 100%;
                transition: transform 0.5s ease;
                position: relative;
                height: 100%; /* Match the visible container height */
                overflow: hidden;
                /* display: flex;
                flex-direction: column; Stack items vertically */
                transition: transform 0.5s ease; /* Smooth scrolling */
                
               
            }
            .news-ticker-wrapper ul {
                overflow: hidden;  /* Prevent scrolling */
                margin: 0;
                padding: 0;
            }
            
            .news-item, .videos-item, .contact-item, .downloads-item,.services-item, .abc-item{
                padding: 10px;
                overflow: hidden;
                border-bottom: 1px solid #ddd;
                height: 50px; /* Ensure all items have a uniform height */
                line-height: 50px; /* Vertically center text */
                display: block; 
            }


 
        </style>
        
              
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100">
        <!-- Header Navigation -->
        <!-- <nav class="bg-white shadow "> -->
        <nav class="bg-white shadow fixed top-0 w-full z-50">
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
        <!-- commented Navigation tabs jo main chahta hun lakin ooper ki same jaga, functionality aur feathures  kay sath -->
        <!-- <nav class="border-b">
            <ul class="flex space-x-4 p-4">
                <li>
                    <button 
                        @click="activeTab = 'news'" 
                        :class="{'text-blue-600 border-blue-600': activeTab === 'news'}"
                        class="text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 pb-2"
                    >
                        News
                    </button>
                </li>
                <li>
                    <button 
                        @click="activeTab = 'videos'" 
                        :class="{'text-blue-600 border-blue-600': activeTab === 'videos'}"
                        class="text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 pb-2"
                    >
                        Videos
                    </button>
                </li>
                <li>
                    <button 
                        @click="activeTab = 'services'" 
                        :class="{'text-blue-600 border-blue-600': activeTab === 'services'}"
                        class="text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 pb-2"
                    >
                        Services
                    </button>
                </li>
                <li>
                    <button 
                        @click="activeTab = 'contact'" 
                        :class="{'text-blue-600 border-blue-600': activeTab === 'contact'}"
                        class="text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-600 pb-2"
                    >
                        Contact
                    </button>
                </li>
            </ul>
        </nav>  -->

                <!-- Main Content -->
                <main class="py-6">
                    <div id="mySidebar" class="sidebar pl-1">
                        <div class="container bg-white shadow">
                            <div class="row">
                                <div class="col max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <div class="fixed top-12 mt-4 z-50 w-full overflow-x-auto">
                                        <ul class="nav nav-pills flex space-x-4 bg-white py-2" id="pills-tab" role="tablist">
                                            @php
                                                $tabs = [
                                                    ['id' => 'news', 'label' => 'News'],
                                                    ['id' => 'videos', 'label' => 'Videos'],
                                                    ['id' => 'contact', 'label' => 'Contact'],
                                                    ['id' => 'downloads', 'label' => 'Downloads'],
                                                    ['id' => 'services', 'label' => 'services'],
                                                    ['id' => 'abc', 'label' => 'abc'],
                                                ];
                                            @endphp
                                            
                                            @foreach($tabs as $index => $tab)
                                                <li class="nav-item" role="presentation">
                                                    <button 
                                                        class="nav-link {{ $index === 0 ? 'active' : '' }} px-3 py-1 text-sm rounded-md transition-colors duration-300 
                                                        {{ $index === 0 ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-blue-100 hover:text-blue-700' }}"
                                                        id="pills-{{ $tab['id'] }}-tab" 
                                                        data-toggle="pill" 
                                                        data-target="#pills-{{ $tab['id'] }}" 
                                                        type="button" 
                                                        role="tab" 
                                                        aria-controls="pills-{{ $tab['id'] }}" 
                                                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                                    >
                                                        <small>{{ $tab['label'] }}</small>
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content mt-16" id="pills-tabContent">
                            <!-- Downloads Tab -->
                            <div class="tab-pane fade" id="pills-downloads" role="tabpanel" aria-labelledby="pills-downloads-tab">
                                <div class="container">
                                    <div class="downloads-ticker">
                                        <div class="downloads-ticker-wrapper" id="downloadsTickerWrapper">
                                            <!-- Downloads list content -->
                                            <ul class="list-unstyled space-y-4">
                                                @foreach(range(1, 2) as $item)
                                                    <li>
                                                        <div class="news-item bg-white shadow-md rounded-lg p-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-24 h-24 object-cover rounded-md" src="https://via.placeholder.com/100" alt="News Image">
                                                                </div>
                                                                <div class="flex-grow">
                                                                    <a href="#" class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                                                                        Sample Notification Title
                                                                    </a>
                                                                    <div class="text-sm text-gray-500 mt-2">
                                                                        Last Updated on {{ now()->format('Y-m-d') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- ABC Tab -->
                            <div class="tab-pane fade" id="pills-abc" role="tabpanel" aria-labelledby="pills-abc-tab">
                                <div class="container">
                                    <div class="abc-ticker">
                                        <div class="abc-ticker-wrapper" id="abcTickerWrapper">
                                            <!-- ABC list content -->
                                            <ul class="list-unstyled space-y-4">
                                                @foreach(range(1, 2) as $item)
                                                    <li>
                                                        <div class="news-item bg-white shadow-md rounded-lg p-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-24 h-24 object-cover rounded-md" src="https://via.placeholder.com/100" alt="News Image">
                                                                </div>
                                                                <div class="flex-grow">
                                                                    <a href="#" class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                                                                        Sample ABC Title
                                                                    </a>
                                                                    <div class="text-sm text-gray-500 mt-2">
                                                                        Last Updated on {{ now()->format('Y-m-d') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                            <!-- services Tab -->
                            <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
                                <div class="container">
                                    <div class="services-ticker">
                                        <div class="services-ticker-wrapper" id="servicesTickerWrapper">
                                            <!-- services list content -->
                                            <ul class="list-unstyled space-y-4">
                                                @foreach(range(1, 2) as $item)
                                                    <li>
                                                        <div class="news-item bg-white shadow-md rounded-lg p-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-24 h-24 object-cover rounded-md" src="https://via.placeholder.com/100" alt="News Image">
                                                                </div>
                                                                <div class="flex-grow">
                                                                    <a href="#" class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                                                                        Sample GHK Title
                                                                    </a>
                                                                    <div class="text-sm text-gray-500 mt-2">
                                                                        Last Updated on {{ now()->format('Y-m-d') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                
                        <div class="tab-content mt-16" id="pills-tabContent">
                            <!-- News Tab -->
                            <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                                <div class="container">
                                    <div class="news-ticker">
                                        <div class="news-ticker-wrapper" id="newsTickerWrapper">
                                                <!-- News content -->
                                            <ul class="list-unstyled space-y-4">
                                                    <!--News list items -->
                                                @foreach(range(1,2) as $item)
                                                    <li>
                                                        <div class="news-item bg-white shadow-md rounded-lg p-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-24 h-24 object-cover rounded-md" src="https://via.placeholder.com/100" alt="News Image">
                                                                </div>
                                                                <div class="flex-grow">
                                                                    <a href="#" class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                                                                        Sample Notification Title
                                                                    </a>
                                                                    <div class="text-sm text-gray-500 mt-2">
                                                                        Last Updated on {{ now()->format('Y-m-d') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                                                                    <!--News Items Samples -->
        

                                                <!--Item 17:Interactive News Tile: -->
                                                <li class="mb-3">
                                                    <div class="news-interactive-tile position-relative border rounded p-3">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <img 
                                                                    src="https://via.placeholder.com/300x200" 
                                                                    alt="Interactive news image" 
                                                                    class="img-fluid rounded"
                                                                >
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                                    <h5 class="mb-0">
                                                                        <a href="#" class="text-decoration-none text-primary">
                                                                            Innovations in Renewable Energy
                                                                        </a>
                                                                    </h5>
                                                                    <span class="badge bg-info">Trending</span>
                                                                </div>
                                                                <p class="text-muted small mb-3">
                                                                    Exploring cutting-edge technologies revolutionizing sustainable energy production
                                                                </p>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <small class="text-secondary">Published: 2024-11-25</small>
                                                                    <div class="btn-group btn-group-sm" role="group">
                                                                        <a href="#" class="btn btn-outline-primary">Read</a>
                                                                        <a href="#" class="btn btn-outline-secondary">Share</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Simple News Item: Item 2-->
                                                                                                <!-- Expandable News Item -->
                                                                                                <li class="mb-3">
                                                                                                    <div class="news-expandable-card card" data-bs-toggle="collapse" data-bs-target="#newsDetails1">
                                                                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                                                                            <h5 class="mb-0">
                                                                                                                Global Sustainability Innovation Challenge
                                                                                                            </h5>
                                                                                                            <div class="btn-group btn-group-sm" role="group">
                                                                                                                <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#newsDetails1">
                                                                                                                    <i class="bi bi-chevron-down"></i> Expand
                                                                                                                </button>
                                                                                                                <button class="btn btn-primary">
                                                                                                                    <i class="bi bi-share"></i> Share
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                        <div id="newsDetails1" class="collapse card-body">
                                                                                                            <div class="row g-3">
                                                                                                                <div class="col-md-4">
                                                                                                                    <img 
                                                                                                                        src="https://via.placeholder.com/350x250" 
                                                                                                                        alt="Sustainability Challenge" 
                                                                                                                        class="img-fluid rounded"
                                                                                                                    >
                                                                                                                </div>
                                                                                                                <div class="col-md-8">
                                                                                                                    <p class="text-muted">
                                                                                                                        A global initiative seeking innovative solutions to address critical environmental challenges, 
                                                                                                                        with a focus on sustainable technologies and community-driven approaches.
                                                                                                                    </p>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-6">
                                                                                                                            <h6>Key Details:</h6>
                                                                                                                            <ul class="list-unstyled small">
                                                                                                                                <li>📅 Application Deadline: January 15, 2025</li>
                                                                                                                                <li>💰 Prize Pool: $500,000</li>
                                                                                                                                <li>🌍 Global Participation</li>
                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6">
                                                                                                                            <h6>Challenge Categories:</h6>
                                                                                                                            <span class="badge bg-success me-1">Climate Tech</span>
                                                                                                                            <span class="badge bg-info">Green Energy</span>
                                                                                                                            <span class="badge bg-warning">Circular Economy</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="mt-3">
                                                                                                                        <button class="btn btn-success me-2">
                                                                                                                            <i class="bi bi-download"></i> Download Brochure
                                                                                                                        </button>
                                                                                                                        <button class="btn btn-outline-primary">
                                                                                                                            <i class="bi bi-envelope"></i> Contact Organizers
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>   
                                                                                                <!-- Interactive Timeline News Feed -->
                                                                                                <li class="mb-3">
                                                                                                    <div class="news-timeline-item position-relative p-3 border rounded">
                                                                                                        <div class="timeline-indicator position-absolute top-0 start-0 w-100 bg-primary" 
                                                                                                            style="height: 4px;"></div>
                                                                                                        
                                                                                                        <div class="row align-items-center">
                                                                                                            <div class="col-md-3">
                                                                                                                <div class="news-date text-center">
                                                                                                                    <h4 class="mb-0 text-primary">NOV</h4>
                                                                                                                    <h2 class="mb-0">30</h2>
                                                                                                                    <small class="text-muted">2024</small>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="col-md-9">
                                                                                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                                                                                    <h5 class="mb-0">
                                                                                                                        <a href="#" class="text-decoration-none text-dark">
                                                                                                                            Quantum Computing Breakthrough
                                                                                                                        </a>
                                                                                                                    </h5>
                                                                                                                    <span class="badge bg-info">Breaking</span>
                                                                                                                </div>
                                                                                                                
                                                                                                                <p class="text-muted small mb-3">
                                                                                                                    Revolutionary breakthrough in quantum computing technology promises unprecedented computational capabilities
                                                                                                                </p>
                                                                                                                
                                                                                                                <div class="news-interactions d-flex justify-content-between align-items-center">
                                                                                                                    <div class="interaction-stats">
                                                                                                                        <button class="btn btn-sm btn-outline-secondary me-2">
                                                                                                                            <i class="bi bi-eye"></i> 1.2K Views
                                                                                                                        </button>
                                                                                                                        <button class="btn btn-sm btn-outline-secondary">
                                                                                                                            <i class="bi bi-chat"></i> 45 Comments
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    
                                                                                                                    <div class="social-share">
                                                                                                                        <button class="btn btn-sm btn-outline-primary me-1">
                                                                                                                            <i class="bi bi-twitter"></i>
                                                                                                                        </button>
                                                                                                                        <button class="btn btn-sm btn-outline-primary me-1">
                                                                                                                            <i class="bi bi-facebook"></i>
                                                                                                                        </button>
                                                                                                                        <button class="btn btn-sm btn-outline-primary">
                                                                                                                            <i class="bi bi-linkedin"></i>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>
                                                <li class="mb-4">
                                                    <div class="news-expandable-card card" data-bs-toggle="collapse" data-bs-target="#conferenceDetails">
                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                            <h5 class="mb-0">Global Education Technology Summit</h5>
                                                            <div class="btn-group btn-group-sm" role="group">
                                                                <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#conferenceDetails">
                                                                    <i class="bi bi-chevron-down"></i> Details
                                                                </button>
                                                                <button class="btn btn-primary">
                                                                    <i class="bi bi-calendar-plus"></i> Add to Calendar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        
                                                        <div id="conferenceDetails" class="collapse card-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <img 
                                                                        src="https://via.placeholder.com/350x250" 
                                                                        alt="Conference Thumbnail" 
                                                                        class="img-fluid rounded"
                                                                    >
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <p class="text-muted">
                                                                        A groundbreaking international conference exploring the intersection of technology, pedagogy, and innovative learning strategies
                                                                    </p>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>Conference Highlights:</h6>
                                                                            <ul class="list-unstyled small">
                                                                                <li>🖥️ Hybrid Event (Online & Physical)</li>
                                                                                <li>📅 March 15-17, 2025</li>
                                                                                <li>🌍 International Speakers</li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h6>Key Topics:</h6>
                                                                            <span class="badge bg-primary me-1">EdTech</span>
                                                                            <span class="badge bg-success">AI in Education</span>
                                                                            <span class="badge bg-warning">Digital Learning</span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="mt-3">
                                                                        <button class="btn btn-success me-2">
                                                                            <i class="bi bi-journal"></i> View Full Program
                                                                        </button>
                                                                        <button class="btn btn-outline-primary">
                                                                            <i class="bi bi-person-plus"></i> Register Now
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{-- Minimalist News Block: --}}
                                                <li class="mb-3">
                                                    <div class="news-minimal-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="news-date text-center bg-light p-2 rounded">
                                                                    <strong class="d-block text-primary">NOV</strong>
                                                                    <span class="h4 d-block">30</span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="mb-1">
                                                                    <a href="#" class="text-decoration-none">
                                                                        Environmental Sustainability Conference
                                                                    </a>
                                                                </h6>
                                                                <small class="text-muted d-block">
                                                                    Global leaders discuss climate action strategies
                                                                </small>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="badge bg-danger">Hot</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{-- Full-width News Banner: --}}
                                                <li class="mb-3">
                                                    <div class="news-item bg-light p-3 rounded">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-2 text-center">
                                                                <img 
                                                                    src="https://via.placeholder.com/120" 
                                                                    alt="Event Announcement" 
                                                                    class="img-fluid rounded" 
                                                                    width="120" 
                                                                    height="120"
                                                                >
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <h4 class="mb-2">
                                                                            <a href="#" class="text-success text-decoration-none">
                                                                                Annual Sustainability Awards 2024
                                                                            </a>
                                                                        </h4>
                                                                        <p class="text-muted mb-1">
                                                                            Celebrating innovative solutions for a greener future
                                                                        </p>
                                                                    </div>
                                                                    <span class="badge bg-primary">Upcoming</span>
                                                                </div>
                                                                <small class="text-secondary">
                                                                    Event Date: 2024-12-15
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                                                                 <!--Item 16: Modern Minimal News Block:-->
                                                                                                 <li class="mb-3">
                                                                                                    <div class="news-modern-block border-bottom pb-3">
                                                                                                        <div class="row">
                                                                                                            <div class="col-auto pe-0">
                                                                                                                <div class="news-icon bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                                                                                                     style="width: 60px; height: 60px;">
                                                                                                                    🌍
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <h6 class="mb-1">
                                                                                                                    <a href="#" class="text-decoration-none text-dark">
                                                                                                                        Global Sustainability Summit
                                                                                                                    </a>
                                                                                                                </h6>
                                                                                                                <p class="text-muted small mb-1">
                                                                                                                    International conference on ecological innovations and climate solutions
                                                                                                                </p>
                                                                                                                <div class="d-flex justify-content-between align-items-center">
                                                                                                                    <small class="text-secondary">Event: 2024-12-15</small>
                                                                                                                    <span class="badge bg-success">Upcoming</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>
                                                                                                 
                                                <!-- Dark Mode News Item: Item 2 --> 
                                                <li class="mb-3">
                                                    <div class="news-item bg-dark text-white p-3 rounded">
                                                        <div class="row">
                                                            <div class="col-sm-3 text-center">
                                                                <img 
                                                                    src="https://via.placeholder.com/150" 
                                                                    alt="Breaking News" 
                                                                    class="img-fluid rounded-circle mb-2" 
                                                                    width="150" 
                                                                    height="150"
                                                                >
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <h4 class="h4">
                                                                    <a href="#" class="text-warning text-decoration-none">
                                                                        Urgent: Climate Change Summit Announced
                                                                    </a>
                                                                </h4>
                                                                <p class="text-light small mb-1">
                                                                    Global leaders to discuss critical environmental strategies
                                                                </p>
                                                                <small class="text-muted">Published on 2024-11-15</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                {{-- Timeline-style News Item: --}}
                                                <li class="mb-3 position-relative">
                                                    <div class="news-timeline-item ps-4 border-start border-primary">
                                                        <div class="timeline-indicator position-absolute"></div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <small class="text-muted d-block mb-2">
                                                                    November 28, 2024
                                                                </small>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h6 class="mb-1">
                                                                    <a href="#" class="text-decoration-none text-dark">
                                                                        Space Exploration Breakthrough
                                                                    </a>
                                                                </h6>
                                                                <p class="text-muted small mb-2">
                                                                    NASA announces groundbreaking discovery in deep space research
                                                                </p>
                                                                <span class="badge bg-info">Science</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                                                    <!--Item : Split Layout News Item: -->
                                            <li class="mb-3">
                                            <div class="news-split-layout row g-0 border rounded overflow-hidden">
                                                <div class="col-md-4 position-relative">
                                                    <img 
                                                        src="https://via.placeholder.com/400x300" 
                                                        alt="News feature" 
                                                        class="img-fluid w-100 h-100 object-fit-cover"
                                                    >
                                                    <div class="position-absolute top-0 start-0 p-2 bg-primary text-white">
                                                        <small>Tech News</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 p-3">
                                                    <h5 class="mb-2">
                                                        <a href="#" class="text-decoration-none text-dark">
                                                            Quantum Computing Breakthrough
                                                        </a>
                                                    </h5>
                                                    <p class="text-muted small mb-3">
                                                        Scientists achieve unprecedented quantum stability, opening new research frontiers
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small class="text-secondary">Published: 2024-11-28</small>
                                                        <span class="badge bg-warning">Breaking</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                                <!-- Compact News Card: Item 3 --> {{--  --}}
                                                <li class="mb-2">
                                                    <div class="card news-item">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start">
                                                                <img 
                                                                    src="https://via.placeholder.com/80" 
                                                                    alt="News icon" 
                                                                    class="me-3 rounded" 
                                                                    width="80" 
                                                                    height="80"
                                                                >
                                                                <div>
                                                                    <h5 class="card-title mb-1">
                                                                        <a href="#" class="text-primary">
                                                                            Tech Innovation Conference 2024
                                                                        </a>
                                                                    </h5>
                                                                    <p class="card-text small text-muted">
                                                                        Join us for groundbreaking technology presentations
                                                                    </p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <small class="text-secondary">Date: 2024-12-01</small>
                                                                        <span class="badge bg-info">New</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- Item 4 -->
        
                                                <!--Item 5 -->
                                                <!--Item 6 -->
                                                
                                                <!--Item 8 -->{{-- Media-style News List Item: --}}
                                                <li class="mb-3">
                                                    <div class="media news-media-item d-flex align-items-start p-3 border rounded">
                                                        <img 
                                                            src="https://via.placeholder.com/100" 
                                                            alt="Media news icon" 
                                                            class="me-3 rounded" 
                                                            width="100" 
                                                            height="100"
                                                        >
                                                        <div class="media-body">
                                                            <h6 class="mt-0 mb-1">
                                                                <a href="#" class="text-decoration-none text-info">
                                                                    Healthcare Innovation Summit
                                                                </a>
                                                            </h6>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="text-muted small mb-0">
                                                                    Exploring cutting-edge medical technologies and research
                                                                </p>
                                                                <span class="badge bg-success">Upcoming</span>
                                                            </div>
                                                            <small class="text-secondary">Date: 2024-12-05</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Item 9 -->

                                                <!--Item 11 -->
                                                <!--Item 12 -->
                                                                                            {{--v1 Grid-style News Card: --}}
                                            <li class="mb-4">
                                                <div class="card news-grid-item overflow-hidden">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img 
                                                                src="https://via.placeholder.com/300x200" 
                                                                alt="News feature image" 
                                                                class="img-fluid w-100 h-100 object-fit-cover" 
                                                                style="max-height: 250px;"
                                                            >
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <a href="#" class="text-decoration-none text-primary">
                                                                        Global Economic Trends Report
                                                                    </a>
                                                                </h5>
                                                                <p class="card-text text-muted">
                                                                    Comprehensive analysis of emerging market dynamics and future predictions
                                                                </p>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <small class="text-secondary">Published: 2024-11-25</small>
                                                                    <span class="badge bg-warning text-dark">Analysis</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                                 
                                                 <!--Item 19: Advanced Technical Conference News Item-->
                                                <li class="mb-3">
                                                    <div class="news-technical-block border rounded p-3 position-relative">
                                                        <!-- Event Type Flag -->
                                                        <div class="position-absolute top-0 start-0 bg-danger text-white p-1 px-2">
                                                            <small>Tech Conference</small>
                                                        </div>
                                                        
                                                        <!-- Responsive Flexbox Layout -->
                                                        <div class="d-flex flex-column flex-md-row align-items-start">
                                                            <!-- Conference Logo/Icon -->
                                                            <div class="me-3 mb-2 mb-md-0">
                                                                <img 
                                                                    src="https://via.placeholder.com/150" 
                                                                    alt="Conference Logo" 
                                                                    class="img-fluid rounded shadow-sm"
                                                                    style="max-width: 120px;"
                                                                >
                                                            </div>
                                                            
                                                            <!-- Content Section -->
                                                            <div class="flex-grow-1">
                                                                <h5 class="mb-2">
                                                                    <a href="#" class="text-decoration-none text-dark">
                                                                        AI & Machine Learning Global Summit
                                                                    </a>
                                                                </h5>
                                                                <p class="text-muted small mb-3">
                                                                    Cutting-edge insights into artificial intelligence, machine learning, and their transformative potential across industries
                                                                </p>
                                                                
                                                                <!-- Detailed Metadata -->
                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <small class="text-secondary d-block">
                                                                            <i class="bi bi-calendar me-1"></i> December 15-17, 2024
                                                                        </small>
                                                                        <small class="text-secondary">
                                                                            <i class="bi bi-geo-alt me-1"></i> San Francisco, CA
                                                                        </small>
                                                                    </div>
                                                                    <div class="col-md-6 text-md-end">
                                                                        <span class="badge bg-success">Early Bird Pricing</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Videos Tab -->
                        
                            <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">
                                <div class="container">
                                    <div class="videos-ticker">
                                        <div class="videos-ticker-wrapper space-y-4" id="videosTickerWrapper" >
                                                <!-- Videos content -->
                                            <ul class="list-unstyled space-y-4">
                                                    <!-- Vidoes list items -->

                                                @foreach(range(1,2) as $item)
                                                <li>
                                                    <div class="card news-grid-item overflow-hidden rounded-lg shadow-md">
                                                        <div class="md:flex">
                                                            <div class="md:flex-shrink-0">
                                                                <img 
                                                                    src="https://via.placeholder.com/300x200" 
                                                                    alt="Video feature image" 
                                                                    class="w-full md:w-48 h-48 object-cover"
                                                                >
                                                            </div>
                                                            <div class="p-4 flex-grow">
                                                                <h5 class="text-xl font-bold text-gray-900">
                                                                    <a href="#" class="hover:text-blue-600 transition-colors">
                                                                        Global Economic Trends Report
                                                                    </a>
                                                                </h5>
                                                                <p class="text-gray-600 mt-2">
                                                                    Comprehensive analysis of emerging market dynamics and future predictions
                                                                </p>
                                                                <div class="mt-4 flex justify-between items-center">
                                                                    <span class="text-sm text-gray-500">Published: {{ now()->format('Y-m-d') }}</span>
                                                                    <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded">Analysis</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- Item v2: Corporate News Card with Detailed Layout -->
                                            <li class="mb-4">
                                                <div class="card corporate-news-card shadow-sm overflow-hidden">
                                                    <!-- Header with Category and Status -->
                                                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                        <h6 class="mb-0">Corporate Innovation</h6>
                                                        <span class="badge bg-light text-primary">Strategic Update</span>
                                                    </div>
                                                    
                                                    <!-- Responsive Content Grid -->
                                                    <div class="card-body">
                                                        <div class="row g-3 align-items-center">
                                                            <!-- Company Logo/Image Column -->
                                                            <div class="col-md-3 text-center">
                                                                <img 
                                                                    src="https://via.placeholder.com/250" 
                                                                    alt="Corporate Event Thumbnail" 
                                                                    class="img-fluid rounded-circle shadow"
                                                                >
                                                            </div>
                                                            
                                                            <!-- News Content Column -->
                                                            <div class="col-md-9">
                                                                <h4 class="card-title mb-2">
                                                                    <a href="#" class="text-decoration-none text-dark">
                                                                        NextGen Leadership Summit 2024
                                                                    </a>
                                                                </h4>
                                                                <p class="text-muted small mb-3">
                                                                    Comprehensive leadership development program focusing on emerging technologies and strategic management
                                                                </p>
                                                                
                                                                <!-- Metadata and Action Buttons -->
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div class="text-secondary">
                                                                        <small class="d-block">Date: 2024-12-10</small>
                                                                        <small>Location: Global Virtual Conference</small>
                                                                    </div>
                                                                    <div class="btn-group" role="group">
                                                                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                                                                        <a href="#" class="btn btn-sm btn-primary">Register</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                             <!--Item v3 -->{{-- Compact Vertical News Item: --}}
                                             <li class="mb-3">
                                                <div class="news-vertical-item text-center">
                                                    <img 
                                                        src="https://via.placeholder.com/200" 
                                                        alt="Vertical news thumbnail" 
                                                        class="img-fluid rounded-circle mb-1" 
                                                        width="200" 
                                                        height="200"
                                                        style="margin-left: 170px"
                                                    >
                                                    <div class="news-content">
                                                        <h5 class="mb-2">
                                                            <a href="#" class="text-decoration-none text-danger">
                                                                Innovative Technology Showcase
                                                            </a>
                                                        </h5>
                                                        <p class="text-muted small mb-2">
                                                            Highlighting breakthrough innovations across multiple industries
                                                        </p>
                                                        <small class="text-secondary">Event Date: 2024-12-10</small>
                                                    </div>
                                                </div>
                                            </li>

                                             <!--Item v4: Scientific Research News Presentation-->
                                                <li class="mb-4">
                                                    <div class="card scientific-news-card">
                                                        <!-- Research Category Header -->
                                                        <div class="card-header bg-info text-white d-flex justify-content-between">
                                                            <h6 class="mb-0">Scientific Breakthrough</h6>
                                                            <span class="badge bg-light text-info">Peer Reviewed</span>
                                                        </div>
                                                        
                                                        <!-- Comprehensive Research Overview -->
                                                        <div class="card-body">
                                                            <div class="row g-3">
                                                                <!-- Research Visualization -->
                                                                <div class="col-md-4">
                                                                    <img 
                                                                        src="https://via.placeholder.com/350x250" 
                                                                        alt="Research Visualization" 
                                                                        class="img-fluid rounded shadow-sm"
                                                                    >
                                                                </div>
                                                                
                                                                <!-- Detailed Research Description -->
                                                                <div class="col-md-8">
                                                                    <h4 class="card-title mb-2">
                                                                        <a href="#" class="text-decoration-none text-dark">
                                                                            Quantum Entanglement: A New Computational Paradigm
                                                                        </a>
                                                                    </h4>
                                                                    <p class="text-muted small mb-3">
                                                                        Groundbreaking research revealing unprecedented quantum computing capabilities that challenge existing computational limitations
                                                                    </p>
                                                                    
                                                                    <!-- Research Metadata -->
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <small class="text-secondary d-block">
                                                                                Published in: <strong>Nature Scientific Journal</strong>
                                                                            </small>
                                                                            <small class="text-secondary">
                                                                                Research Team: MIT Quantum Labs
                                                                            </small>
                                                                        </div>
                                                                        <div class="col-md-6 text-md-end">
                                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                                Full Research Paper
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
        
                                                <!--Item v5: -->
                                                <!-- Educational Research Grant News -->
                                                <li class="mb-3">
                                                    <div class="card research-grant-card">
                                                        <div class="card-header bg-info text-white d-flex justify-content-between">
                                                            <h6 class="mb-0">Research Funding Opportunity</h6>
                                                            <span class="badge bg-light text-info">Open Application</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <img 
                                                                        src="https://via.placeholder.com/350x250" 
                                                                        alt="Research Grant" 
                                                                        class="img-fluid rounded shadow-sm"
                                                                    >
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 class="card-title mb-2">
                                                                        <a href="#" class="text-decoration-none text-dark">
                                                                            Interdisciplinary Climate Research Grant
                                                                        </a>
                                                                    </h4>
                                                                    <p class="text-muted small mb-3">
                                                                        Calling all researchers: Comprehensive funding opportunity for innovative climate change research projects
                                                                    </p>
                                                                    
                                                                    <div class="grant-details">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h6>Key Details:</h6>
                                                                                <ul class="list-unstyled small">
                                                                                    <li>💰 Total Funding: $500,000</li>
                                                                                    <li>📅 Application Deadline: January 30, 2025</li>
                                                                                    <li>🎓 Open to PhD Candidates & Postdoctoral Researchers</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h6>Research Areas:</h6>
                                                                                <span class="badge bg-success me-1">Climate Modeling</span>
                                                                                <span class="badge bg-warning">Sustainable Solutions</span>
                                                                                <span class="badge bg-info">Environmental Policy</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="mt-3 d-flex justify-content-between align-items-center">
                                                                        <button class="btn btn-success me-2">
                                                                            <i class="bi bi-download"></i> Download Proposal Guidelines
                                                                        </button>
                                                                        <button class="btn btn-outline-primary">
                                                                            <i class="bi bi-envelope"></i> Contact Grant Committee
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Item v6: -->
                                                <li class="mb-4">
                                                    <div class="card news-grid-item overflow-hidden">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img 
                                                                    src="https://via.placeholder.com/300x200" 
                                                                    alt="News feature image" 
                                                                    class="img-fluid w-100 h-100 object-fit-cover" 
                                                                    style="max-height: 250px;"
                                                                >
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        <a href="#" class="text-decoration-none text-primary">
                                                                            Global Economic Trends Report
                                                                        </a>
                                                                    </h5>
                                                                    <p class="card-text text-muted">
                                                                        Comprehensive analysis of emerging market dynamics and future predictions
                                                                    </p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <small class="text-secondary">Published: 2024-11-25</small>
                                                                        <span class="badge bg-warning text-dark">Analysis</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                 <!--Item 13: Overlay Image News Card: -->
                                                 <li class="mb-4">
                                                    <div class="card news-overlay-card position-relative">
                                                        <img 
                                                            src="https://via.placeholder.com/800x400" 
                                                            alt="News background" 
                                                            class="card-img img-fluid" 
                                                            style="height: 300px; object-fit: cover;"
                                                        >
                                                        <div class="card-img-overlay d-flex flex-column justify-content-end text-white p-4" 
                                                             style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);">
                                                            <h4 class="card-title">
                                                                <a href="#" class="text-decoration-none text-white">
                                                                    Urban Innovation Challenge 2024
                                                                </a>
                                                            </h4>
                                                            <p class="card-text small">
                                                                Transforming cities through groundbreaking technological solutions
                                                            </p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <small>Submission Deadline: 2024-12-20</small>
                                                                <span class="badge bg-success">Open</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
        
        
                                                 <!--v 9:Layered News Card: -->
                                                 <li class="mb-4">
                                                    <div class="card news-layered-card shadow-sm">
                                                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-0">Global Health Report</h6>
                                                            <span class="badge bg-danger">Critical</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-3">
                                                                    <img 
                                                                        src="https://via.placeholder.com/250" 
                                                                        alt="Health statistics" 
                                                                        class="img-fluid rounded"
                                                                    >
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h5 class="card-title mb-2">
                                                                        <a href="#" class="text-decoration-none text-info">
                                                                            Pandemic Preparedness Strategies
                                                                        </a>
                                                                    </h5>
                                                                    <p class="card-text text-muted small mb-3">
                                                                        Comprehensive analysis of global health infrastructure and emergency response mechanisms
                                                                    </p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <small class="text-secondary">Updated: 2024-12-01</small>
                                                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                                                            Full Report
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Item 21: -->
                                                <!-- Interactive Tech News Card -->
                                                <li class="mb-4">
                                                    <div class="news-interactive-card position-relative overflow-hidden" 
                                                        style="transition: all 0.3s ease; cursor: pointer;">
                                                        <div class="card shadow-sm hover-lift">
                                                            <!-- Overlay Effect -->
                                                            <div class="card-img-overlay d-flex flex-column justify-content-end p-4 text-white" 
                                                                style="background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                                                                <h4 class="card-title mb-2">
                                                                    <a href="#" class="text-decoration-none text-white">
                                                                        AI-Driven Innovation Summit
                                                                    </a>
                                                                </h4>
                                                                <p class="card-text small mb-3">
                                                                    Exploring cutting-edge artificial intelligence technologies and their transformative potential
                                                                </p>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <small>December 15-17, 2024</small>
                                                                    <div class="btn-group" role="group">
                                                                        <button class="btn btn-sm btn-outline-light">Details</button>
                                                                        <button class="btn btn-sm btn-light">Register</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img 
                                                                src="https://via.placeholder.com/800x400" 
                                                                alt="Tech Conference" 
                                                                class="card-img img-fluid" 
                                                                style="height: 300px; object-fit: cover;"
                                                            >
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Item 22: -->
                                                <!--Item 23: -->

                                                <!--Item 24: -->
                                                <!-- Multi-State Interactive News Card -->
                                                <li class="mb-4">
                                                    <div class="news-multi-state-card card" 
                                                        data-interactive="true" 
                                                        style="transition: all 0.3s ease;">
                                                        <div class="card-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-4">
                                                                    <img 
                                                                        src="https://via.placeholder.com/350x250" 
                                                                        alt="Event Thumbnail" 
                                                                        class="img-fluid rounded interactive-image" 
                                                                        data-hover-zoom="true"
                                                                    >
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h4 class="card-title">
                                                                            <a href="#" class="text-decoration-none text-dark">
                                                                                Global Innovation Forum 2024
                                                                            </a>
                                                                        </h4>
                                                                        <div class="btn-group btn-group-sm" role="group">
                                                                            <button class="btn btn-outline-primary active" data-state="overview">
                                                                                Overview
                                                                            </button>
                                                                            <button class="btn btn-outline-primary" data-state="speakers">
                                                                                Speakers
                                                                            </button>
                                                                            <button class="btn btn-outline-primary" data-state="schedule">
                                                                                Schedule
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="news-content-states">
                                                                        <div class="state-content active" data-state="overview">
                                                                            <p class="text-muted small mb-3">
                                                                                A groundbreaking event bringing together global innovators, thought leaders, and industry experts to shape the future of technology and business
                                                                            </p>
                                                                        </div>
                                                                        
                                                                        <div class="state-content d-none" data-state="speakers">
                                                                            <div class="row g-2">
                                                                                <div class="col-4">
                                                                                    <img 
                                                                                        src="https://via.placeholder.com/100" 
                                                                                        alt="Speaker" 
                                                                                        class="img-fluid rounded-circle"
                                                                                    >
                                                                                    <small class="d-block text-center mt-1">Jane Doe</small>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <img 
                                                                                        src="https://via.placeholder.com/100" 
                                                                                        alt="Speaker" 
                                                                                        class="img-fluid rounded-circle"
                                                                                    >
                                                                                    <small class="d-block text-center mt-1">John Smith</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="state-content d-none" data-state="schedule">
                                                                            <ul class="list-unstyled small">
                                                                                <li>🕒 09:00 - Opening Keynote</li>
                                                                                <li>🕓 11:00 - Innovation Panels</li>
                                                                                <li>🕔 14:00 - Networking Session</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                                                        <small class="text-secondary">December 10-12, 2024</small>
                                                                        <button class="btn btn-primary">Register Now</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Item 25: -->
                                                <!-- Modern Online Learning News Card -->
                                                <li class="mb-4">
                                                    <div class="card education-news-card shadow-sm overflow-hidden">
                                                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-0">Online Learning Update</h6>
                                                            <span class="badge bg-light text-primary">New Course</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3 text-center">
                                                                    <img 
                                                                        src="https://via.placeholder.com/250" 
                                                                        alt="Course Thumbnail" 
                                                                        class="img-fluid rounded-circle shadow"
                                                                    >
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h4 class="card-title mb-2">
                                                                        <a href="#" class="text-decoration-none text-dark">
                                                                            Advanced Machine Learning Certification
                                                                        </a>
                                                                    </h4>
                                                                    <p class="text-muted small mb-3">
                                                                        Comprehensive online program covering cutting-edge AI and machine learning technologies with hands-on project-based learning
                                                                    </p>
                                                                    <div class="course-details">
                                                                        <div class="row g-2">
                                                                            <div class="col-md-4">
                                                                                <small class="text-secondary d-block">
                                                                                    <i class="bi bi-clock me-1"></i> 12 Weeks
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <small class="text-secondary d-block">
                                                                                    <i class="bi bi-laptop me-1"></i> Online Self-Paced
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <small class="text-secondary d-block">
                                                                                    <i class="bi bi-award me-1"></i> Certified Completion
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                                                        <div class="price-tag">
                                                                            <span class="h5 text-success mb-0">$299</span>
                                                                            <small class="text-muted d-block">Limited Time Offer</small>
                                                                        </div>
                                                                        <div class="btn-group" role="group">
                                                                            <button class="btn btn-outline-primary">Course Details</button>
                                                                            <button class="btn btn-primary">Enroll Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
        
                                                    <!--Item 27: -->
                                                <!-- Advanced Academic Conference News -->

                                                <!--Item 28: -->
                                                <!-- Scholarship Opportunity News Card -->
                                                <li class="mb-3">
                                                    <div class="card scholarship-news-card">
                                                        <div class="card-body">
                                                            <div class="row g-3 align-items-center">
                                                                <div class="col-md-3 text-center">
                                                                    <div class="scholarship-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                                                        style="width: 120px; height: 120px; margin: 0 auto;">
                                                                        <h3 class="mb-0">🎓</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h4 class="card-title">
                                                                            <a href="#" class="text-decoration-none text-dark">
                                                                                Global STEM Leadership Scholarship
                                                                            </a>
                                                                        </h4>
                                                                        <span class="badge bg-success">Open Application</span>
                                                                    </div>
                                                                    
                                                                    <p class="text-muted small mb-3">
                                                                        Fully funded scholarship program supporting exceptional STEM students from underrepresented communities
                                                                    </p>
                                                                    
                                                                    <div class="scholarship-details">
                                                                        <div class="row g-2">
                                                                            <div class="col-md-4">
                                                                                <small class="text-secondary d-block">
                                                                                    <i class="bi bi-cash-stack me-1"></i> Full Tuition Coverage
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <small class="text-secondary d-block">
                                                                                    <i class="bi bi-globe me-1"></i> International Students
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <small class="text-secondary d-block">
                                                                                    <i class="bi bi-calendar-check me-1"></i> Deadline: Feb 15, 2025
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                                                        <div class="eligibility-tags">
                                                                            <span class="badge bg-primary me-1">Undergraduate</span>
                                                                            <span class="badge bg-info">Graduate</span>
                                                                        </div>
                                                                        <div class="btn-group" role="group">
                                                                            <button class="btn btn-outline-primary">Eligibility Criteria</button>
                                                                            <button class="btn btn-primary">Apply Now</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Contact Tab -->
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="container">
                                    <div class="contact-ticker">
                                        <div class="contact-ticker-wrapper space-y-4" id="contactTickerWrapper">
                                            <!-- contacts list content -->
                                            @foreach(range(1,1) as $item)
                                            <ul class="list-unstyled">
                                                
                                                <li>
                                                    @foreach([
                                                        ['title' => 'CHAIRMAN', 'name' => 'Prof. Nasrullah Khan Yousafzai'],
                                                        ['title' => 'SECRETARY', 'name' => 'Mehdi Jannnnnnnnnnnnnn']
                                                    ] as $contact)
                                                        <div class="box item bg-white shadow-md rounded-lg p-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-24 h-24 object-cover rounded-md" src="https://via.placeholder.com/200x180" alt="Contact Image">
                                                                </div>
                                                                <div class="flex-grow">
                                                                    <a href="#" class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors">
                                                                        {{ $contact['title'] }}
                                                                    </a>
                                                                    <div class="text-sm text-red-600 mt-2">
                                                                        {{ $contact['name'] }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(!$loop->last)
                                                            <hr class="my-4 border-gray-200">
                                                        @endif
                                                    @endforeach
                                                </li>
                                                @endforeach
                                                <hr>
                                                <!--Item 17:Interactive News Tile: -->
                                                <li class="mb-3">
                                                    <div class="news-interactive-tile position-relative border rounded p-3">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <img 
                                                                    src="https://via.placeholder.com/300x200" 
                                                                    alt="Interactive news image" 
                                                                    class="img-fluid rounded"
                                                                >
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                                    <h5 class="mb-0">
                                                                        <a href="#" class="text-decoration-none text-primary">
                                                                            Innovations in Renewable Energy
                                                                        </a>
                                                                    </h5>
                                                                    <span class="badge bg-info">Trending</span>
                                                                </div>
                                                                <p class="text-muted small mb-3">
                                                                    Exploring cutting-edge technologies revolutionizing sustainable energy production
                                                                </p>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <small class="text-secondary">Published: 2024-11-25</small>
                                                                    <div class="btn-group btn-group-sm" role="group">
                                                                        <a href="#" class="btn btn-outline-primary">Read</a>
                                                                        <a href="#" class="btn btn-outline-secondary">Share</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!--Simple News Item: Item 2-->
                                                                                                <!-- Expandable News Item -->
                                                                                                <li class="mb-3">
                                                                                                    <div class="news-expandable-card card" data-bs-toggle="collapse" data-bs-target="#newsDetails1">
                                                                                                        <div class="card-header d-flex justify-content-between align-items-center">
                                                                                                            <h5 class="mb-0">
                                                                                                                Global Sustainability Innovation Challenge
                                                                                                            </h5>
                                                                                                            <div class="btn-group btn-group-sm" role="group">
                                                                                                                <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#newsDetails1">
                                                                                                                    <i class="bi bi-chevron-down"></i> Expand
                                                                                                                </button>
                                                                                                                <button class="btn btn-primary">
                                                                                                                    <i class="bi bi-share"></i> Share
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                        <div id="newsDetails1" class="collapse card-body">
                                                                                                            <div class="row g-3">
                                                                                                                <div class="col-md-4">
                                                                                                                    <img 
                                                                                                                        src="https://via.placeholder.com/350x250" 
                                                                                                                        alt="Sustainability Challenge" 
                                                                                                                        class="img-fluid rounded"
                                                                                                                    >
                                                                                                                </div>
                                                                                                                <div class="col-md-8">
                                                                                                                    <p class="text-muted">
                                                                                                                        A global initiative seeking innovative solutions to address critical environmental challenges, 
                                                                                                                        with a focus on sustainable technologies and community-driven approaches.
                                                                                                                    </p>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-6">
                                                                                                                            <h6>Key Details:</h6>
                                                                                                                            <ul class="list-unstyled small">
                                                                                                                                <li>📅 Application Deadline: January 15, 2025</li>
                                                                                                                                <li>💰 Prize Pool: $500,000</li>
                                                                                                                                <li>🌍 Global Participation</li>
                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6">
                                                                                                                            <h6>Challenge Categories:</h6>
                                                                                                                            <span class="badge bg-success me-1">Climate Tech</span>
                                                                                                                            <span class="badge bg-info">Green Energy</span>
                                                                                                                            <span class="badge bg-warning">Circular Economy</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="mt-3">
                                                                                                                        <button class="btn btn-success me-2">
                                                                                                                            <i class="bi bi-download"></i> Download Brochure
                                                                                                                        </button>
                                                                                                                        <button class="btn btn-outline-primary">
                                                                                                                            <i class="bi bi-envelope"></i> Contact Organizers
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>   
                                                

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>            
                        </div>
                    </div>
                
                    <div id="mySidebar2" class="sidebar2 transition-all duration-500 ease-in-out">
                        <!-- Additional content -->
                    </div>
                
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                        <div class="min-vh-100 py-5">
                            <div class="container">
                                <div class="row">
                                    @yield('content')
                                </div>
                            </div>        
                        </div>
                    </div>
                </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 pt-4">
            <div class="row">
                <div class="col-sm-3">
                    <h3 >Useful Links</h3>
                    <p>&nbsp;</p>
                    <li><a href="/page-10008.html">Terms and Conditions</a></li>
                    <li><a href="/page-10008.html">Privacy Policy</a></li>
                    <li><a href="/page-10008.html">Contact</a></li>
                    <li><a href="/page-10008.html">About Us</a></li>

                </div>
                <div class="col-sm-3 flinks" >
                    <h3 >QUICK LINKS</h3>
                    <ul >
                        <li><a href="/page-10016.html">Board History</a></li>
                        <li><a href="/page-10019.html">Fee Structure</a></li>
                        <li><a href="/results/">Results</a></li>
                        <li><a href="/page-10022.html">Scholarships</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 flinks" >
                    <h3 >QUICK LINKS</h3>
                    <ul >
                        <li><a href="/page-10006.html">Downloads</a></li>
                        <li><a href="/page-10005.html">FAQs</a></li>
                        <li><a href="/page-10004.html">Position Holders</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 flinks">
                    <h3 >CONTACT US</h3>
                    <p>Please feel free to contact us.</p>
                    <a href="./page-10008.html" title="Contact Directory">Contact Directory</a>
                </div>
            </div>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="text-center text-gray-500">
                    &copy; {{ date('Y') }} 
                    <a href="http://127.0.0.1:8000/ target="_blank" rel="noopener noreferrer">
                        {{ config('app.name', 'BISE Bannu') }}
                    </a>. All rights reserved.    
                </div>
            </div>
        </footer>

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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach((item, index) => {
                    item.style.animationDelay = `${0.1 * (index + 1)}s`;
                });
            });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('#pills-tab .nav-link');
            const tabPanes = document.querySelectorAll('.tab-pane');
        
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active and show classes from all tabs and panes
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-blue-500', 'text-white');
                        btn.classList.add('text-gray-600', 'hover:bg-blue-100', 'hover:text-blue-700');
                        btn.setAttribute('aria-selected', 'false');
                    });
        
                    tabPanes.forEach(pane => {
                        pane.classList.remove('show', 'active');
                    });
        
                    // Add active classes to clicked tab and corresponding pane
                    this.classList.add('active', 'bg-blue-500', 'text-white');
                    this.classList.remove('text-gray-600', 'hover:bg-blue-100', 'hover:text-blue-700');
                    this.setAttribute('aria-selected', 'true');
        
                    const targetPaneId = this.getAttribute('data-target');
                    const targetPane = document.querySelector(targetPaneId);
                    targetPane.classList.add('show', 'active');
                });
            });
        });
        </script>


     
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
        const tabs = ['news', 'videos', 'contact', 'downloads']; // Add all tab IDs here

        tabs.forEach(tabId => {
            const wrapper = document.getElementById(`${tabId}TickerWrapper`);
            if (!wrapper) return; // Skip if wrapper doesn't exist

            // Specifically for news tickers 
            if (['news'].includes(tabId)) {
                function moveTicker() {
                    const list = wrapper.querySelector('ul');
                    if (!list) return;

                    const listItems = list.querySelectorAll('li');
                    if (listItems.length <= 1) return;

                    // Ensure list has relative positioning and hidden overflow
                    list.style.position = 'relative';
                    list.style.overflow = 'hidden';
                    list.style.height = `${list.offsetHeight}px`;

                    // Take the first item
                    const firstItem = listItems[0];
                    const itemHeight = firstItem.offsetHeight;

                    // Prepare first item for animation
                    firstItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                    firstItem.style.transform = `translateY(-${itemHeight}px)`;
                    firstItem.style.opacity = '0';

                    // After animation, move item to end of list
                    // setTimeout(() => {
                    //     // Reset first item's styles
                    //     firstItem.style.transition = 'none';
                    //     firstItem.style.transform = 'translateY(0)';
                    //     firstItem.style.opacity = '1';

                    //     // Move to end of list
                    //     list.appendChild(firstItem);
                    // }, 500);

                    // After animation, move item to end
                    setTimeout(() => {
                        // Reset item styles
                        firstItem.style.transition = 'none';
                        firstItem.style.transform = 'translateY(0)';
                        firstItem.style.opacity = '1';

                        // Move to end of list
                        list.appendChild(firstItem);
                    }, 500);
                }

                // Move ticker every 3 seconds
                const intervalId = setInterval(moveTicker, 3000);

                // Optional: Pause on hover
                wrapper.addEventListener('mouseenter', () => clearInterval(intervalId));
                wrapper.addEventListener('mouseleave', () => {
                    clearInterval(intervalId);
                    setInterval(moveTicker, 3000);
                });
            }  

            // Specifically for video tickers
            if (['videos'].includes(tabId)) {
                let currentPosition = 0;
                // Fade and Slide:
                function moveTicker() {
                    // Find the <ul> within the wrapper
                    const list = wrapper.querySelector('ul');
                    if (!list) return;

                    // Get the first list item
                    const firstItem = list.querySelector('li');
                    if (!firstItem) return;

                    // Get the height of a single list item
                    const itemHeight = firstItem.offsetHeight || 50;

                    // Move the list up
                    currentPosition -= itemHeight;

                    // Reset position if it goes beyond content
                    if (Math.abs(currentPosition) >= list.scrollHeight / 2) {
                        currentPosition = 0;
                    }

                    // Apply smooth translation
                    list.style.transition = 'transform 0.5s ease';
                    list.style.transform = `translateY(${currentPosition}px)`;
                }

                // Move ticker every 2 seconds
                const intervalId = setInterval(moveTicker, 2000);

                // Optional: Pause on hover
                wrapper.addEventListener('mouseenter', () => clearInterval(intervalId));
                wrapper.addEventListener('mouseleave', () => {
                    // Restart the interval when mouse leaves
                    clearInterval(intervalId);
                    setInterval(moveTicker, 2000);
                });
            }
            

            // Specifically for contact tickers 
            if (['contact'].includes(tabId)) {
                let currentPosition = 0;
                
                // Flip Animation:
                // function moveTicker() {
                //     const list = wrapper.querySelector('ul');
                //     const firstItem = list.querySelector('li');
                    
                //     firstItem.style.transition = 'transform 0.5s';
                //     firstItem.style.transform = 'rotateX(90deg)';

                //     setTimeout(() => {
                //         list.appendChild(firstItem);
                //         firstItem.style.transform = 'rotateX(0)';
                //     }, 500);
                // }

                // Scale Down and Fade:
                // function moveTicker() {
                //     const list = wrapper.querySelector('ul');
                //     const firstItem = list.querySelector('li');
                    
                //     firstItem.style.transition = 'all 0.4s ease';
                //     firstItem.style.transform = 'scale(0.8)';
                //     firstItem.style.opacity = '0';

                //     setTimeout(() => {
                //         list.appendChild(firstItem);
                //         firstItem.style.transform = 'scale(1)';
                //         firstItem.style.opacity = '1';
                //     }, 400);
                // }

                // Subtle Bounce:
                // function moveTicker() {
                //     const list = wrapper.querySelector('ul');
                //     const firstItem = list.querySelector('li');
                    
                //     firstItem.style.transition = 'transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
                //     firstItem.style.transform = 'translateY(-100%) scale(0.9)';

                //     setTimeout(() => {
                //         list.appendChild(firstItem);
                //         firstItem.style.transform = 'translateY(0) scale(1)';
                //     }, 400);
                // }

                // Slide with Perspective:
                // function moveTicker() {
                //     const list = wrapper.querySelector('ul');
                //     const firstItem = list.querySelector('li');
                    
                //     list.style.perspective = '1000px';
                //     firstItem.style.transition = 'transform 0.5s';
                //     firstItem.style.transform = 'translateY(-100%) rotateX(90deg)';

                //     setTimeout(() => {
                //         list.appendChild(firstItem);
                //         firstItem.style.transform = 'translateY(0) rotateX(0)';
                //     }, 500);
                // }

                // 
                // function moveTicker() {
                //     const list = wrapper.querySelector('ul');
                //     if (!list) return;

                //     const listItems = list.querySelectorAll('li');
                //     if (listItems.length <= 1) return;

                //     // Slide up the first item
                //     const firstItem = listItems[0];
                //     const itemHeight = firstItem.offsetHeight;

                //     // Animate first item out
                //     firstItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                //     firstItem.style.transform = `translateX(-${itemHeight}px)`;
                //     firstItem.style.opacity = '0';

                //     // After animation, move item to end
                //     setTimeout(() => {
                //         // Reset item styles
                //         firstItem.style.transition = 'none';
                //         firstItem.style.transform = 'translateY(0)';
                //         firstItem.style.opacity = '1';

                //         // Move to end of list
                //         list.appendChild(firstItem);
                //     }, 500);
                // }

                // Slide Ticker
                function moveTicker() {
                    const list = wrapper.querySelector('ul');
                    const listItems = list.querySelectorAll('li');
                    if (listItems.length <= 1) return;

                    const firstItem = listItems[0];
                    const itemHeight = firstItem.offsetHeight;

                    firstItem.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
                    firstItem.style.transform = `translateX(-${itemHeight}px)`;
                    firstItem.style.opacity = '0';

                    setTimeout(() => {
                        firstItem.style.transition = 'none';
                        firstItem.style.transform = 'translateY(0)';
                        firstItem.style.opacity = '1';
                        list.appendChild(firstItem);
                    }, 500);
                }

                // Move ticker every 1 second
                const intervalId = setInterval(moveTicker, 3000);

                // Optional: Pause on hover
                wrapper.addEventListener('mouseenter', () => {
                    console.log('Mouse entered contact ticker');
                    clearInterval(intervalId);
                });
                wrapper.addEventListener('mouseleave', () => {
                    console.log('Mouse left contact ticker');
                    clearInterval(intervalId);
                    setInterval(moveTicker, 3000);
                });
            }
        });
    });
    </script> -->
        <!-- Scripts -->
        @stack('scripts')
        @livewireScripts
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>