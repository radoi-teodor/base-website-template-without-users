@extends('layouts.client')

@section('title', 'About us')

@section('content')

  <div class="container-fluid">

    <div class="row mb-5">
      <div class="col-md-3 offset-md-3 col-12">
        <h3>Who are we?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Praesent elementum facilisis leo vel. Scelerisque varius morbi enim nunc faucibus a pellentesque sit amet. Velit scelerisque
          in dictum non consectetur a erat nam. Habitant morbi tristique senectus et netus et malesuada fames ac. Arcu risus quis varius
          quam quisque. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus. Auctor augue mauris augue neque gravida in.
          Enim ut sem viverra aliquet eget sit amet tellus. Arcu risus quis varius quam quisque id diam vel quam.</p>
      </div>

      <div class="col-md-3 col-12">
        <img src="{{ asset('assets/imgs/img1.jpeg') }}" class="img-fluid w-100" alt="Who are we? {{ config('app.name') }}">
      </div>
    </div>

    <div class="row mb-3">

      <div class="col-md-3 offset-md-3 col-12">
        <img src="{{ asset('assets/imgs/img2.jpeg') }}" class="img-fluid w-100" alt="What is our mission? {{ config('app.name') }}">
      </div>

      <div class="col-md-3 col-12">
        <h3>What is our mission?</h3>
        <p>Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Integer eget aliquet nibh praesent tristique
          magna sit amet purus. Eu scelerisque felis imperdiet proin fermentum leo vel orci. Vitae purus faucibus ornare suspendisse sed nisi.
          Eget aliquet nibh praesent tristique magna. Lorem sed risus ultricies tristique nulla aliquet enim. Urna porttitor rhoncus dolor purus
          non enim praesent. Tristique magna sit amet purus gravida. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit.
          Tellus at urna condimentum mattis. Eleifend quam adipiscing vitae proin sagittis nisl. A cras semper auctor neque vitae tempus quam pellentesque.
          Morbi tempus iaculis urna id volutpat lacus.</p>
      </div>

    </div>

  </div>

@endsection
