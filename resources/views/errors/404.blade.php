@extends('layouts.error')

@section('title', __('Not Found'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.question-mark')
    </span>
    <h1>404 Error</h1>
    <h1>We cannot find what you are looking for.</h1>
  </div>

@endsection
