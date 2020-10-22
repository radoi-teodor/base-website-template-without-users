<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    @include('client.components.seo')

    <title>@yield('title') | {{ config('app.name') }} - Best Market</title>

    @include('client.components.dependencies')

    <link rel="stylesheet" href="{{ asset('client-assets/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('client-assets/js/app.js') }}"></script>

    @yield('dependencies-addons')

</head>

<body>

    <nav class="navbar bg-light p-0" id="logo-header">
        <a class="navbar-brand mx-auto" href="{{ url('/') }}"><img height="75px" src="{{ asset('assets/imgs/logo.png') }}" alt="{{ config('app.name') }}"></a>
    </nav>

    @include('client.components.menu')

    @include('client.components.error-handling')



    <div class="container-fluid main-wrapper">
      <div class="row">

        <!-- The Modal -->
        <div class="modal fade" id="logged-modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Not logged in</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Please login first
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        @yield('content')
      </div>
    </div>

    @include('client.components.footer')

</body>

@yield('dependencies-addons-down')

</html>
