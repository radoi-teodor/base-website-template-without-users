@extends('layouts.administrator')

@section('title', 'Add blog')

@section('content')

  <div class="container-fluid mt-5">
    <div class="col-12">
      <div class="card h-full">
          <div class="card-body">
              <h4 class="header-title mb-0">Add blog</h4>

              <form action="{{ url('/administrator/add-blog') }}" enctype="multipart/form-data" method="post" class="mt-4">
                @csrf

                <div class="form-group">
                  <label for="subiect">Subject</label>
                  <input id="subiect" class="form-control" type="text" name="subject" value="" placeholder="Subject..." maxlength="300" required>
                </div>

                <br><br>

                <div class="form-group">
                  <label for="text">Text:</label>
                  <textarea class="form-control" name="text" rows="5" id="text" placeholder="Text..." required></textarea>
                </div>

                <br><br>

                <div class="form-group">
                  <label for="text">Image (*.jpg, *.jpeg, *.png):</label>
                  <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control-file border p-1" required>
                </div>

                <br><br>

                <div class="submit-btn-area">
                    <button class="w-100 btn btn-success" name="submit" type="submit">Add <i class="ti-arrow-right"></i></button>
                </div>

              </form>

              <hr>

              <a href="{{ url('/blog') }}" target="_blank" class="w-100 btn btn-danger btn-rounded">Go to client side to view/delete existing blogs</a>

          </div>
      </div>
    </div>
  </div>

@endsection
