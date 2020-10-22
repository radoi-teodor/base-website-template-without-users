@extends('layouts.pdf')

@section('content')

  <p>Name: <b>{{ $message->name }}</b></p>
  <p>Email: <b>{{ $message->email }}</b></p>
  <p>Subject: <b>{{ $message->subject }}</b></p>
  <p>Date: <b>{{ $message->created_at->format('j F, Y') }}</b></p>

  <p>Message:</p>

  <p class="border p-1"><b>{!! nl2br(e($message->message)) !!}</b></p>

  @if ($product)
    Product:
    <hr>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="product card">
            <div class="card-body">
                <h4 class="card-title">{{ $product->name }}</h4>
                <h5 class="text-muted">Product SKU: {{ $product->id }}</h5>

            </div>
        </div>
    </div>
    <hr>

  @endif

@endsection
