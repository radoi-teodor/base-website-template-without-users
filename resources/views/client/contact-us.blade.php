@extends('layouts.client')

@section('title', 'Contact us')

@section('content')

  <div class="container mb-3">
    <div class="row d-flex mb-5 contact-info">

      <div class="col-md-12 mb-4">
        <h2 class="h3">Contact information</h2>
      </div>
      <div class="w-100"></div>
      <div class="col-md-3">
        <p><span>Address:</span> <br> New York</p>
      </div>
      <div class="col-md-3">
        <p><span>Telefon:</span> <br> <a href="tel:+40740123123">+40740123123</a></p>
      </div>
      <div class="col-md-3">
        @php
          $mail = 'example@'.Request::getHttpHost();
        @endphp
        <p><span>Email:</span> <br> <a href="mailto:{{ $mail }}">{{ $mail }}</a></p>
      </div>
      <div class="col-md-3">
        <p><span>Website:</span> <br> <a href="{{ url('/') }}">{{ url('/') }}</a></p>
      </div>
    </div>


    <div class="row block-9">

      <div class="col-md-12 order-md-last d-flex">
        <form action="{{ url('/contact-us') }}" method="post" class="bg-light p-5 contact-form form-row">
          @csrf

          <div class="col-12 mb-2">
            <h2>Contact us</h2>
          </div>

          @if(Auth::check())
            <div class="col-12">
              <p class="text-warning">The inputs are filled with your account data. Feel free to change the email or name if you want.</p>
            </div>
          @endif

          @php
            $name = '';
            $email = '';
            $subject = '';
            $message = '';

            if(Auth::check()){
              $user=Auth::user();
              $name = $user->name;
              $email = $user->email;
            }

            if($permalink!=null){
              $subject = 'Information about "'.$product->name.'" - #'.$product->id;
              $message = 'Hi merchant. I would like more information about a product that you are selling: "'.$product->name.'" with SKU: '.$product->id.
                          '. Thank you. I am waiting for your response.';
            }

          @endphp

          <input type="hidden" name="product" value="{{ $permalink }}">

          <div class="form-group col-12">
            <input type="text" class="form-control" name="name" placeholder="Your name" value="{{ $name }}" maxlength="300" required>
          </div>
          <div class="form-group col-12">
            <input type="text" class="form-control" name="email" placeholder="Your email" value="{{ $email }}" maxlength="300" required>
          </div>
          <div class="form-group col-12">
            <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ $subject }}" maxlength="300" required>
          </div>
          <div class="form-group col-12">
            <textarea cols="30" rows="7" name="message" class="form-control" placeholder="Message" required>{{ $message }}</textarea>
          </div>
          <div class="form-group col-12">
            <input type="submit" value="Send" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>


    </div>
  </div>

@endsection
