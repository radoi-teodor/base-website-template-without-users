@extends('layouts.administrator')

@section('title', 'Edit blog '.$blog->name)

@section('content')

  <div class="row mt-5">
    <div class="col-12">
      <div class="card h-full">
          <div class="card-body">
              <h4 class="header-title mb-0">Edit the blog</h4>

              <form action="/administrator/edit-blog/{{ $blog->permalink }}" enctype="multipart/form-data" method="post" class="mt-4">
                @csrf

                <div class="form-group">
                  <label for="subiect">Subject *</label>
                  <input id="subiect" class="form-control" type="text" name="subject" placeholder="Subject..." maxlength="300" value="{{ $blog->subject }}" required>
                </div>

                <br>

                <div class="form-group">
                  <label for="text">Text *</label>
                  <textarea class="form-control" name="text" rows="5" id="text" placeholder="Text..." required>{!! e($blog->text) !!}</textarea>
                </div>

                <br><br>

                <div class="form-group">
                  <label for="text">Upload image to change blog image (*.jpg, *.jpeg, *.png):</label>
                  <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control-file border p-1">
                </div>

                <div class="form-group text-center">
                  <p>Current blog image:</p>
                  <div class="px-5 w-100">
                    <img class="w-100" src="{{ UI::get_blog_image($blog->id) }}" alt="{{ $blog->name }}">
                  </div>
                </div>

                <br><br>

                <div class="submit-btn-area">
                    <button name="submit" class="w-100 btn btn-success" type="submit">Edit <i class="ti-arrow-right"></i></button>
                </div>

              </form>

              <hr>

              <a href="{{ url('/blog') }}" target="_blank" class="w-100 btn btn-danger btn-rounded">Go to client side to view/delete existing blogs</a>

          </div>
      </div>
    </div>
  </div>

@endsection
