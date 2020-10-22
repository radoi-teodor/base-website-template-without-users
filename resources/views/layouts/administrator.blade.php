<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title') | Administrator Module - {{ config('app.name') }}</title>

    @include('administrator.components.dependencies')

    <link rel="stylesheet" href="{{ asset('administrator-assets/css/style.css') }}">

    @yield('dependencies-addons')

</head>

<body>

    @include('administrator.components.menu')

    @include('administrator.components.error-handling')

    <div class="container">

      @php
        $segments = Request::segments();

        $last_segment = $segments[count($segments)-1];

        array_pop($segments);

        $segment_path_prefix='';

        $title_h1 = $last_segment;

        if(isset($title) && trim($title)!='')
          $title_h1 = $title;

      @endphp

      <h1>{{ ucfirst(Util::reverse_permalink($title_h1)) }}</h1>

      <a href="{{ url('/') }}">Home</a>

      @foreach($segments as $segment)
      / <a href="{{ url('/'.$segment_path_prefix.$segment) }}">
        {{ ucfirst(Util::reverse_permalink($segment)) }}
      </a>
      <?php
        $segment_path_prefix.=$segment.'/';
      ?>
      @endforeach

      / <span>{{ ucfirst(Util::reverse_permalink($title_h1)) }}</span>

      <br><br>

      @if(count($settings)==0)
        <p class="text-warning">Please setup the store before anything!</p>
      @endif

      @yield('content')
    </div>

</body>

@yield('dependencies-addons-down')

</html>
