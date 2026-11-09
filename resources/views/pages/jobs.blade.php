
@extends('layout.layout')

@section('title', 'Find Jobs | Job Hunter')

@section('content')

<div class="dashboard">

    @include('components.sidebar')

    <main class="main-content">

        {{-- TOP BAR --}}
        <header class="topbar">
            <div>
                <p class="breadcrumb">Workspace / Find Jobs</p>
            </div>

            <div class="topbar-right">
                <span class="status-indicator"></span>
                <span class="topbar-status">Job Seeker Account</span>

                <div class="topbar-avatar">
                    {{ strtoupper(substr(auth()->user()->first_name ?? auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        {{-- PAGE INTRO --}}
        <section class="jobs-page-intro">
            <div>
                <p class="eyebrow">OPPORTUNITIES AWAIT</p>
                <h1>Find your next job</h1>
                <p>Discover opportunities that match your skills, interests and career goals.</p>
            </div>

            <span class="demo-label">DEMO LISTINGS</span>
        </section>

        {{-- SEARCH AND FILTERS --}}
        <section class="jobs-filter-panel">

            <form action="" method="GET">

                <div class="jobs-search-row">
                    <input
                        type="search"
                        name="q"
                        value="{{ $search }}"
                        placeholder="Search job title, company or skill..."
                    >

                    <button type="submit" class="primary-button">
                        Search Jobs
                    </button>
                </div>

                <div class="jobs-filter-row">

                    <select name="location">
                        <option value="">All Locations</option>
                        @foreach(['Nairobi', 'Embu', 'Nakuru', 'Remote'] as $place)
                            <option value="{{ $place }}" @selected($location === $place)>
                                {{ $place }}
                            </option>
                        @endforeach
                    </select>

                    <select name="type">
                        <option value="">All Employment Types</option>
                        @foreach(['Full-time', 'Part-time', 'Internship', 'Contract', 'Remote'] as $employmentType)
                            <option value="{{ $employmentType }}" @selected($type === $employmentType)>
                                {{ $employmentType }}
                            </option>
                        @endforeach
                    </select>

                    <select name="level">
                        <option value="">All Experience Levels</option>
                        @foreach(['Internship', 'Entry Level', 'Mid Level', 'Senior Level'] as $experience)
                            <option value="{{ $experience }}" @selected($level === $experience)>
                                {{ $experience }}
                            </option>
                        @endforeach
                    </select>

                    <a href="" class="clear-filters">
                        Clear Filters
                    </a>

                </div>

            </form>

        </section>

        {{-- RESULTS HEADER --}}
        <section class="jobs-results-header">
            <div>
                <h2>Available Opportunities</h2>
                <p>{{ $jobs->count() }} opportunities found</p>
            </div>
        </section>

        {{-- JOB LISTINGS --}}
        <section class="job-listings">

            @forelse($jobs as $job)

                <article class="job-card">

                    <div class="job-card-header">

                        <div class="company-avatar">
                            {{ strtoupper(substr($job->company?->name ?? 'U', 0, 1)) }}
                        </div>

                        <div class="job-title-area">
                            <h3>{{ $job['title'] }}</h3>
                            <p>{{ $job->company?->name ?? 'Unknown Company' }}</p>
                        </div>

                        <button type="button"
                                class="save-job-button"
                                title="Save job"
                                aria-label="Save {{ $job['title'] }}">
                            ♡
                        </button>

                    </div>

                    <div class="job-meta">

                        <span>📍 {{ $job['location'] }}</span>
                        <span>💼 {{ $job['type'] }}</span>
                        <span>🎓 {{ $job['level'] }}</span>

                    </div>

                    {{-- <p class="job-description">
                        {{ $job['description'] }}
                    </p> --}}

                    <div class="job-skills">
                        @if(!empty($job->skills))
                            @foreach((array) $job->skills as $skill)
                                <span>{{ $skill }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="job-card-footer">

                        <div>
                            <p>Published On: <strong>{{ $job->published_at?->format('d M Y') ?? 'Not specified' }}</strong></p>
                            <p>Deadline: <strong>{{ $job->deadline?->format('d M Y') ?? 'Not specified' }}</strong></p>
                            <small>{{ $job['posted'] }}</small>
                        </div>

                        <a href="#"
                           class="primary-button"
                           onclick="event.preventDefault(); alert('Applications will be enabled when we connect real job listings.');">
                            Apply Now →
                        </a>

                    </div>

                </article>

            @empty

                <div class="jobs-empty-state">
                    <div>⌕</div>
                    <h3>No jobs found</h3>
                    <p>Try changing your search keywords or filters.</p>

                    <a href="" class="secondary-button">
                        View All Jobs
                    </a>
                </div>

            @endforelse

        </section>

        <footer class="dashboard-footer">
            <p>© {{ date('Y') }} Job Hunter. Built for your next career move.</p>
        </footer>

    </main>

</div>

@endsection
