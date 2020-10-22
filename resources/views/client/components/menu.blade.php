<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4" id="navbar-top">
    <a class="navbar-brand pull-md-right" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Account
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(\Auth::check())
                    @if(\Auth::user()->administrator)
                      <a class="dropdown-item" target="_blank" href="{{ url('/administrator') }}">Administrator module</a>
                    @endif
                    <a class="dropdown-item" href="{{ url('/logout') }}">Log out</a>
                  @else
                    <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                    <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                  @endif
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
            </li>

        </ul>


    </div>
</nav>
