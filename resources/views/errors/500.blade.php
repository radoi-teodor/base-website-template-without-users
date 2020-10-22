@extends('layouts.error')

@section('title', __('Server Error'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.deny-mark')
    </span>
    <h1>500 Error</h1>
    <h1>Server Error.</h1>
  </div>

@endsection
