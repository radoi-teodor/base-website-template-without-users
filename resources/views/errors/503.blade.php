@extends('layouts.error')

@section('title', __('Service Unavailable'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.deny-mark')
    </span>
    <h1>503 Error</h1>
    <h1>Service Unavailable.</h1>
  </div>

@endsection
