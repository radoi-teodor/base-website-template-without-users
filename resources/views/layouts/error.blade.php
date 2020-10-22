<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    @include('client.components.dependencies')

    <link rel="stylesheet" href="{{ asset('client-assets/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('client-assets/js/app.js') }}"></script>

    @yield('dependencies-addons')

</head>

<body>

    <nav class="navbar bg-light p-0" id="logo-header">
        <a class="navbar-brand mx-auto" href="{{ url('/') }}"><img height="75px" src="{{ asset('assets/imgs/logo.png') }}" alt="{{ config('app.name') }}"></a>
    </nav>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4" id="navbar-top">
        <a class="navbar-brand pull-md-right" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">

        </div>
    </nav>

    @include('client.components.error-handling')

    <div class="container-fluid main-wrapper">
      <div class="row">
        @yield('content')
      </div>
    </div>


</body>

@yield('dependencies-addons-down')

</html>
