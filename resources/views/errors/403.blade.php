@extends('layouts.error')

@section('title', __('Forbidden'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.deny-mark')
    </span>
    <h1>403 Error</h1>
    <h1>Forbidden!</h1>
  </div>

@endsection
