@extends('layout.layout')

@section('title', 'Dashboard | Job Hunter')

@section('content')

<div class="dashboard">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <span class="brand-icon">J</span>
            <span>Job Hunter</span>
        </a>

        <div class="sidebar-section">
            <p class="sidebar-label">WORKSPACE</p>

            <a href="{{ route('dashboard') }}" class="nav-link active">
                <span class="nav-icon">▦</span>
                Dashboard
            </a>

            <a href="#jobs" class="nav-link">
                <span class="nav-icon">⌕</span>
                Browse Jobs
            </a>

            <a href="#saved-jobs" class="nav-link">
                <span class="nav-icon">♡</span>
                Saved Jobs
            </a>

            <a href="#applications" class="nav-link">
                <span class="nav-icon">▤</span>
                My Applications
            </a>
        </div>

        <div class="sidebar-section">
            <p class="sidebar-label">ACCOUNT</p>

            <a href="#profile" class="nav-link">
                <span class="nav-icon">◎</span>
                My Profile
            </a>
        </div>

        <div class="sidebar-bottom">

            <div class="sidebar-user">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name, 0, 1)) }}
                </div>

                <div class="user-details">
                    <strong>
                        {{ auth()->user()->first_name ?? auth()->user()->name }}
                    </strong>

                    <span>Job Seeker</span>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-button">
                    <span>↪</span>
                    Sign Out
                </button>
            </form>

        </div>

    </aside>


    {{-- MAIN CONTENT --}}
    <main class="main-content">

        {{-- TOP BAR --}}
        <header class="topbar">

            <div>
                <p class="breadcrumb">Workspace / Dashboard</p>
            </div>

            <div class="topbar-right">

                <span class="status-indicator"></span>

                <span class="topbar-status">
                    Job Seeker Account
                </span>

                <div class="topbar-avatar">
                    {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name, 0, 1)) }}
                </div>

            </div>

        </header>


        {{-- PAGE INTRODUCTION --}}
        <section class="welcome-section">

            <div>
                <p class="eyebrow">YOUR CAREER STARTS HERE</p>

                <h1>
                    Welcome back,
                    {{ auth()->user()->first_name ?? auth()->user()->name }}!
                </h1>

                <p class="welcome-description">
                    Discover opportunities, explore companies, and take
                    the next step in your career.
                </p>
            </div>

            <a href="#jobs" class="primary-button">
                Explore Jobs <span>→</span>
            </a>

        </section>


        {{-- SEARCH --}}
        <section class="search-section" id="jobs">

            <div class="search-heading">
                <div>
                    <h2>Find your next opportunity</h2>

                    <p>
                        Search for jobs that match your skills and interests.
                    </p>
                </div>
            </div>

            <form action="#jobs" method="GET" class="job-search">

                <div class="search-input-wrapper">
                    <span class="search-symbol">⌕</span>

                    <input
                        type="search"
                        name="q"
                        placeholder="Job title, skill, or company..."
                        value="{{ request('q') }}"
                        aria-label="Search jobs"
                    >
                </div>

                <button type="submit" class="primary-button">
                    Search Jobs
                </button>

            </form>

        </section>


        {{-- STATISTICS --}}
        <section class="stats-grid">

            <article class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon blue-icon">▤</span>
                    <span class="stat-tag">Opportunities</span>
                </div>

                <p class="stat-label">Available Jobs</p>

                <h3>--</h3>

                <p class="stat-description">
                    Published vacancies will appear here.
                </p>

            </article>


            <article class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon purple-icon">♡</span>
                    <span class="stat-tag">Your collection</span>
                </div>

                <p class="stat-label">Saved Jobs</p>

                <h3>0</h3>

                <p class="stat-description">
                    Keep interesting opportunities close.
                </p>

            </article>


            <article class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon green-icon">↗</span>
                    <span class="stat-tag">Your progress</span>
                </div>

                <p class="stat-label">Applications</p>

                <h3>0</h3>

                <p class="stat-description">
                    Track the jobs you have applied for.
                </p>

            </article>

        </section>


        {{-- RECENT JOBS --}}
        <section class="jobs-section">

            <div class="section-heading">

                <div>
                    <h2>Recently Posted Jobs</h2>

                    <p>
                        Explore the latest opportunities from employers.
                    </p>
                </div>

                <a href="#jobs" class="text-link">
                    Browse all <span>→</span>
                </a>

            </div>


            <div class="empty-state">

                <div class="empty-state-icon">⌕</div>

                <h3>Your next opportunity is waiting</h3>

                <p>
                    Jobs will appear here once vacancies have been added
                    and published by the administrator.
                </p>

                <a href="#jobs" class="secondary-button">
                    Search Opportunities
                </a>

            </div>

        </section>


        {{-- QUICK LINKS --}}
        <section class="quick-links" id="saved-jobs">

            <a href="#jobs" class="quick-link-card">
                <div class="quick-link-icon blue-icon">⌕</div>

                <div>
                    <h3>Explore Opportunities</h3>

                    <p>Find vacancies that match your career goals.</p>
                </div>

                <span class="quick-arrow">→</span>
            </a>


            <a href="#profile" class="quick-link-card">
                <div class="quick-link-icon purple-icon">◎</div>

                <div>
                    <h3>Complete Your Profile</h3>

                    <p>Prepare your account for your job search.</p>
                </div>

                <span class="quick-arrow">→</span>
            </a>

        </section>


        {{-- FOOTER --}}
        <footer class="dashboard-footer">
            <p>© {{ date('Y') }} Job Hunter. Built for your next career move.</p>
        </footer>

    </main>

</div>

@endsection
