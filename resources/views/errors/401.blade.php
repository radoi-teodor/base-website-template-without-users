@extends('layouts.error')

@section('title', __('Unauthorized'))

@section('content')

  <div class="col-12 text-center">
    <span style="font-size: 6rem;">
      @include('client.components.icons.deny-mark')
    </span>
    <h1>401 Error</h1>
    <h1>You are not authorized!</h1>
  </div>

@endsection
