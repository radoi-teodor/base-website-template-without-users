@extends('layouts.error')

@section('title', __('Page expired'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.question-mark')
    </span>
    <h1>419 Error</h1>
    <h1>The page has expired.</h1>
  </div>

@endsection
