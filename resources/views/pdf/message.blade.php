@extends('layouts.pdf')

@section('content')

  <p>Name: <b>{{ $message->name }}</b></p>
  <p>Email: <b>{{ $message->email }}</b></p>
  <p>Subject: <b>{{ $message->subject }}</b></p>
  <p>Date: <b>{{ $message->created_at->format('j F, Y') }}</b></p>

  <p>Message:</p>

  <p class="border p-1"><b>{!! nl2br(e($message->message)) !!}</b></p>


@endsection
