<div class="container">
    @if (session('status'))
      <br>
      <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('status') }}
      </div>
    @endif

    @if (session('message'))
      <br>
      <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('message') }}
      </div>
    @endif

    @if ($errors->any())

    @foreach ($errors->all() as $error)
      <br>
      <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ $error }}
      </div>
    @endforeach

    @endif
</div>
