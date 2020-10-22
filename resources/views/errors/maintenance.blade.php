@extends('layouts.error')

@section('title', 'Website under maintenance')

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.deny-mark')
    </span>
    <h1>We are sorry</h1>
    <h1>This website is under maintenance for now. Try to refresh later.</h1>
  </div>

@endsection
