<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-bottom">
    <a class="navbar-brand pull-md-right" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">

        <ul class="navbar-nav pull-md-left">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/administrator/statistics') }}">Statistics</a>
            </li>

            <li class="nav-item dropup">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Settings
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ url('/administrator/store-setup') }}">Setup website</a>
                  <a class="dropdown-item" href="{{ url('/administrator/settings') }}">Modify/view settings</a>
                </div>
            </li>


            <li class="nav-item dropup">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Blog
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ url('/administrator/add-blog') }}">Add blog</a>
                  <a class="dropdown-item" href="{{ url('/administrator/edit-blog') }}">Edit blog</a>
                  <a class="dropdown-item" href="{{ url('/administrator/find-blog') }}">Find blog</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/administrator/messages') }}">Messages</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/administrator/administrators-manager') }}">Administrators manager</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Website</a>
            </li>
        </ul>


    </div>
</nav>
