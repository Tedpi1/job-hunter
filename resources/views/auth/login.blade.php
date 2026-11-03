@extends('layout.layout')

@section('title', 'Create Account | Job Hunter')

@section('content')

<div class="container">
    @if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif


<div class="brand">
    <div class="brand-icon">J</div>
    <h1>Welcome Back</h1>
    <p>Please sign in to continue.</p>
</div>

{{-- Success message --}}
@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

{{-- Validation errors --}}
@if ($errors->any())
    <div class="errors">
        <strong>Please correct the following:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Registration form --}}
<form method="POST" action="{{ route('register.store') }}">
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
                autocomplete="new-password"
                minlength="8"
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

    {{-- Submit --}}
    <button class="submit-button" type="submit">
        Login
    </button>

</form>

{{-- Login link --}}
{{-- <div class="footer">
    Already have an account?
    <a href="{{ route('login') }}">Sign in</a>
</div> --}}


</div>

@endsection

{{-- JavaScript --}}
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
