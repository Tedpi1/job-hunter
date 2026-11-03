@extends('layout.layout')

@section('title', 'Create Account | Job Hunter')

@section('content')

<div class="container">


<div class="brand">
    <div class="brand-icon">J</div>
    <h1>Join Job Hunter</h1>
    <p>Create your account and take the next step in your career.</p>
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

    {{-- First and Last Name --}}
    <div class="form-row">

        <div class="field">
            <label for="first_name">First name</label>

            <input
                id="first_name"
                type="text"
                name="first_name"
                value="{{ old('first_name') }}"
                autocomplete="given-name"
                required
            >
        </div>

        <div class="field">
            <label for="last_name">Last name</label>

            <input
                id="last_name"
                type="text"
                name="last_name"
                value="{{ old('last_name') }}"
                autocomplete="family-name"
                required
            >
        </div>

    </div>

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

    {{-- Phone --}}
    <div class="field">
        <label for="phone">Phone number</label>

        <input
            id="phone"
            type="tel"
            name="phone"
            value="{{ old('phone') }}"
            autocomplete="tel"
            placeholder="e.g. 0712345678"
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

    {{-- Confirm Password --}}
    <div class="field">
        <label for="password_confirmation">Confirm password</label>

        <div class="password-wrapper">

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                autocomplete="new-password"
                minlength="8"
                required
            >

            <button
                class="toggle-password"
                type="button"
                onclick="togglePassword('password_confirmation', this)"
            >
                Show
            </button>

        </div>
    </div>

    {{-- Terms and Conditions --}}
    <div class="checkbox">

        <input
            id="terms"
            type="checkbox"
            name="terms"
            value="1"
            @checked(old('terms'))
            required
        >

        <label for="terms">
            I agree to the
            <a href="#">Terms and Conditions</a>
            and
            <a href="#">Privacy Policy</a>.
        </label>

    </div>

    {{-- Submit --}}
    <button class="submit-button" type="submit">
        Create Account
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
