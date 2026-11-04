@extends('layout.layout')

@section('title', 'Sign In | Job Hunter')

@section('content')

<div class="container">

    {{-- Brand --}}
    <div class="brand">
        <div class="brand-icon">J</div>

        <h1>Welcome Back</h1>

        <p>Sign in to continue your job search with Job Hunter.</p>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="errors">
            <strong>Unable to sign in:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Login Form --}}
    <form method="POST" action="{{ route('login.store') }}">

        @csrf

        {{-- Email --}}
        <div class="field">
            <label for="email">Email address</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                autofocus
                required
            >
        </div>

        {{-- Password --}}
        <div class="field">
            <label for="password">Password</label>

            <div class="password-wrapper">

                <input
                    id="password"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required
                >

                <button
                    class="toggle-password"
                    type="button"
                    onclick="togglePassword('password', this)"
                >
                    Show
                </button>

            </div>
        </div>

        {{-- Remember Me --}}
        <div class="checkbox">
            <input
                id="remember"
                type="checkbox"
                name="remember"
                value="1"
            >

            <label for="remember">
                Remember me
            </label>
        </div>

        {{-- Submit --}}
        <button class="submit-button" type="submit">
            Sign In
        </button>

    </form>

    {{-- Registration Link --}}
    <div class="footer">
        Don't have an account?
        <a href="{{ route('register') }}">Create an account</a>
    </div>

</div>

@endsection

{{-- Password Visibility Script --}}
@push('scripts')
<script>
    function togglePassword(id, button) {
        const input = document.getElementById(id);
        const showing = input.type === 'text';

        input.type = showing ? 'password' : 'text';
        button.textContent = showing ? 'Show' : 'Hide';
    }
</script>
@endpush
