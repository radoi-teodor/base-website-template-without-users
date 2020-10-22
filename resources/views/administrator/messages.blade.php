@extends('layouts.administrator')

@section('title', 'Messages')

@section('content')

  <div class="row mt-5">
  <div class="col-12">

    @if(count($messages)>0)
      @foreach ($messages as $message)

        <div class="card border mb-3">
          <div class="card-header">
            <div class="float-left">
              <p>Name: <b>{{ $message->name }}</b></p>
              <p>Email: <a href="mailto:{{ $message->email }}"><b>{{ $message->email }}</b></a></p>
              <p>Subject: <b>{{ $message->subject }}</b></p>
              <p>Created date: <b>{{ $message->created_at->format('j F, Y') }}</b></p>

              @if($message->read)

                <p class="text-danger"><b>Read!</b></p>

              @endif

            </div>

            <div class="float-right">
              @if($message->read)
                <a href="/administrator/mark-unread/{{ $message->id }}" class="btn btn-rounded btn-success w-100">Mark unread</a>
              @else
                <a href="/administrator/mark-read/{{ $message->id }}" class="btn btn-rounded btn-success w-100">Mark read</a>
              @endif

              <br>

              <a href="/administrator/save-message/{{ $message->id }}" class="btn btn-rounded btn-warning w-100">Save PDF</a>

              <a href="/administrator/delete-message/{{ $message->id }}" class="btn btn-rounded btn-danger w-100">Delete</a>

              <br>

              <button class="btn btn-rounded btn-dark w-100" data-toggle="collapse" data-target="#message-{{ $message->id }}">View/Hide Message</button>

            </div>
          </div>

          <div class="card-footer collapse" id="message-{{ $message->id }}">
            <p>{!! nl2br(e($message->message)) !!}</p>
          </div>
        </div>

      @endforeach
    @else
      <p>No message yet.</p>
    @endif


  </div>

  <div class="col-12">

    @if($page>1)
      <div class="float-left">

        <a href="/administrator/messages?page={{ $page-1 }}" class="btn btn-rounded btn-primary">&larr; Previous</a>

      </div>
    @endif

    @if($page<$page_count)
      <div class="float-right">

        <a href="/administrator/messages?page={{ $page+1 }}" class="btn btn-rounded btn-primary">Next &rarr;</a>

      </div>
    @endif

  </div>
</div>


@endsection
