@extends('layouts.client')

@section('title', 'Blog: '.$blog->subject)

@section('content')

  <div class="container">
  <div class="row no-gutters">

    <div class="col-12">
      <h2 class="float-left">{{ $blog->subject }}</h2>

      @if(Auth::check() && Auth::user()->administrator)
        <a href="/delete-blog/{{ $blog->id }}" class="btn btn-rounded btn-danger float-right">Delete blog</a>
        <a target="_blank" class="btn btn-rounded btn-warning float-right" href="/administrator/edit-blog/{{ $blog->permalink }}">Edit blog</a>
      @endif

    </div>

    <div class="col-12">
      <p class="text-muted">Created at: {{ $blog->created_at->format('j F, Y') }}</p>
      <hr>
    </div>

    <div class="col-12 mb-3">
      <img class="img-responsive w-100" src="{{ asset(UI::get_blog_image($blog->id)) }}" alt="{{ $blog->subject }}">
    </div>

    <div class="col-12">
      <p>{!! nl2br(e($blog->text)) !!}</p>
    </div>

  </div>


  <div class="pt-5 my-5">
    <h3 class="mb-5">{{ count($blog_comments) }} Comments</h3>
    <ul class="comment-list">

      @if (count($blog_comments)>0)
        @foreach ($blog_comments as $comment)
          <li class="card my-1">
            <div class="card-header">
              <h3><span class="fa fa-user"></span> {{ $comment->name }}</h3>
            </div>

            <div class="card-body">
              <p>{!! nl2br(e($comment->text)) !!}</p>

              @if(Auth::check())
                <p>E-mail: <a class="text-success mb-3" href="mailto:{{ $comment->email }}">{{ $comment->email }}</a></p>
                <a class="btn btn-danger mb-3" href="{{ url('/blog/'.$blog->permalink.'/delete-comment/'.$comment->id) }}">Delete comment</a>
              @endif
            </div>

            <div class="card-footer">
              <div class="meta">Created at: {{ $comment->created_at->format('j F, Y, g:ia') }}</div>
            </div>

          </li>
        @endforeach

      @else
        <li class="comment">
          <h4>No comment yet</h4>
        </li>
      @endif

    </ul>
    <!-- END comment-list -->

    <div class="comment-form-wrap pt-5">
      <h3 class="mb-5">Leave a comment</h3>

      <form action="{{ url('/blog/'.$blog->permalink.'/add-comment') }}" method="post" class="p-5 bg-light">
        @csrf

        <div class="form-group">
          <label for="name">Name *</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
        </div>

        <div class="form-group">
          <label for="email">E-mail *</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
        </div>

        <div class="form-group">
          <label for="message">Message *</label>
          <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Add comment" class="btn py-3 px-4 btn-primary">
        </div>
      </form>


    </div>
  </div>


</div>


@endsection
