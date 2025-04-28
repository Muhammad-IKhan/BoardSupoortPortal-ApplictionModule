<!-- resources/views/header/header.blade.php --> 
    <!-- Your navigation or header HTML code -->
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
    {{-- <nav class="border-b">
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
    </nav> --}} 


    {{-- main ,header 2 or sidebar --}}
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
                                        ['id' => 'services', 'label' => 'Services']
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

