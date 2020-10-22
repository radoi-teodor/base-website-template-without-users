@extends('layouts.client')

@section('title', 'Login')

@section('content')

<div class="col-xs-12 col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">Login</div>

        <div class="card-body">
            <form action="{{ url('/login') }}" method="post" class="was-validated">
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
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success text-light" href="{{ url('/register') }}">Don't have an account? Register</a>

            </form>
        </div>
    </div>
</div>


@endsection
