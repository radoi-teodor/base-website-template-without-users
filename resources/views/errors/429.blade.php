@extends('layouts.error')

@section('title', __('Too Many Requests'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.question-mark')
    </span>
    <h1>429 Error</h1>
    <h1>Too Many Requests.</h1>
  </div>

@endsection
