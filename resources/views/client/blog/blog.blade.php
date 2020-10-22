@extends('layouts.client')

@section('title', 'Blog')

@section('dependencies-addons')

  <style media="screen">
    ul{
      list-style: none;
    }
  </style>

@endsection

@section('content')
  <div class="container">
    <div class="row">

      @php
        $max_letters = 80;
      @endphp

      @if(count($blogs)>0)

        @foreach ($blogs as $blog)

          <div class="col-md-4 card px-0">
            <div class="card-body">
              <a href="/blog/{{ $blog->permalink }}">
                <img class="w-100" src="{{ asset(UI::get_blog_image($blog->id)) }}" alt="{{ $blog->name }}">
              </a>
            </div>

            <div class="pt-4 card-footer">
              <div class="mb-3">
                <div><a href="/blog/{{ $blog->permalink }}">{{ $blog->created_at->format('j F, Y') }}</a></div>

              </div>
              <h3 class="heading mt-2"><a href="/blog/{{ $blog->permalink }}">{{ $blog->subject }}</a></h3>

              @php
                $description = '';
                $arr = explode(' ', $blog->text);

                $count_letters = 0;

                $i = 0;

                while($count_letters <= $max_letters && $i < count($arr)){
                  $description.=$arr[$i];

                  $count_letters+=strlen($arr[$i]);
                  $i++;

                  if($count_letters <= $max_letters && $i < count($arr)){
                    $description.=' ';
                  }
                }

                if($i < count($arr)){
                  $description.='...';
                }

              @endphp

              <p>{{ $description }}</p>
            </div>
          </div>

        @endforeach

      @else
        <h1>No blogs yet.</h1>
      @endif

    </div>

    <div class="row my-5">
      <ul class="list-group list-group-horizontal">

        @php

        $url = URL::full();
        $url = explode('?', $url);

        if(count($url)>1){
          $url = $url[count($url)-1];

          $page_query =  'page='.$page;

          if(strpos($url, $page_query.'&') !== false){
            $url = str_replace($page_query.'&','',$url);
          }else if(strpos($url, $page_query) !== false){
            $url = str_replace($page_query,'',$url);
          }

          if(trim($url)!=''){
            $url.='&';
          }
        }else{
          $url='';
        }

        $url = URL::current().'?'.$url;

        UI::make_pagination(
          $page,
          $page_count,
          '
          <li><a href="'.$url.'page={{ data }}" class="list-group-item {{ active_class }}">{{ data }}</a></li>
          ',
          'active',
          '{{ page }}'
        );
      @endphp

      </ul>
    </div>

  </div>

@endsection
