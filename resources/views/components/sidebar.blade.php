
<aside class="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-icon">J</div>
        <span>Job Hunter</span>
    </div>

    {{-- NAVIGATION --}}
    <div class="sidebar-section">

        <p class="sidebar-label">WORKSPACE</p>

        <nav class="sidebar-nav">

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="nav-icon">⌂</span>
                Dashboard
            </a>
            <a href="{{ route('job') }}"
               class="nav-link {{ request()->routeIs('job') }}">
                <span class="nav-icon">⌕</span>
                Find Jobs
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">♡</span>
                Saved Jobs
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">▤</span>
                My Applications
            </a>

        </nav>

    </div>

    {{-- ACCOUNT --}}
    <div class="sidebar-section">

        <p class="sidebar-label">ACCOUNT</p>

        <nav class="sidebar-nav">

            <a href="#" class="nav-link">
                <span class="nav-icon">◎</span>
                My Profile
            </a>

        </nav>

    </div>

    {{-- USER AND LOGOUT --}}
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

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-button">
                <span class="nav-icon">↪</span>
                Logout
            </button>
        </form>

    </div>

</aside>
