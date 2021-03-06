@extends('layouts.client')

@section('title', 'Register')

@section('content')

<div class="col-xs-12 col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">Register</div>

        <div class="card-body">
            <form action="{{ url('/register') }}" method="post" class="was-validated" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail *:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter e-mail" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password *:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="agree-policy" required> I agree on <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success text-light" href="{{ url('/login') }}">Already have an account? Login</a>

            </form>
        </div>
    </div>
</div>


@endsection
