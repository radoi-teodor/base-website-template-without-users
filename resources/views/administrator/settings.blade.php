@extends('layouts.administrator')

@section('title', 'Store settings')

@section('dependencies-addons')
  <style media="screen">
    .form-group {
      display: flex;
      align-items: center;
    }
  </style>
@endsection

@section('content')

  <div class="col-md-8 offset-md-2 col-xs-12 mt-3">
      <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body text-center">
            <form action="{{ url('/administrator/settings') }}" method="post">
                @csrf

                @foreach ($settings as $setting)
                  @php
                    $settings_name = ucfirst(Util::reverse_permalink($setting->name));
                  @endphp
                  <div class="form-group container">
                    <div class="col-md-4">
                      <label for="email">
                        {{ $settings_name }} *:
                      </label>
                    </div>

                    <div class="col-md-8">
                      <input type="{{ $setting->type }}" class="form-control" value="{{ $setting->value }}"
                      placeholder="Enter {{ $settings_name }}..." name="{{ $setting->name }}" required>
                    </div>
                  </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Edit</button>

            </form>
          </div>
      </div>
  </div>

@endsection
